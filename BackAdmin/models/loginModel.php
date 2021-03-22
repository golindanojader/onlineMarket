<?php 
require_once "connection.php";

class loginModel{


	# Login
	#----------------------------------------------------------------
	 public static function adminLoginModel($dataModel, $table){

	 $stmt = connection::connect()->prepare("SELECT id, user, name, lastname, password,intents,rol,enable FROM $table WHERE user = :user");
		
		$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();

	 		}

	 		# Intents
	 		#---------------------------------------------------------
	 	 public static function intentsModel($dataModel, $table){

 		$stmt = connection::connect()->prepare("UPDATE $table SET intents = :intents WHERE user = :user");
 		$stmt -> bindParam(":intents", $dataModel["upgradeIntents"], PDO::PARAM_INT);
 		$stmt -> bindParam(":user", $dataModel["actualUser"], PDO::PARAM_STR);
 		if ($stmt -> execute()) {

 			return "ok";
 			
 		}
 		else{

 			return "error";
 		}


 	 }		




}