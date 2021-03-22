<?php 
require_once "connection.php";

class zoneDeliveryModel{


#SAVE ESTATE
#--------------------------------------------------------
 public static function saveStateModel($dataModelEstate, $table){

$stmt = connection::connect()->prepare("INSERT INTO $table(estate)VALUES(:estate)");

$stmt ->bindParam(":estate",$dataModelEstate["estate"],PDO::PARAM_STR);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


 }


#SAVE MUNICIPALITY
#-------------------------------------------------------------

 public static function saveMunicipalityModel($dataModelMunicipality,$table){

$stmt = connection::connect()->prepare("INSERT INTO $table(idestate, municipality)VALUES(:idestate, :municipality)");


	$stmt ->bindParam(":municipality",$dataModelMunicipality["municipality"],PDO::PARAM_STR);
	$stmt ->bindParam(":idestate",$dataModelMunicipality["idestate"],PDO::PARAM_INT);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


 }


# VIEW COUNTRY STATES
#--------------------------------------------------------
 public static function viewZoneDeliveryEstateModel($estateModel, $table){

 $stmt= connection::connect()->prepare("SELECT id, estate FROM $table WHERE estate = :estate"); 
		
		$stmt -> bindParam(":estate", $estateModel["estate"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();


 			}


 	#VIEW COUNTRY MUNICIPALITIES
 	#----------------------------------------------------------
 	#
 	 public static function viewZoneDeliveryMunicipalityModel($table){

 	 	 $stmt= connection::connect()->prepare("SELECT id, municipality FROM $table ORDER BY idestate ASC"); 
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

			 public static function borrarBorrar($dataModel, $table){


			$stmt= connection::connect()->prepare("SELECT id, municipality FROM $table WHERE idestate = :idestate"); 
 	 	 	$stmt -> bindParam(":idestate", $dataModel, PDO::PARAM_INT);
 			
 			$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


			  }



			  public static function deleteZoneDeliveryMunicipalityModel($dataModel, $table){


			  		$stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

			 $stmt -> bindParam(":id",$dataModel, PDO::PARAM_INT);

 		 	if ($stmt->execute()) {

 		 			return "ok";
 		 		
 		 	}
 		 	else{

 		 		return "error";
 		 	}



			  } 


}