<?php 

require_once "../../../controllers/productsController.php";
require_once "../../../models/productsModel.php";

class ajax{

public $validateProductName;

#SOLICITAR EL NOMBRE DE PRODUCTO
#--------------------------------------------------------
 public function validateProductNameAjax(){

 	$dataAjax = $this->validateProductName;

 	$answer = viewProductsController::ProductsControllerFromAjax($dataAjax);

 		}

}

if (isset($_POST["validateProductName"])) {

$a = new ajax();
$a -> validateProductName=$_POST["validateProductName"];
$a->validateProductNameAjax();

}