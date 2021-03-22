<?php 

require_once "connection.php";

class purchaseOrderModel{

	// SAVE PURCHASE ORDER
	// --------------------------------------------------------------------
	 public static function savePurchaseOrder($dataModelOrder, $table){


	 	$stmt = connection::connect()->prepare("INSERT INTO $table(idorder, iduser, reference,mount,convertion, branch) VALUES(:idorder, :iduser, :reference,:mount,:convertion, :branch)");

	  		$stmt ->bindParam(":idorder",$dataModelOrder["idorder"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":iduser",$dataModelOrder["iduser"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":reference",$dataModelOrder["reference"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":mount",$dataModelOrder["mount"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":convertion",$dataModelOrder["convertion"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":branch",$dataModelOrder["branch"],PDO::PARAM_INT);


	 if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


	 }
	 	// SAVE PURCHASE ORDER HAS PRODUCT
	 	// ---------------------------------------------------------------------

	 	 public static function savePurchaseOrderHasProduct($answerProduct,$table){


	 	$stmt = connection::connect()->prepare("INSERT INTO $table(idorder, idproduct, cant,price) VALUES(:idorder, :idproduct, :cant,:price)");

	 		$stmt ->bindParam(":idorder",$answerProduct["idorder"],PDO::PARAM_INT);
	 		$stmt ->bindParam(":idproduct",$answerProduct["idproduct"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":cant",$answerProduct["cant"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":price",$answerProduct["price"],PDO::PARAM_STR);
	  	


	 if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


	 }
	 // VIEW ORDER
	 // ---------------------------------------------------------
	  public static function viewPurchaseOrderModel( $dataModel, $table){

 	 $stmt = connection::connect()->prepare("SELECT id, idorder, iduser, reference, mount, convertion, date, status,branch FROM $table WHERE iduser = $dataModel ORDER BY date DESC");

	 if ($stmt -> execute()) {


 	 		return $stmt->fetchAll();
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();



	  }
	  // 	// VER LOS PRODUCTOS ASOCIADOS A ESE PEDIDO DE LA TABLA PUENTE
	  // VIEW PRODUCT LIST FROM PEDIDO HAS PRODUCTO
	  // ----------------------------------------------------------
	   public static function viewOrderProductList($dataSendModel, $table){


 			 $stmt = connection::connect()->prepare("SELECT idorder, idproduct, cant, price FROM $table WHERE idorder = $dataSendModel");

	 			if ($stmt -> execute()) {


 	 			return $stmt->fetchAll();
 	 	

 	 			} 
 	 				else {

 	 				return "error";
 	 					}

 	 				$stmt->close();




	   }

	   // DELETE TEMPORAL PRODUCTS FROM PURCHASE CAR
	   // ------------------------------------------------------------
	    public static function deletePurchaseCarTempData($dataModel, $table){



 			$stmt = connection::connect()->prepare("DELETE FROM $table WHERE iduser = $dataModel");



	 				 if ($stmt -> execute()) {


 	 						return "ok";
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


	    }

	    #Determinar el tipo de envío en modal de detalles de mis compras
	    #--------------------------------------------------------------------------
	     public static function DeliveryTypeModel($dataSendModel, $table){


 			 $stmt = connection::connect()->prepare("SELECT convertion, branch FROM $table WHERE idorder =$dataSendModel");

	 			if ($stmt -> execute()) {


 	 			return $stmt->fetch();
 	 	

 	 			} 
 	 				else {

 	 				return 0;
 	 					}


	     }

	    	#CONTADOR DE COMPRAS
		 	#--------------------------------------------

		 	 public static function totalPurchasesModel($idUser,$table){
	

			$stmt = connection::connect()->prepare("SELECT COUNT(*) AS count FROM $table WHERE iduser = $idUser");

		 	$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();



		 } 


}