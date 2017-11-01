<?php
class Usuario{

public $nombre ='';
public $mail='';
public $password='';
public $usuario_id='';


public function __contruct($nombre,$mail,$password,$usuario_id){

  $this ->nombre = $nombre;
  $this ->mail = $mail;
  $this ->password = $password;
  $this ->usuario_id = $usuario_id;


}
 public function setnombre(){
   $this ->nombre = $nombre;
 }

 public function getnombre(){
   return $this-> nombre;
 }

 public function setmail(){
    $this ->mail = $mail;
 }

 public function getmail(){
   return $this-> mail;
 }

 public function setpassword($password){
  $this ->password = $password_hash($password,PASSWORD_DEFAULT);
 }

 public function getpassword(){
   return $this-> password;
 }

 public function setusuario_id(){
  $this ->usuario_id = $usuario_id;
 }

 public function getusuario_id(){
   return $this-> usuario_id;
 }





class Login{

private $clave;
private $mail;

public function __construct($mail,$clave) {
  $this ->mail = $mail;
  $this ->clave = $clave;
}

public function validar(){

}



}




 ?>
