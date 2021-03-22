<?php 
require_once "connection.php";

class zoneDeliveryModel{

# VIEW COUNTRY STATES
#--------------------------------------------------------
 public static function viewZoneDeliveryEstateModel($table){

 $stmt= connection::connect()->prepare("SELECT estate FROM $table ORDER BY id ASC"); 

 			
 			$stmt -> execute();

		 	return $stmt->fetchall();

		 	$stmt->close();


 			}


 	#VIEW COUNTRY MUNICIPALITIES
 	#----------------------------------------------------------
 	#
 	 public static function viewZoneDeliveryMunicipalityModel($table){

 	 	 $stmt= connection::connect()->prepare("SELECT municipality FROM $table ORDER BY idestate ASC"); 

 			
 			$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


 	 }


 	 		 public static function borrarBorrar($dataModel, $table){


			$stmt= connection::connect()->prepare("SELECT id, municipality FROM $table WHERE idestate = :idestate"); 
 	 	 	$stmt -> bindParam(":idestate", $dataModel, PDO::PARAM_INT);
 			
 			$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


			  }


			  
#VIEW ID FROM STATE
#--------------------------------------------------


 public static function viewIdStateModel($dataModel, $table){

 		 $stmt= connection::connect()->prepare("SELECT id FROM $table WHERE estate = :estate");

 		 $stmt -> bindParam(":estate", $dataModel, PDO::PARAM_STR);

 		 $stmt -> execute();

 		 return $stmt->fetch();

 		 $stmt->close(); 




			 }
			  

}