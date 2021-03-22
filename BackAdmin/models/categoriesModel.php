<?php 

require_once "connection.php";

class categorieModel{

	#GUARDAR CATEGORIA
	#--------------------------------------------------------------------
	 public static function saveCategorieModel($dataModel, $table){

	 	$stmt = connection::connect()->prepare("INSERT INTO $table(category) VALUES(:category)");

	 	 	$stmt ->bindParam(":category",$dataModel,PDO::PARAM_STR);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


	 }

	 #VER CATEGORIAS
	 #---------------------------------------------------
	  public static function viewCategoriesModel($table){


		 	$stmt = connection::connect()->prepare("SELECT id, category FROM $table   ORDER BY category ASC");

		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();




	  }

	  #DESABILITAR LA CATEGORIA EN LA VISTA PRINCIPAL
	  #-----------------------------------------------------------------
	   public static function disableCategory($dataModel, $table){

	   	$stmt = connection::connect()->prepare("UPDATE $table SET status=:status  WHERE id = :id");

 		$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 		$stmt -> bindParam(":status", $dataModel["status"], PDO::PARAM_INT);


 			 		if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();

			}


	  #HABILITAR LA CATEGORIA EN LA VISTA PRINCIPAL
	  #-----------------------------------------------------------------
		 public static function enableCategory($dataModel, $table){

	   	$stmt = connection::connect()->prepare("UPDATE $table SET status=:status  WHERE id = :id");

 		$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 		$stmt -> bindParam(":status", $dataModel["status"], PDO::PARAM_INT);


 			 		if ($stmt -> execute()) {

 			 			return "ok";
 			 			
 			 		}else
 			 		{
 			 			return "error";

 			 		}
 			 			$stmt->close();



			 }

			 #EDITAR CATEGORIA
			 #-------------------------------------------------

			  public static function editCategoryModel($dataModel, $table){

			  	$stmt = connection::connect()->prepare("UPDATE $table SET category= :category WHERE id = :id");


			  	$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":category", $dataModel["category"], PDO::PARAM_STR);
	 			
	 			if ($stmt -> execute()) {

 			 			return 1;
 			 			
 			 		}else
 			 		{
 			 			return 0;

 			 		}
 			 			$stmt->close();



			  }

			  #BORRAR CATEGORIA
			  #-----------------------------------------------------
			   public static function deleteCategoryModel($dataIdCategoryModel, $table){

			   	  $stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = $dataIdCategoryModel");


 		 		if ($stmt->execute()) {

 		 			return 1;
 		 		
 		 	}
 		 	else{

 		 			return 0;
 		 	}


			   }

}