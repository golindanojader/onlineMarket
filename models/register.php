<?php 

require_once "connection.php";

class ModelRegister{

	 public static function saveModelRegister($dataModel,$table){


	 	$stmt = connection::connect()->prepare("INSERT INTO $table (user, password) VALUES (:user, :password)");

	 	$stmt-> bindParam(":user",$dataModel["user"], PDO::PARAM_STR);
	 	$stmt-> bindParam(":password",$dataModel["password"], PDO::PARAM_STR);


	 	if ($stmt->execute()) {

	 		return 1;
	 		
	 		}
	 		else{

	 			return 0;
	 		}
	 		$stmt->close();
	 }

	  public static function userModelValidate($datosModel,$tabla){

	  	$stmt = connection::connect()->prepare("SELECT user FROM $tabla WHERE user = :user");

		$stmt->bindParam(":user",$datosModel, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();		  	

	  }
	  	#TÉRMINOS Y CONDICIONES
	  	#------------------------------------------------------------
	  	  public static function   viewTermsCondModel($table){

	  			$stmt = connection::connect()->prepare("SELECT header, information FROM $table");

		   		$stmt -> execute();
				return $stmt->fetch();
				$stmt->close();



	  }
	  #GUARDA LA CLAVE TEMPORAL
	  #------------------------------------------------------------------------
	   public static function saveModelValidateUser($validateDataModel, $table){



	 	$stmt = connection::connect()->prepare("INSERT INTO $table (user, password, temppass) VALUES (:user, :password,:temppass)");

	 	$stmt-> bindParam(":user",$validateDataModel["user"], PDO::PARAM_STR);
	 	$stmt-> bindParam(":password",$validateDataModel["password"], PDO::PARAM_STR);
	 	$stmt-> bindParam(":temppass",$validateDataModel["temppass"], PDO::PARAM_STR);

	 	if ($stmt->execute()) {

	 		return 1;
	 		
	 		}
	 		else{

	 			return 0;
	 		}
	 		$stmt->close();

	  		 }	

	  		 


}

