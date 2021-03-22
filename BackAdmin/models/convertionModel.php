<?php 
require_once "connection.php";


class convertionModel{

	# VER TASA DEL DIA
	#------------------------------------------------
	 public static function viewConvertionModel($table){

	 		 $stmt = connection::connect()->prepare("SELECT tasa FROM $table");

	 		$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();


	 		}

	 	 public static function updateConvertionModel($dataModel, $table){

	 	 	 $stmt = connection::connect()->prepare("UPDATE $table SET tasa = :tasa");

	 	 	 $stmt -> bindParam(":tasa", $dataModel["tasa"], PDO::PARAM_STR);

	 	 	 		if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();


	 	 }

}