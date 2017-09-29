<?php
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$mensaje = $_POST['mensaje'];
$cadena = str_replace(" ","%20",$mensaje);
header("Location: http://www.labelau.com.ar/labelau/web/app.php/titanio/mail?nombre=$nombre&telefono=$telefono&mail=$mail&mensaje=$cadena");
exit;
?>