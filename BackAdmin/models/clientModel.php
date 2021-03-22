<?php 
require_once "connection.php";

class clientModel{

	#LISTADO DE CLIENTES ACTIVOS
	#-------------------------------------------------
 	 public static function viewClientModel($table){

 	 	$stmt = connection::connect()->prepare("SELECT tab1.iduser, tab1.identification, tab1.name, tab1.lastname, tab1.phone, tab1.estate, tab1.municipality, tab1.address, tab2.user FROM $table tab1 INNER JOIN usuarios tab2 ON tab1.iduser = tab2.id WHERE tab2.status = 0");
 		
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt->close();


 		}

 	public static function viewPurchaseClientModel($dataIdClientModel, $table){
 	 	
		$stmt = connection::connect()->prepare("SELECT iduser, identification, name, lastname, phone, estate, municipality, address FROM $table WHERE iduser = $dataIdClientModel");
 		$stmt -> execute();
		return $stmt->fetch();
		$stmt->close();


 		}

 		# ACTUALIZAR ES ESTADO DEL CLIENTE
 		#---------------------------------------------------------------------------
 		 public static function updateStatusClientModel($dataModel, $table){

 		 	$stmt = connection::connect()->prepare("UPDATE $table SET status = :status WHERE id = :id");

 		 			$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 		 			$stmt -> bindParam(":status", $dataModel["status"], PDO::PARAM_INT);
			
			if ($stmt -> execute()) {

 			 			return 1;
 			 			
 			 		}else
 			 		{
 			 			return 0;

 			 		}
 			 			$stmt->close();


 		 }

 		 #CLIENTES BLOQUEADOS
 		 #---------------------------------------------------
 		  public static function   viewClientEnableModel($table){

 		$stmt = connection::connect()->prepare("SELECT tab1.iduser, tab1.identification, tab1.name, tab1.lastname, tab1.phone, tab1.estate, tab1.municipality, tab1.address, tab2.user FROM $table tab1 INNER JOIN usuarios tab2 ON tab1.iduser = tab2.id WHERE tab2.status = 1");
 		
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt->close();


 		  }
		  
		  #TERMINOS Y CONDICIONES
		  #----------------------------------------------------
		  public static function saveTermsCondModel($dataModel, $table){
			  
		$stmt = connection::connect()->prepare("UPDATE $table SET header = :header, information = :information WHERE id = :id");
		
		$stmt ->bindParam(":id",$dataModel["id"],PDO::PARAM_INT);

		$stmt ->bindParam(":header",$dataModel["header"],PDO::PARAM_STR);
		$stmt ->bindParam(":information",$dataModel["information"],PDO::PARAM_STR);

		if ($stmt -> execute()) {
 	 	
 	 	return 1;

 	 				} 
 	 				else {

 	 					return 0;
 	 				}

 	 					$stmt->close();
			  
		  }

		   public static function  viewTermsCondModel($table){

		   	$stmt = connection::connect()->prepare("SELECT header, information FROM $table");

		   		$stmt -> execute();
				return $stmt->fetch();
				$stmt->close();


		   }


}