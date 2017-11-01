<?php 
error_reporting(E_ERROR);
include './config.php';
require_once './Cliente.php';
session_start();

# GENERO UNA INSTANCIA DEL OBJETO CLIENTE, QUE TIENE TODOS LOS LLAMADOS A LA BD.
$cliente = new Cliente();

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 'registrar':
		$error = false;
		if($_POST['apellidonombre']!='' and $_POST['mail']!='' and $_POST['clave']!='' and $_POST['repetirclave']!=''){
			if($_POST['clave']==$_POST['repetirclave']){
				$clientes = $cliente->buscar($_POST['mail']);
				if(count($clientes)==0){
					$uploaddir = "./fotosperfil/";
					$filesize = $_FILES['archivo']['size'];
					$filename = trim($_FILES['archivo']['name']); 
					
/*
					$exten = explode('.',$filename);
					$extension = $exten[count($exten)-1];
					$extensiones = "jpeg, jpg, png, gif, JPEG, JPG, PNG, GIF";
					$pos = strpos($extensiones, $extension);
*/					
					mkdir($uploaddir, 0777);
					if($filesize > 0){ 
						$uploadfile = $uploaddir . $filename;
						move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadfile);
					}
					
					$msg = $cliente->insertar($_POST['apellidonombre'], $_POST['mail'], $_POST['clave'], $filename);
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
    case 'login':
		$mail 	= $_POST['mail'];
		$clave 	= $_POST['clave'];

		$error = true;
		$clientes = $cliente->login($mail, $clave);
		
		if(count($clientes)>0){
			$_SESSION['apellidonombre'] = $clientes[0]['apellidonombre'];
			$_SESSION['foto'] = $clientes[0]['foto'];
			$_SESSION['islogin'] = true;
			$_SESSION['msgLogErr'] = '';
			$error = false;
		}
		
		if($error){
			$_SESSION['msgLogErr'] = 'El mail o la clave son incorrectos.';
			header("Location:login.php");
		}else{
			header("Location:index.php");
		}
		break;
}

?>					
