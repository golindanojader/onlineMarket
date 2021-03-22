<?php 


require_once "connection.php";

class exitModel{


 public static function deleteProductsInPurchaseCarModel($idUser, $table){


 				$stmt = connection::connect()->prepare("DELETE FROM $table WHERE iduser = $idUser");
 				if ($stmt -> execute()) {


 	 						return "ok";
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


 

 				}


}