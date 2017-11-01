<?php
include "BD.php";
class Cliente extends BD{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function traerTodo(){
		$stmt = $this->conexion->prepare("SELECT * FROM cliente");
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function login($mail, $clave){
		$stmt = $this->conexion->prepare("SELECT * FROM cliente WHERE mail = '$mail' AND clave = '$clave'");
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function buscar($mail){
		$stmt = $this->conexion->prepare("SELECT * FROM cliente WHERE mail = '$mail'");
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function insertar($apellidonombre, $mail, $clave, $foto){
		$stmt = $this->conexion->prepare("INSERT INTO cliente (apellidonombre, mail, clave, foto) VALUES  ('$apellidonombre', '$mail', '$clave', '$foto') ");
		
		$stmt->execute();
		
		if(count($stmt->errorInfo())>2 and $stmt->errorInfo()[2]!=''){			
			echo $stmt->errorInfo()[2];
		}else{
			echo "Se guardo a: $apellidonombre <br/>";
		}
	}	
}
?>					
