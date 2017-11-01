<?php 
# MIGRA LOS DATOS DEL ARCHIVO JSON A LA BD, TENIENDO EN CUENTA LOS REPETIDOS.

require_once "Cliente.php";
$cliente = new Cliente();

$file = 'clientes.json';
//Leemos el JSON
$datos_clientes = file_get_contents($file);
$json_clientes = json_decode($datos_clientes, true);
$i = 1;

foreach ($json_clientes as $clientejson) {
	$error = false;
	// Manejo de error por BD
	$mail = $clientejson[$i]['mail'];

	$controlcliente = $cliente->buscar($mail);

	if(count($controlcliente)==0){
		// Registro en la base
		$msg = $cliente->insertar($clientejson[$i]['apellidonombre'],$clientejson[$i]['mail'],$clientejson[$i]['clave'],$clientejson[$i]['foto']);
		echo $msg;
	}	
	$i++;
}					

echo "Migraci&oacute;n Realizada";

?>					
