<?php 
require_once "connection.php";

class deliveryTaxModel{

 public static function viewDeliveryTaxModel($table){


 	$stmt = connection::connect()->prepare("SELECT tax FROM $table");

	$stmt -> execute();

	return $stmt->fetch();

	$stmt->close();


 		}



}