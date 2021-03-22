<?php 


class exitController{

 public static function deleteProductsInPurchaseCarController(){

 	$idUser = $_SESSION["id"];

 	$answer = exitModel::deleteProductsInPurchaseCarModel($idUser, "carritocompras" );


 }

 }