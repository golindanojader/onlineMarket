<?php 

require_once "../../../controllers/productscontroller.php";
// require_once "../../../models/productsModel.php";

 class ajax{

 	public $validateIdProduct;

 	 public static function validateIdProductAjax(){


 	 	$data ->$this->validateIdProduct;

 	 	$answer = productController::deleteProductController($data);

 	 	echo $answer;
 	 }

 }

if(isset($_POST["validateIdProduct"])){
 $a = new ajax();
$a -> validateIdProduct = $_POST["validateIdProduct"];
$a -> validateIdProductAjax();
}