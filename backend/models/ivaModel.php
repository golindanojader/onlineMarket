<?php 

require_once "connection.php";


class iva {


  public static function viewIvaModel($table){


  	    	$stmt = connection::connect()->prepare("SELECT iva FROM iva");

  			$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();


  		}



}