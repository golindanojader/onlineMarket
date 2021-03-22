<?php 
// SALIDA A LAS VISTAS DEL USUARIO

require_once "controllers/controllerConnectPage.php";
require_once "controllers/login.php";
require_once "controllers/register.php";
require_once "controllers/productsController.php";
require_once "controllers/categoryController.php";



require_once "models/login.php";
require_once "models/modelConnectPage.php";
require_once "models/register.php";
require_once "models/productsModel.php";
require_once "models/categoryModel.php";




$mvc = new mvcController();
$mvc->template();

