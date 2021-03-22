<?php 
require_once "../../../controllers/clientController.php";
require_once "../../../models/clientModel.php";

class ajax{
public $validatePass;

 public function validatePasswordAjax(){

 // PENDIENTE (ESTA FUNCION keypress de JQUERY GENERA UN VALOR VACIO DE PRIMERO Y LANZA ERROR LA CONSULTA)
$dataAjax = $this->validatePass;


$answer = ClientController::validatePassFromAjax($dataAjax);
 echo($answer);


 }


}

if (isset($_POST["validatePass"])) {

$a = new ajax();
$a -> validatePass=$_POST["validatePass"];
$a->validatePasswordAjax();

}