<?php 

require_once "connection.php";


class categoryModel{

	#LISTADO DE CATEGORIAS EN EL SISTEMA DE COMPRAS
	#---------------------------------------------------------------------------------
		 public static function viewCategoriesModel($table){


		 	$stmt = connection::connect()->prepare("SELECT id, category FROM $table WHERE status = 0 ORDER BY category ASC");

		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


		 }


		 #BUSCAR CATEGORIA POR NOMBRE PARA QUE RETORNE ID
		 #-------------------------------------------------------------------------------

 			public static function viewCategoriesModelByName($dataCategoryModel,$table){


 			$stmt = connection::connect()->prepare("SELECT id FROM $table WHERE category = $dataCategoryModel");

		 	$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();


 			}


 }