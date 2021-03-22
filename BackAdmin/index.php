<!-- #=======================
	#Developed for Jader Golindano
	#======================= -->
<?php 

if (!$_SESSION["validate"] = true) {

	header("location:index.php?action=index");

	exit();
}
else{

session_start();

#Controllers
require_once "controllers/controllerPage.php";
require_once "controllers/productController.php";
require_once "controllers/loginController.php";
require_once "controllers/convertionController.php";
require_once "controllers/zoneDeliveryController.php";
require_once "controllers/clientController.php";
require_once "controllers/banksController.php";
require_once "controllers/purchaseOrderController.php";
require_once "controllers/deliveryTaxController.php";
require_once "controllers/branchController.php";
require_once "controllers/categoriesController.php";
require_once "controllers/usersControllers.php";

#Models
require_once "models/modelPage.php";
require_once "models/productModel.php";
require_once "models/loginModel.php";
require_once "models/convertionModel.php";
require_once "models/zoneDeliveryModel.php";
require_once "models/clientModel.php";
require_once "models/banksModel.php";
require_once "models/purchaseOrderModel.php";
require_once "models/deliveryTaxModel.php";
require_once "models/branchModel.php";
require_once "models/categoriesModel.php";
require_once "models/usersModels.php";



$page = new page();
$page->template();



 }
