<?php 

#ESTA CLASE PERMITE VALIDAR LA CUENTA DEL USUARIO CUANDO INGRESA POR PRIMERA VEZ
#-----------------------------------------------------------------------------------------------------------
require_once "../../../controllers/login.php";						
require_once "../../../models/login.php";

class ajax{
	

	public $validateAccess;
	
	public function validateAccessAjax(){

		$dataAjax = $this->validateAccess;
		$answer = enterLogin::validateAccessController($dataAjax);
		echo $answer;
	
	 	}
	 	
}

if (isset($_POST["validateAccess"])) {
	
	$a = new ajax();
	$a -> validateAccess= $_POST["validateAccess"];
	$a -> validateAccessAjax();

}

