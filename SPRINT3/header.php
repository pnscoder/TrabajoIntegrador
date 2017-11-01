<?php 
session_start();
/*
ACA DECIDIMOS SI QUEREMOS USAR LA BASE DE DATOS O JSON.
*/

# SI ES JSON: Activo o desactivo comentario en $action...

$action = "gestion.php";

# SI ES BD: Activo o desactivo comentario en $action...

$action = "gestionbd.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Styles.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
    <link rel="stylesheet" href="css/stylesmobile.css">
    <link rel="stylesheet" href="css/stylestablet.css">
    <link rel="stylesheet" href="css/stylesdesktop.css">
  </head>
  <body>
    <div class="contenedor">
      <header>
        <p class="texto_logo">Styles.com!</p>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="productos.php">Productos</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li><a href="contacto.php">Contacto</a></li>
					<?php 
					if(isset($_SESSION['islogin']) and $_SESSION['islogin']==true){
						// no hago nada.
					}else{
						echo "<li><a href='login.php'>Login / Registro</a></li>";
					}
					?>
				</ul>
			</nav>
		</header>
		<div class="col12">
		<?php
		if(isset($_SESSION['msgLogOk']) and $_SESSION['msgLogOk']!=''){
			echo "<div class='alert alert-success text-center'>$_SESSION[msgLogOk]</div>";
			$_SESSION['msgLogOk']='';
		}
		?>
		<?php
		if(isset($_SESSION['msgLogErr']) and $_SESSION['msgLogErr']!=''){
			echo "<div class='alert alert-danger text-center'>$_SESSION[msgLogErr]</div>";
			$_SESSION['msgLogErr']='';
		}
		?>
		<?php
		if(isset($_SESSION['msgOk']) and $_SESSION['msgOk']!=''){
			echo "<div class='alert alert-success text-center'>$_SESSION[msgOk]</div>";
			$_SESSION['msgOk']='';
		}
		?>
		<?php
		if(isset($_SESSION['msgErr']) and $_SESSION['msgErr']!=''){
			echo "<div class='alert alert-danger text-center'>$_SESSION[msgErr]</div>";
			$_SESSION['msgErr']='';
		}
		?>
		</div>
		<div class="col12">
			<?php 
			if(isset($_SESSION['islogin']) and $_SESSION['islogin']==true){
				if(!empty($_SESSION['foto'])){
					echo "
					<div class='bienvenida'>
						<img src='./fotosperfil/$_SESSION[foto]' height='50px' />
					";
				}else{
					echo "
					<div class='bienvenida'>
					";
				}
				echo "
					Bievenido <strong>$_SESSION[apellidonombre]</strong> !
					<a class='cerrar' href='gestion.php?opcion=cerrarsesion' >Cerrar Sesi&oacute;n</a>
				</div>";
			}
			?>	
		</div>
