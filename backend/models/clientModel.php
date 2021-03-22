<?php 
require_once "connection.php";


class clientModel{

	 public static function deleteClientModel($dataModel, $table){

	 	 					$stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = :id and user = :user");


	 						$stmt -> bindParam(":id",$dataModel["id"],PDO::PARAM_INT);
	 						$stmt -> bindParam(":user",$dataModel["user"],PDO::PARAM_STR);


	 				 if ($stmt -> execute()) {


 	 						return "ok";
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


	 }


	  public static function   viewTermsCondModel($table){

	  			$stmt = connection::connect()->prepare("SELECT header, information FROM $table");

		   		$stmt -> execute();
				return $stmt->fetch();
				$stmt->close();



	  }


	   public static function  validatePassFromAjaxModel($dataPassModel, $table){
	 
	   	$stmt = connection::connect()->prepare("SELECT user,  id FROM $table WHERE  password = $dataPassModel");
		
   				$stmt -> execute();
				return $stmt->fetch();
				$stmt->close();




	   }


 public static function  validatePassModel($dataModel, $table){

	$stmt = connection::connect()->prepare("SELECT user, id, password FROM $table WHERE id = :id AND user = :user  AND password = :password");
			
			$stmt -> bindParam(":user",$dataModel["user"],PDO::PARAM_STR);	
			$stmt -> bindParam(":id",$dataModel["id"],PDO::PARAM_INT);
	 		$stmt -> bindParam(":password",$dataModel["password"],PDO::PARAM_STR);	

 			   		$stmt -> execute();
				return $stmt->fetch();
				$stmt->close();


 			}


 			 public static function  updatePassModel($dataModel, $table){


 		$stmt = connection::connect()->prepare("UPDATE $table SET password = :password WHERE id = :id and user = :user");

 	 	$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 	 	$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
 	 	$stmt -> bindParam(":password", $dataModel["password"], PDO::PARAM_STR);
 	 				

 	 				 		 if ($stmt -> execute()) {


 	 						return 1;
 	 	

 	 				} 
 	 				else {

 	 					return 0;
 	 				}

 	 					$stmt->close();



 			 }


}