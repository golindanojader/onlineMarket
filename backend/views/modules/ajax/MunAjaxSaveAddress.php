

<?php 


require_once "../../../controllers/addressController.php";
require_once "../../../models/addressModel.php";


class ajax{

	public $validarMunicipio;
	public $respuestaMun;



	// SOLICITAR EL ID DE ESTADO
	// ----------------------------------------------

	 public function validarMunicipioAjax(){

	 		
	 			$datos = $this->validarMunicipio;
	 			
	 			$answer = addressController::viewIdStateController($datos);

	 		

}

// SOLICITAR MUNICIPIOS
// ------------------------------------------------

 public  function respuestaMunAjax(){

 			 		
	 			$datos = $this->respuestaMun;

				$answer = addressController::borrarBorrar($datos);

	 			 			

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






