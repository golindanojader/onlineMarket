<?php 


require_once "connection.php";

#VIEWS PRODUCTS
#---------------------------
class viewsProductsModel{

	 public static function productModel($base, $tope, $table){


			 	
		 	$stmt = connection::connect()->prepare("SELECT id,title, description, price, cant, route FROM $table WHERE enable = 0  ORDER BY idcategory ASC LIMIT $base, $tope");

		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();



	 }

	 // SAVE TEMPORAL REGISTER IN PURCHASE CAR
	  public static function purchaseCar($dataModel,$table){

 $stmt = connection::connect()->prepare("INSERT INTO $table(iduser, idproduct, title,cant,price,total) VALUES(:iduser, :idproduct, :title,:cant,:price,:total)");

	  		$stmt ->bindParam(":idproduct",$dataModel["idproduct"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":iduser",$dataModel["iduser"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":title",$dataModel["title"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":cant",$dataModel["cant"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":price",$dataModel["price"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":total",$dataModel["total"],PDO::PARAM_STR);

 if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();

 	 				}


#VIEW PRODUCT IN PURCHASE CAR
#------------------------------------------------------------

 public static function viewPurchaseCarView($iduserModel, $table){


 	 $stmt = connection::connect()->prepare("SELECT iduser,idproduct, title,cant,price,total FROM $table WHERE iduser = $iduserModel ");

	 if ($stmt -> execute()) {


 	 		return $stmt->fetchAll();
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();

 	 				}


 #VIEW TOTAL PRICE IN PRODUCT IN PURCHASE CAR
#------------------------------------------------------------

 public static function TotalSumPurchaseCarView($iduserModel, $table){


 	$stmt = connection::connect()->prepare("SELECT SUM(total) as total FROM $table WHERE iduser = $iduserModel");

	 if ($stmt -> execute()) {


 	 		return $stmt->fetch();
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();

 	 				}


 	#UPDATE PRODUCTS IN PURCHASE CAR
 	#------------------------------------------------------------------

 	 	 public static function updatePurchaseCar($dataModel, $table){

 	 	$stmt = connection::connect()->prepare("UPDATE $table SET cant= :cant,  total= :total WHERE idproduct = :idproduct and iduser = :iduser");

 	 	$stmt -> bindParam(":idproduct", $dataModel["idproduct"], PDO::PARAM_INT);
 	 	$stmt -> bindParam(":iduser", $dataModel["iduser"], PDO::PARAM_INT);
 	 	$stmt -> bindParam(":cant", $dataModel["cant"], PDO::PARAM_INT);
 	 	$stmt -> bindParam(":total", $dataModel["total"], PDO::PARAM_STR);
 	 				

 	 				 		 if ($stmt -> execute()) {


 	 						return "ok";
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();




 	 				 }

 	 #COMPARATE PURCHASE CAR PRODUCTS
 	 #---------------------------------------------------------
 	 				 
 	 				  public static function comparateModel($dataComparateModel, $table){
 	 				 

 	 				   	 $stmt = connection::connect()->prepare("SELECT idproduct, iduser FROM $table WHERE idproduct = :idproduct and iduser = :iduser");

	 					$stmt -> bindParam(":idproduct",$dataComparateModel["idproduct"],PDO::PARAM_INT);
	 					$stmt -> bindParam(":iduser",$dataComparateModel["iduser"],PDO::PARAM_INT);	
	 					$stmt -> execute();
	 					return $stmt ->fetch();
 	 					$stmt->close();

				 }


	#DELETE PRODUCTO IN THE PURCHASE CAR
	#----------------------------------------------------------------------
 						 public static function deleteProductModel($dataModel, $table){

 						 	$stmt = connection::connect()->prepare("DELETE FROM $table WHERE idproduct = :idproduct and iduser = :iduser");


	 						$stmt -> bindParam(":idproduct",$dataModel["idproduct"],PDO::PARAM_INT);
	 						$stmt -> bindParam(":iduser",$dataModel["iduser"],PDO::PARAM_INT);


	 				 if ($stmt -> execute()) {


 	 						return "ok";
 	 	

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();



 						 }

 	 #VIEW CONVERSION DOLLAR
 	 #---------------------------------------------

 						  public static function conversionDollarModel($table){


 						  		$stmt = connection::connect()->prepare("SELECT tasa FROM $table");


 						  				$stmt -> execute();

		 							return $stmt->fetch();

		 							$stmt->close();
 						  }


 	# PROCESS PURCHASE(PROCESAR COMPRA)
 	# VALIDACION PARA DETERMINAR SI EL USUARIO TIENE PRODUCTOS EN EL CARRITO DE COMPRAS
	#----------------------------------------------------
 						   public static function processPurchaseModel($dataModel, $table){


 						   	 $stmt = connection::connect()->prepare("SELECT iduser FROM $table WHERE iduser = $dataModel");

	 							if ($stmt -> execute()) {


 	 							return $stmt->fetch();
 	 	

 	 									} 
 	 										else {

 	 												return "error";
 	 										}

 	 												$stmt->close();


 						   }

 	 # PROCESS PURCHASE CAR (VALIDAR LOS PRODUCTOS PARA PROCESAR COMPRA)
 	 # -----------------------------------------------
 						     public static function processProductPurchaseModel($dataModel, $table){

 						   	 $stmt = connection::connect()->prepare("SELECT idproduct, cant, price FROM $table WHERE iduser = $dataModel");

	 							if ($stmt -> execute()) {


 	 							return $stmt->fetchAll();
 	 	

 	 									} 
 	 										else {

 	 												return "error";
 	 										}

 	 												$stmt->close();


					}
					// VIEW PRODUCT NAME IN LIST OF PURCHASE
					// ------------------------------------------------------------
					 public static function viewProductName($dataSend, $table){

 						   	 $stmt = connection::connect()->prepare("SELECT title FROM $table WHERE id = :id");

 						   	 	$stmt -> bindParam(":id",$dataSend["id"],PDO::PARAM_INT);


	 							if ($stmt -> execute()) {


 	 							return $stmt->fetchAll();
 	 	

 	 									} 
 	 										else {

 	 												return "error";
 	 										}

 	 												$stmt->close();



					 }

					 #COMPARATE CANT
					 #---------------------------------------------------------------

					  public static function comparateCantModel($idProduct, $table){

					  	$stmt = connection::connect()->prepare("SELECT cant FROM $table WHERE id = $idProduct");



	 							if ($stmt -> execute()) {


 	 							return $stmt->fetch();
 	 	

 	 									} 
 	 										else {

 	 												return "error";
 	 										}

 	 												$stmt->close();



					  }




		 		 public static function productsModelByCategoryModel($base, $tope, $dataCategoryModel, $table){
	

				$stmt = connection::connect()->prepare("SELECT id, cant, title, description, price, route FROM $table WHERE idcategory = $dataCategoryModel LIMIT $base, $tope");

		 		$stmt -> execute();

		 		return $stmt->fetchAll();

		 		$stmt->close();



		 }


		 		 #PRODUCTOS POR ID DE CATEGORIA
		 		#-----------------------------------------------------------------------------------
		 		 public static function ProductsModelByCategory($dataCategoryModel, $table){
	

				$stmt = connection::connect()->prepare("SELECT title, description, price, route FROM $table WHERE idcategory = $dataCategoryModel AND enable = 0");

		 		$stmt -> execute();

		 		return $stmt->fetchAll();

		 		$stmt->close();



		 }
		 	#CONTADOR DE PRODUCTOS
		 	#--------------------------------------------

		 	 public static function ProductsCount($table){
	

			$stmt = connection::connect()->prepare("SELECT COUNT(*) AS count FROM $table WHERE enable = 0 ");

		 	$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();



		 }


		 #BÚSQUEDA DE PRODUCTOS POR NOMBRE (BARRA DE NAVEGACIÓN)
		 #-----------------------------------------------------------------------------

		  public static function ProductsModelFromAjax($dataModel, $table){


			$stmt = connection::connect()->prepare("SELECT id, cant, title, description, price, route FROM $table WHERE title LIKE :title AND enable = 0");

			$stmt ->bindParam(":title",$dataModel["title"],PDO::PARAM_STR);

				if ($stmt -> execute()) {

		 		return $stmt->fetchAll();

		 		$stmt->close();
	
		 	} 	else{

		 		echo 0;

		 	}

	
		 	

		 }


					  

		}