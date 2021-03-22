<?php 
require_once "connection.php";


 class productsModel{

 	# SAVE PRODUCT
 	#-------------------------------------------------------------
 	 public static function saveNewModel($dataModel, $table){

 	 	$stmt = connection::connect()->prepare("INSERT INTO $table(idcategory,title,description,cant,price,route) VALUES( :idcategory,:title,:description,:cant,:price,:route)");

 	 	$stmt ->bindParam(":idcategory",$dataModel["idcategory"],PDO::PARAM_INT);
 	 	$stmt ->bindParam(":title",$dataModel["title"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":description",$dataModel["description"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":cant",$dataModel["cant"],PDO::PARAM_INT);
 	 	$stmt ->bindParam(":price",$dataModel["price"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":route",$dataModel["route"],PDO::PARAM_STR);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();
 			 }

 			#VIEW PRODUCTS
 			#------------------------------------------------------
 			public static function viewsProductsModel($table){

 			$stmt = connection::connect()->prepare("SELECT id,title, description, price, cant, route,enable FROM $table WHERE enable = 0 ORDER BY cant ASC");

		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();



 			  }


 			 #DELETE PRODUCT
 			 #-------------------------------------------------------------------
 			public static function deleteProductModel($dataModel, $table){

 		 	$stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
 		 	$stmt -> bindParam(":id",$dataModel, PDO::PARAM_INT);

 		 	if ($stmt->execute()) {

 		 			return "ok";
 		 		
 		 	}
 		 	else{

 		 		return "error";
 		 	}


 		 }

 			#UPDATE PRODUCT
 		 	#-------------------------------------------------------------------
 			 public static function updateProductModel($dataModel, $table){

 			 	$stmt = connection::connect()->prepare("UPDATE $table SET title=:title, description=:description, price=:price, cant=:cant, route=:route,enable=:enable WHERE id = :id");

 			 	$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":title", $dataModel["title"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":description", $dataModel["description"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":price", $dataModel["price"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":cant", $dataModel["cant"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":route", $dataModel["route"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":enable", $dataModel["enable"], PDO::PARAM_INT);

 			 		if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();
 		  }

 		  #VER CANTIDAD DE PRODUCTOS DEL PEDIDO 
 		  #-----------------------------------------------------


 		   public static function viewCantProductsInOrder($idOrder, $table) {

 			 $stmt = connection::connect()->prepare("SELECT idproduct, cant FROM $table WHERE idorder = $idOrder");

		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


 		   }




 		    	#VIEW PRODUCTS BY ID (SELECCIONA LOS PRODUCTO PERTENECIENTE A LA ORDEN Y ACTUALIZAR EL INV)
 			 	#------------------------------------------------------
 			 	 public static function viewsProductsInventoryModel($updateInventoryModel, $table){


 			 	$stmt = connection::connect()->prepare("SELECT id, cant FROM $table WHERE id = :id");

 			 	$stmt -> bindParam(":id", $updateInventoryModel["id"], PDO::PARAM_INT);
 			 	
 	
		 		$stmt -> execute();

		 		return $stmt->fetchAll();

		 		$stmt->close();



 			 	 }




 		   #ACTUALIZAR INVENTARIO (NO BORRAR)
 		   #---------------------------------------------------------

 		    public static function updateInventoryModel($updateTotalInventoryModel,  $table){

 		    	$stmt = connection::connect()->prepare("UPDATE $table SET cant=:cant  WHERE id = :id");

 			 	$stmt -> bindParam(":id", $updateTotalInventoryModel["id"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":cant", $updateTotalInventoryModel["cant"], PDO::PARAM_INT);


 			 		if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();


 		    }

 		    #DESABILITAR PRODUCTO
 		    #------------------------------------------------------------------
 		     public static function enableProductModel($enableProductIdModel,$table){

 		     	$stmt = connection::connect()->prepare("UPDATE $table SET enable=:enable  WHERE id = :id");

 			 	$stmt -> bindParam(":id", $enableProductIdModel["id"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":enable", $enableProductIdModel["enable"], PDO::PARAM_INT);


 			 		if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();





 		     }

 		     #VER PRODUCTOS DESACTIVADOS
 		     #--------------------------------------------------------------------------

 		      public static function viewsDisableProductsModel($table){

 			 	$stmt = connection::connect()->prepare("SELECT id,title, description, price, cant, route,enable FROM $table WHERE enable = 1");

		 		$stmt -> execute();

		 		return $stmt->fetchAll();

		 		$stmt->close();




 		      }

 		      #VER CANTIDADES DE PRODUCTOS POR CATEGORIA
 		      #------------------------------------------------------------------------------
 		       public static function viewCountProducts($dataModel, $table){



 		       	$stmt = connection::connect()->prepare("SELECT  COUNT(id) AS cant FROM $table WHERE idcategory = :idcategory");

 		       	$stmt -> bindParam(":idcategory", $dataModel["idcategory"], PDO::PARAM_STR);
		 		
		 		$stmt -> execute();

		 		return $stmt->fetchAll();

		 		$stmt->close();



 		       }

 		       #VER PRODUCTOS POR ID
 		       #---------------------------------------------------------------------------------
 		        public static function ViewProductById($dataModel, $table){


 		        $stmt = connection::connect()->prepare("SELECT id, idcategory,title, price, cant FROM $table WHERE idcategory = :idcategory");

 		        $stmt -> bindParam(":idcategory", $dataModel["idcategory"], PDO::PARAM_INT);
		 		
		 		$stmt -> execute();

		 		return $stmt->fetchAll();

		 		$stmt->close();

 		        }

 		        #DESABILITAR PRODUCTO POR IDCATEGORY
 		        #--------------------------------------------------------------------------------------
 		  //        public static function disableProductByIdCategory($dataProductModel, $table){


 		  //       	$stmt = connection::connect()->prepare("UPDATE $table SET idcategory=:enable ,enable=:enable WHERE id = :id");
 				
 				// 		$stmt -> bindParam(":id", $dataProductModel["id"], PDO::PARAM_INT);
 				// 		$stmt -> bindParam(":enable", $dataProductModel["enable"], PDO::PARAM_INT);

 		 	// 	if ($stmt->execute()) {

 		 	// 		return 1;
 		 		
 		 	// }
 		 	// else{

 		 	// 		return 0;
 		 	// }






 		         // }


 }