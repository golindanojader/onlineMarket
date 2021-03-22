<?php 

require_once "../../../controllers/zoneDeliveryController.php";
require_once "../../../models/zoneDeliveryModel.php";


class ajax{

	public $validarMunicipio;
	public $respuestaMun;



	// SOLICITAR EL ID DE ESTADO
	// ----------------------------------------------

	 public function validarMunicipioAjax(){

	 		
	 			$datos = $this->validarMunicipio;
	 			
	 			$answer = zoneDeliveryController::viewIdStateController($datos);

	 		

}

// SOLICITAR MUNICIPIOS
// ------------------------------------------------

 public  function respuestaMunAjax(){

 			 		
	 			$datos = $this->respuestaMun;

				$answer = zoneDeliveryController::borrarBorrar($datos);

	 			 			

 		}

 		}


if(isset($_POST["validarMunicipio"])){

$a = new ajax();
$a -> validarMunicipio = $_POST["validarMunicipio"];
$a -> validarMunicipioAjax();
} 



if(isset($_POST["respuestaMun"])){

$b = new ajax();
$b -> respuestaMun = $_POST["respuestaMun"];
$b -> respuestaMunAjax();
} 






