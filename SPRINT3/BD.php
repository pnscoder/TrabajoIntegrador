<?php  
class BD
{ 
    protected $conexion;

    public function __construct() 
    { 
		$this->conexion = new PDO("mysql:host=localhost;dbname=mysql;charset=UTF8", "root", "");
		if(count($this->conexion->errorInfo())>2 and $this->conexion->errorInfo()[2]!=''){			
			echo $this->conexion->errorInfo()[2];
			return;
		}
    } 
	# CREA LA TABLA DENTRO DE LA BASE DE DATOS FIJADA EN LA FUNCION CONSTRUCTOR
    public function crearTabla() 
    { 
		$stmt = $this->conexion->prepare("
			CREATE TABLE cliente (
			  id int(11) NOT NULL,
			  apellidonombre varchar(255) DEFAULT NULL,
			  mail varchar(255) DEFAULT NULL,
			  clave varchar(255) DEFAULT NULL,
			  foto varchar(255) DEFAULT NULL
			)
		");
		$stmt->execute();

		$stmt = $this->conexion->prepare("
			ALTER TABLE cliente
			  ADD PRIMARY KEY (id);
		");
		$stmt->execute();

		$stmt = $this->conexion->prepare("
			ALTER TABLE cliente
			  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
		");
		$stmt->execute();
		
		if(count($stmt->errorInfo())>2 and $stmt->errorInfo()[2]!=''){			
			echo $stmt->errorInfo()[2];
		}else{
			echo "Creacion de tabla exitosa.";
		}
    } 
} 
?>