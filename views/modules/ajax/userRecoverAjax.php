<?php 

require_once "../../../controllers/login.php";
require_once "../../../models/login.php";

class ajax{


public $validateExistEmail;
public $sendPass;

#A-VALIDAR EMAIL
#----------------------------------------
public function  validateExistEmailAjax(){

$dataAjax = $this->validateExistEmail;
$answer = enterLogin::validateExistEmailAjaxController($dataAjax);
echo($answer);


 }

#B-ENVIAR LA CLAVE AL CORREO
#------------------------------------------
  public  function sendPassAjax(){

  	$dataAjax = $this->sendPass;
	$answer=enterLogin::sendPassAjaxController($dataAjax);
  	echo $answer;
  }


}

if (isset($_POST["validateExistEmail"])) {
$a = new ajax();
$a -> validateExistEmail = $_POST["validateExistEmail"];
$a ->validateExistEmailAjax();
}



if (isset($_POST["sendPass"])) {
$b = new ajax();
$b -> sendPass = $_POST["sendPass"];
$b->sendPassAjax();
}
