<?php 
session_start();

if (!$_SESSION["validate"]) {

	header("location:../index");
	

	exit();
}
else{


require_once "controllers/backendConnectControllerPage.php";
require_once "controllers/productsController.php";
require_once "controllers/zoneDeliveryController.php";
require_once "controllers/addressController.php";
require_once "controllers/banksController.php";
require_once "controllers/purchaseOrderController.php";
require_once "controllers/clientController.php";
require_once "controllers/exitController.php";
require_once "controllers/branchController.php";
require_once "controllers/categoryController.php";



require_once "models/backendConnectModelPage.php";
require_once "models/productsModel.php";
require_once "models/zoneDeliveryModel.php";
require_once "models/addressModel.php";
require_once "models/banksModel.php";
require_once "models/purchaseOrderModel.php";
require_once "models/ivaModel.php";
require_once "models/clientModel.php";
require_once "models/deliveryTaxModel.php";
require_once "models/exitModel.php";
require_once "models/branchModel.php";
require_once "models/categoryModel.php";

$connect = new connectControllerPage();
$connect ->template();



}

