<?php 

class viewProductsController{

 public static function ProductsController(){


	if (isset($_GET["categoria"]) =="" ) {

		if (isset($_GET["page"])) {

			$page = $_GET["page"];
		#TRAER LOS PRIMEROS DOCE PRODUCTOS
		#-----------------------------------------------
		$table = "productos";
		$base = 0;
		$tope = 12;

			if ($page == 1) {
				
		$answer = viewProductsModel::ProductsModel($base, $tope, $table);


		foreach ($answer  as $row  => $item) {

				

	echo '<div class="mainProducts"><img class="img-size" src="Backadmin/views/img/'.substr($item["route"],10).'">
			   <div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs. </div></div></a>';

													}


			}elseif ($page == 2) {


				$base = 12;
				$answer = viewProductsModel::ProductsModel($base, $tope, $table);


		foreach ($answer  as $row  => $item) {

				

	echo '<div class="mainProducts"><img class="img-size" src="Backadmin/views/img/'.substr($item["route"],10).'">
			  <div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs. </div></div></a>';

					}

			}
			
else{
// NOTA: esta variable  $baseDinamica resta 12  para seguir la secuencia de números
// CASO 1 ----------BASE 0 primeros 12 productos
// CASO 2 ----------BASE 12
// 
// DESDE AQUÍ LOS VALORES SON DINÁMICOS
// CASO 3 ----------BASE 24
// CASO 4 ----------BASE 36

   $baseDinamica = 12;
   $base = ($page * $baseDinamica) - $tope;

	
   $answer = viewProductsModel::ProductsModel($base, $tope, $table);


		foreach ($answer  as $row  => $item) {

				

	echo '<div class="mainProducts"><img class="img-size" src="Backadmin/views/img/'.substr($item["route"],10).'">
			  <div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs. </div></div></a>';

													}


					}


			}else{

					$table = "productos";
					$base = 0;
					$tope = 12;
						
					$answer = viewProductsModel::ProductsModel($base, $tope, $table);

					
						foreach ($answer  as $row  => $item) {

		
			echo '<div class="mainProducts"><img class="img-size" src="Backadmin/views/img/'.substr($item["route"],10).'">
					  <div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs. </div></div></a>';

					}
				}
				
			}	


			// TODO. COLOCAR LA PAGINACION A  LISTA DE PRODUCTOS POR CATEGORIA
	
						elseif($_GET["categoria"]!=""){


							$dataCategoryController  = $_GET["categoria"];

							$answer = viewProductsModel::ProductsModelByCategory(	$dataCategoryController, "productos");



						foreach ($answer  as $row => $item) {


			echo '	<div class="mainProducts"><img class="img-size" src="Backadmin/views/img/'.substr($item["route"],10).'">
						<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs. </div></div></a>';


										}


							 }
						


			
		 	 }

		 	 #VER PAGINACION
		 	 #-----------------------------------------

		  public static function productListController(){
  		

  			if (isset($_GET["categoria"])=="") {

  			$table = "productos";
			$base = 0;
			$tope = 12;
		
		  	$answer= viewProductsModel::ProductsCount($table);

						$row = 	$answer["count"];

						return $row;

						}else{

							$dataCategoryController  = $_GET["categoria"];

							$answer = viewProductsModel::ProductsModelByCategory(	$dataCategoryController, "productos");

							foreach ($answer as $row =>$item) {
						
						$row = $row + 1;
		
					}

						return $row;


						}

					

		  }

		  	#BUSQUEDA DE PRODUCTOS CON AJAX (Input de navegación)
		  	#--------------------------------------------------------------------
		   public static function ProductsControllerFromAjax($dataAjax){

			 
			$dataController = array("title"=>"%".$dataAjax."%");

				foreach ($dataController as  $value) {
		
				if ($value == "%%") {

					

					}else{

		   $answer = viewProductsModel::ProductsModelFromAjax($dataController, "productos");

		   	   if ($answer == "") {

		   	echo "Sin datos de la BD";
		   	
		   }else{
	
		 	 foreach ($answer as $row=>$item) {   

			echo '	<div class="mainProducts"><img class="img-size" src="Backadmin/views/img/'.substr($item["route"],10).'">
						<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"]).' Bs. </div></div></a>';	



		   			
		   					 	 			}
		 			
		 							}

							}


					}

		   }

}

