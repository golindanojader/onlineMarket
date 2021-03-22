<?php 
require_once "connection.php";

class deliveryTaxModel{


 public static function saveDeliveryTaxModel($dataModel, $table){

 		$stmt = connection::connect()->prepare("UPDATE $table SET tax = $dataModel");
 		// $stmt ->bindParam(":tax",$dataModel["tax"],PDO::PARAM_STR);


 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


 			}

 			 public static function viewDeliveryTaxModel($table){

 			 	$stmt = connection::connect()->prepare("SELECT tax FROM $table");

 			 	$stmt -> execute();

		 		return $stmt->fetch();

		 		$stmt->close();

 			 }


}