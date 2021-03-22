<?php 
require_once "connection.php";


class purchaseOrderModel{



	 #VIEW ALL ORDER
	 #------------------------------------------------
	 public static function viewPurchaseOrderModel($table){


	 		 	$stmt = connection::connect()->prepare("SELECT id,idorder, iduser, reference, mount, convertion,status, date, branch FROM $table WHERE status = 0 ORDER BY date ASC");


		 					$stmt -> execute();

		 					return $stmt->fetchAll();

		 					$stmt->close();



	 		}

# TRAER LOS ID DE PRODCTOS REFERENTES AL NUMERO DE ORDEN	
# ----------------------------------------------------------------------
 public static function viewIdProductPurchaseOrderModel($dataIdOrderModel, $table){


 
 	 	 $stmt = connection::connect()->prepare("SELECT tab1.idproduct, tab1.cant, tab1.price, tab1.idorder,  tab2.title  FROM $table tab1 INNER JOIN productos tab2  ON tab1.idproduct = tab2.id WHERE  tab1.idorder  = $dataIdOrderModel");

	 	   					$stmt -> execute();
		 					return $stmt->fetchAll();

		 					$stmt->close();



 	// $stmt = connection::connect()->prepare("SELECT idorder, idproduct, cant, price FROM $table WHERE idorder = $dataIdOrderModel");

 	// 							$stmt -> execute();
							
		// 						return $stmt->fetchAll();
							
		// 						$stmt->close();
							



 }

 	#TRAER LOS NOMBRE DE PRDUCTOS POR EL NUMERO DE ORDEN
 	#----------------------------------------------------------------------
 	 public static function viewProductNamePurchaseOrderModel($dataProductNameModel, $table){


	$stmt = connection::connect()->prepare("SELECT title FROM $table WHERE id = :id");

	$stmt ->bindParam(":id",$dataProductNameModel["id"],PDO::PARAM_INT);

 								$stmt -> execute();
							
								return $stmt->fetchAll();
							
								$stmt->close();



 	 }

 	 # ACTUALIZAR EL ESTADO DE LA ORDEN 
 	 #----------------------------------------------------------------------
 	  public static function updateStatusPurchaseModel($dataModel, $table){


 	  	$stmt = connection::connect()->prepare("UPDATE $table SET status= :status WHERE idorder = :idorder");

 			 	$stmt -> bindParam(":idorder", $dataModel["idorder"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":status", $dataModel["status"], PDO::PARAM_INT);

	if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();


 	  }

 	   	 # VER ESTADOS ENVIADOS
	 	 #------------------------------------------------------------------
	 	 
	 	  public static function viewsStatusSendPurchaseOrderModel($table){


	 	  		$stmt = connection::connect()->prepare("SELECT id,idorder, iduser, reference, mount, convertion,status, date FROM $table WHERE status = 1 ORDER BY date ASC");


		 					$stmt -> execute();

		 					return $stmt->fetchAll();

		 					$stmt->close();


	 	  }


	 	  # VER ESTADOS OK
	 	  #-------------------------------------------------------------------------
	 	  
	 	   public static function viewsStatusCheckPurchaseOrderModel($table){


	 	   	 	  		$stmt = connection::connect()->prepare("SELECT id,idorder, iduser, reference, mount, convertion,status, date FROM $table WHERE status = 2 ORDER BY date DESC");


		 					$stmt -> execute();

		 					return $stmt->fetchAll();

		 					$stmt->close();




	 	   }


	 	   #VER ESTADO DELETE
	 	   #---------------------------------------------------------------------------
	 	 
	 	  public static function viewStatusDeletePurchaseOrderModel($table){

	 	  		$stmt = connection::connect()->prepare("SELECT id,idorder, iduser, reference, mount, convertion,status, date FROM $table WHERE status = 3 ORDER BY date ASC");


		 					$stmt -> execute();

		 					return $stmt->fetchAll();

		 					$stmt->close();



	 	  }

	 	   	// TABLAS										/COLUMNAS*/
	 	   	// PEDIDO->									(IDORDER-IDUSER -DATE)
	 	   	// CLIENTES->								(IDENTIFICATION-IDUSER-NAME-LASTNAME-PHONE-ESTATE-MUNICIPALITY-ADDRESS)
	 	   	// DATOS DE CABECERA
	 	   public static function printBillReporHeaderModel($idOrderModel, $table){

	 	   	 $stmt = connection::connect()->prepare("SELECT idorder,date, mount, identification, name, lastname, phone, estate, municipality, address FROM  $table  INNER JOIN clientes ON pedido.iduser = clientes.iduser WHERE pedido.idorder = $idOrderModel");
		 				

	 	   					$stmt -> execute();
		 					return $stmt->fetch();

		 					$stmt->close();


	 	   }

	 	   	// TABLAS 
  			// PEDIDO_HAS_PRODUCTO->	(IDORDER-IDPRODUCT-CANT-PRICE)
			// PRODUCTOS->							(ID-TITLE)
			
	 	   #IMPRIMIR CUERPO DE LA FACTURA
	 	   #-----------------------------------------------------------------------
	 	    public static function printBillReporModel($idOrderModel, $table){

	 	 	$stmt = connection::connect()->prepare("SELECT tab1.idproduct, tab1.cant, tab1.price,  tab2.title  FROM $table tab1 	INNER JOIN productos tab2  ON tab1.idproduct = tab2.id WHERE  tab1.idorder  = $idOrderModel");
	 	     	 			
	 	     	 	$stmt -> execute();

		 			return $stmt->fetchAll();
					
					$stmt->close();

	 	    }


	 	    	 // VER ORDENES PENDIENTES EN EL HOME
	 		 	    // ---------------------------------------------------------

 					public static function viewCountOrdersModel($table){


 					$stmt = connection::connect()->prepare("SELECT COUNT(*) as id FROM $table WHERE status = 0");


		 			$stmt -> execute();

		 			return $stmt->fetch();

		 			$stmt->close();

 					}




}