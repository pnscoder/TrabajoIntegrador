<?php 
error_reporting(E_ERROR);
include './config.php';
session_start();

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 'cerrarsesion':
		$_SESSION['apellidonombre'] = '';
		$_SESSION['islogin']= false;
		$_SESSION['foto'] = '';
		header("Location:index.php");
		exit();
		break;
    case 'registrar':
		$error = false;
		if($_POST['apellidonombre']!='' and $_POST['mail']!='' and $_POST['clave']!='' and $_POST['repetirclave']!=''){
			if($_POST['clave']==$_POST['repetirclave']){
				$file = 'clientes.json';

				//Leemos el JSON
				$datos_clientes = file_get_contents($file);
				$json_clientes = json_decode($datos_clientes, true);
				$i = 1;
				foreach ($json_clientes as $cliente) {
					if($cliente[$i]['mail'] == $_POST['mail']){
						$error = true;
						break;
					} 
					$i++;
				}
				if(!$error){
					$proximo = count($json_clientes) + 1;

					$uploaddir = "./fotosperfil/";
					$filesize = $_FILES['archivo']['size'];
					$filename = trim($_FILES['archivo']['name']); 
					
					$exten = explode('.',$filename);
					$extension = $exten[count($exten)-1];
					$extensiones = "jpeg, jpg, png, gif";
					$pos = strpos($extensiones, $extension);
					
					if($pos>=0){
						mkdir($uploaddir, 0777);
						if($filesize > 0){ 
							$uploadfile = $uploaddir . $filename;
							move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadfile);
						}
					}
					
					//Creamos el JSON
					$arr_clientes = array($proximo=>array('apellidonombre'=> $_POST['apellidonombre'], 'mail'=> $_POST['mail'], 'clave'=> $_POST['clave'], 'foto'=> $filename));
					$json_clientes[] = $arr_clientes; 
					$json_string = json_encode($json_clientes);
					file_put_contents($file, $json_string);
					$_SESSION['apellidonombre'] = '';
					$_SESSION['mail'] = '';
					$_SESSION['msgOk'] = 'Felicitaciones, ya se ha regisrado, ahora puede loguearse.';
				}else{
					$_SESSION['apellidonombre'] = $_POST['apellidonombre'];
					$_SESSION['mail'] = $_POST['mail'];
					$_SESSION['msgErr'] = 'Ya tenemos un usuario registrado con este mail: "'.$_POST['mail'].'"';
				}
			}else{
				$_SESSION['apellidonombre'] = $_POST['apellidonombre'];
				$_SESSION['mail'] = $_POST['mail'];
				$_SESSION['msgErr'] = 'Las claves deben coincidir.';
			}
		}else{
			$_SESSION['apellidonombre'] = $_POST['apellidonombre'];
			$_SESSION['mail'] = $_POST['mail'];
			$_SESSION['msgErr'] = 'Debe completar todos los campos.';
		}
		header("Location:login.php");
		break;
    case 'olvideclave':
		$mail 	= $_POST['mail'];
		$file = 'clientes.json';

		$datos_clientes = file_get_contents($file);
		$json_clientes = json_decode($datos_clientes, true);
		$i = 1;
		foreach ($json_clientes as $cliente) {
			if($cliente[$i]['mail'] == $mail){
				$_SESSION['msgLogOk'] = 'Tu clave es :'.$cliente[$i]['clave'];
				$_SESSION['msgLogErr'] = '';
				break;
			}else{
				$_SESSION['msgLogErr'] = 'El mail no se encuentra registrado.';
			}
			$i++;
		}

		header("Location:login.php");

		break;
    case 'login':
		$mail 	= $_POST['mail'];
		$clave 	= $_POST['clave'];
		$file = 'clientes.json';

		$datos_clientes = file_get_contents($file);
		$json_clientes = json_decode($datos_clientes, true);
		$i = 1;
		$error = false;
		foreach ($json_clientes as $cliente) {
			if($cliente[$i]['mail'] == $mail){
				if($cliente[$i]['clave'] == $clave){
					$_SESSION['apellidonombre'] = $cliente[$i]['apellidonombre'];
					$_SESSION['foto'] = $cliente[$i]['foto'];
					$_SESSION['islogin'] = true;
					$_SESSION['msgLogErr'] = '';
					$error = false;
					break;
				}else{
					$_SESSION['msgLogErr'] = 'La clave no coincide.';
					$error = true;
				}
			}else{
				$_SESSION['msgLogErr'] = 'El mail no se encuentra registrado.';
				$error = true;
			}
			$i++;
		}
		if($error){
			header("Location:login.php");
		}else{
			header("Location:index.php");
		}
		break;
}

?>					
