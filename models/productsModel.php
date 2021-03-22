<?php 
require_once "connection.php";

class viewProductsModel{

#ESTRUCUTURA DE PAGINACION
#--------------------------------------------------------------
	public static function ProductsModel($base, $tope, $table){
	

		 	// $stmt = connection::connect()->prepare("SELECT tab1.id,tab1.title, tab1.description, tab1.price, tab1.route, tab1.idcategory, tab2.id FROM $table tab1 INNER JOIN categorias tab2 ON tab1.idcategory = tab2.id WHERE tab1.enable = 0 AND tab2.status = 0 ORDER BY tab2.id ASC ");
		 	
		 	$stmt = connection::connect()->prepare("SELECT id,title, description, price, cant, route FROM $table WHERE enable = 0  ORDER BY idcategory ASC LIMIT $base, $tope");


		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();



		 }

		 		#PRODUCTOS POR ID DE CATEGORIA
		 		#-----------------------------------------------------------------------------------

		 		 public static function ProductsModelByCategory(	$dataCategoryModel, $table){
	

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


			$stmt = connection::connect()->prepare("SELECT title, description, price, route FROM $table WHERE title LIKE :title AND enable = 0");

			$stmt ->bindParam(":title",$dataModel["title"],PDO::PARAM_STR);

				if ($stmt -> execute()) {

		 		return $stmt->fetchAll();

		 		$stmt->close();
	
		 	} 	else{

		 		echo 0;

		 	}

	
		 	

		 }




}