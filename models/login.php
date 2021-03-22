<?php 

require_once "connection.php";

class enterLoginModel{

 public static function modelEnterLogin($modelData, $table){

		$stmt = connection::connect()->prepare("SELECT id, user,password,intents,rol,validate FROM $table WHERE user = :user");
		$stmt -> bindParam(":user", $modelData["user"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();

 			}


 	public static function intentsModel($modelData, $table){

 		$stmt = connection::connect()->prepare("UPDATE $table SET intents = :intents WHERE user = :user");
 		$stmt -> bindParam(":intents", $modelData["upgradeIntents"], PDO::PARAM_INT);
 		$stmt -> bindParam(":user", $modelData["actualUser"], PDO::PARAM_STR);
 		if ($stmt -> execute()) {

 			return "ok";
 			
 		}
 		else{

 			return "error";
 		}

 				$stmt->close();
 	 }		
 	 #VER EL ESTADO DEL CLIENTE PARA DETERMINAR SI SE ENCUENTRA BLOQUEDO
 	 #---------------------------------------------------------------------------------
 	  public static function viewStatusClientModel($dataUserModel, $table){

 	  	$stmt = connection::connect()->prepare("SELECT status FROM $table WHERE id = $dataUserModel");
		
		$stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();

 	  }

 	  

 	   // VALIDAR INGRESO CON AJAX
	  // #ESTE MÉTODO PERMITE VALIDAR LA CUENTA DEL USUARIO CUANDO INGRESA POR PRIMERA VEZ
	 #----------------------------------------------------------------------------------------------------------------
 	  public static function  validateAccessModel($dataModel, $table){

 	   	$stmt = connection::connect()->prepare("SELECT validate FROM $table WHERE user = :user");
 	   	$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();

 	 

 	   }

 	   	#VALIDAR CLAVE TEMPORAL
 	   	#-----------------------------------------------
 	    public static function  firstAccessModel($dataModel, $table){


 	    $stmt = connection::connect()->prepare("SELECT user,temppass FROM $table WHERE user = :user AND temppass=:temppass");
		$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
		$stmt -> bindParam(":temppass", $dataModel["temppass"], PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();


 	    }
 	    #CAMBIAR ESTADO "VALIDATE A 1"
 	    #
 	     public static function changeStatusValidateModel ($dataModelValidate, $table){

 	    $stmt = connection::connect()->prepare("UPDATE $table SET validate = :validate WHERE user = :user");
 		$stmt -> bindParam(":user", $dataModelValidate["user"], PDO::PARAM_STR);
 		$stmt -> bindParam(":validate", $dataModelValidate["validate"], PDO::PARAM_INT);
 		if ($stmt -> execute()) {

 			return 1;
 			
 		}
 		else{

 			return 0;
 		}

 				$stmt->close();

 	     }
 	     	#BORRAR DATOS TEMPORALES
 	     	#---------------------------------------------
 	      public static function deleteTempDataModel($dataModel, $table){

 	      	$stmt = connection::connect()->prepare("DELETE FROM $table WHERE user = :user AND temppass = :temppass");
 	      	$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
			$stmt -> bindParam(":temppass", $dataModel["temppass"], PDO::PARAM_INT);

			if ($stmt -> execute()) {

 			return 1;
 			
 		}
 		else{

 			return 0;
 		}

 				$stmt->close();


 	      }

 	    #VALIDAR QUE EXISTA EL USUARIO CON AJAX(PARA PROCEDER CON LA RECUERACION DE LA CLAVE)
	    #--------------------------------------------------------------------------------------------------------------
 	      public static function  validateExistEmailAjaxModel($dataModel, $table){

 	     $stmt = connection::connect()->prepare("SELECT user FROM $table WHERE user = :user");
 	     $stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
		
 	    $stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();

 	       }

 	    #SOLICITAR LA CLAVE DE USUARIO
		#------------------------------------------
 	        public static function   sendPassAjaxModel($dataModel, $table){

 	      $stmt = connection::connect()->prepare("SELECT password, validate FROM $table WHERE user = :user");
 	      $stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
		
 	    $stmt -> execute();
		return $stmt -> fetch();
 		$stmt->close();


 	        }

 	    #ACUTALIZAR LA CLAVE
 	    #---------------------------------------
 	    public static function  generateNewPassModel($dataModelPass, $table){
 	    $stmt = connection::connect()->prepare("UPDATE $table SET password = :password WHERE user = :user");
 		$stmt -> bindParam(":user", $dataModelPass["user"], PDO::PARAM_STR);
 		$stmt -> bindParam(":password", $dataModelPass["password"], PDO::PARAM_STR);
 		if ($stmt -> execute()) {

 			return 1;
 			
 		}
 		else{

 			return 0;
 		}

 				$stmt->close();


 	         }

 	     public static function    generateNewTempPassModel($dataModelTempPass, $table){

 	    $stmt = connection::connect()->prepare("UPDATE $table SET temppass = :temppass WHERE user = :user");
 		$stmt -> bindParam(":user", $dataModelTempPass["user"], PDO::PARAM_STR);
 		$stmt -> bindParam(":temppass", $dataModelTempPass["temppass"], PDO::PARAM_INT);
 		if ($stmt -> execute()) {

 			return 1;
 			
 		}
 		else{

 			return 0;
 		}

 				$stmt->close();


 	          }



}