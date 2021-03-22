<?php 

require_once "../../controllers/register.php";
require_once "../../models/register.php";

class ajax{

	public $validarUsuario;

	 public function validarUsuarioAjax(){

	 		
	 			$datos = $this->validarUsuario;
	 			
	 			$respuesta  = enterRegister::userControllerValidate($datos);

	 			echo 	$respuesta;
	 }
}

if(isset($_POST["validarUsuario"])){

$a = new ajax();
$a -> validarUsuario = $_POST["validarUsuario"];
$a -> validarUsuarioAjax();
} 