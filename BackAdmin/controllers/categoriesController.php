<?php 

class categorieController{

#SAVE CATEGORIES
#--------------------------------------------------
 public static function saveCategorieController(){

 	if (isset($_POST["categorieName"])) {
 		

 	$dataController=$_POST["categorieName"];

 	$answer = categorieModel::saveCategorieModel($dataController, "categorias");

 		if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡Categoría creada correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "categories";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;

	 	
								}

 				

 					}

		 }
#VIEW CATEGORIES
#------------------------------------------------------
 public static function viewCategoriesController(){


 $answer = categorieModel::viewCategoriesModel("categorias");

foreach ($answer as $row => $item) {
							
echo '<option value="'.$item["id"].'">'.$item["category"].'</option>';


					 }

 			}


 	#VIEW TABLE CATEGORIES 		
 	#-----------------------------------------------------
 
  public static function viewTableCategoriesController(){

  	// CONSULTA TODAS LAS CATEGORIAS
	$answer =  categorieModel::viewCategoriesModel("categorias");

	foreach ($answer as $row =>$item) {


	$dataController = array("idcategory"=>$item["id"]);


	// VER PRODUCTOS ASOCIADOS A CADA CATEGORIA
	$answerCountProducts = productsModel::viewCountProducts($dataController, "productos");


	// CANTIDAD DE PRODUCTOS POR CATEGORIA
	foreach ($answerCountProducts as $value) {

	// TRAER LAS DESCRIPCIONES DE LOS PRODUCTOS POR CATEGORIA
	$answerProductDescription =  productsModel::ViewProductById($dataController, "productos");

	if ($value["cant"] == 0 ) {

		#NOTA: Se crean las variables ($categoryId ,  $categoryName)  con el fin de que puedan ser mostradas en el moda de editar y eliminar
		#ya que de otra forma no se visualiza por la validación de cantidad de productos asociados a categoria
		$categoryId = $item["id"];
		$categoryName = $item["category"];
		$display = "";


	$dataController = array("id" => $item["id"],  "status" => 1);
	$status = "btn btn-warning fa fa-remove";
	// SI LA CANTIDAD VIENE EN CERO NO SE MUESTRA LA CATEGORIA EN LA PAGINA PRINCIPAL
	 $answerDisableCategory= categorieModel::disableCategory($dataController, "categorias");

	}
	else{

		$status = "btn btn-success fa fa-check";

		#NOTA: Se crean las variables ($categoryId ,  $categoryName)  con el fin de que puedan ser mostradas en el moda de editar y eliminar
		#ya que de otra forma no se visualiza por la validación de cantidad de productos asociados a categoria
		$categoryId = $item["id"];
		$categoryName = $item["category"];
		$display = "style=display:none";
	}
			 }
		

$row = $row +1;
echo '
  		
				<tr>
					<td>'.$row.'</td>
					<td>'.$item["category"].'</td>
					<td>'.$value["cant"].'</td>


					<td><a href="#detail'.$row.'"  data-toggle="modal">
					<button type="button"  class="form-control-sm  btn btn-info fa fa-eye" ></button></a>

				<div class="modal fade" id="detail'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:12px">
				<div class="modal-header  ">


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">
				<p style="Font-size:15px">'.$item["category"].'</p>


			<table class="table table-striped">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Precio</th>
				<th>Cant</th>
			</tr>
		</thead>';

				foreach ($answerProductDescription as $rowItem =>$item) {

		echo

		'<tr>
			<td>'.$item["title"].'</td>
			<td>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
			<td>'.$item["cant"].'</td>
		</tr>';

					
				}

		echo '		
		
	</table>


					</td>
				




					<td><span class="form-control-sm  '.$status.'" ></span></td>

					

				<td><a href="#edit'.$row.'"  data-toggle="modal">
				<button type="button"  class="form-control-sm  btn btn-primary fa fa-pencil" ></button></a>

				<div class="modal fade" id="edit'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:12px">
				<div class="modal-header  ">
							<h5>Editar Categoria</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">



				<div class="row container-fluid">
					
				<div  class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
					

				<form method="post" enctype="multipart/form-data">
				<input type="text" class="form-control form-control-sm"  name="editCategoryName" value="'.$categoryName.'">
				<input type="text" class="form-control form-control-sm"  name="editCategoryId" value="'.$categoryId.'" style="display:none">
				

				</div>

					<div  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
					
				<input type="submit" class="form-control btn-primary btn-sm"  value="Enviar	">
				</form>


					</div>
				</div>
			

			
				</td>







				<td><a href="#delete'.$row.'"  data-toggle="modal">
				<button type="button"  class="form-control-sm  btn btn-danger fa fa-trash" '.$display.'></button></a>


				<div class="modal fade" id="delete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:12px">
				<div class="modal-header  ">


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">



				<div class="row container-fluid">
					
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h5>¿Desea Eliminar esta categoría?</h5>
				<br>
				</div>
				</div>


				<div class="row container-fluid">
					
				<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						


				<form method="post" enctype="multipart/form-data">
				<p style="font-size:15px">'.$categoryName.'</p>
		
				<input type="text" class="form-control form-control-sm"  name="editCategoryId" value="'.$categoryId.'" style="display:none">
				

				</div>

					<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					
				<input type="submit" class="form-control btn-primary btn-sm"  value="Sí, eliminar esta categoría">

				</form>


					</div>
				</div>

				</td>




					</tr>';



			
	
			}

  	}

  	#EDIT CATEGORY
  	#--------------------------------------------------
  	 public static function editCategoryController(){

  	 		if (isset($_POST["editCategoryName"]) &&
  	 					 $_POST["editCategoryId"]) {

  	 					$dataController = array("id"			 =>$_POST["editCategoryId"],
  	 															  "category" =>  $_POST["editCategoryName"]);

		
  	 		$answer = categorieModel::editCategoryModel($dataController,"categorias");

  	 	 		if ($answer == 1) {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡Categoría actualizada correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "categories";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;

	 	
								}
  	 			
  	 					}

  	 			}	


  	 			#DELETE CATEGORY (SIEMPRE Y CUANDO NO TENGA PRODUCTOS ASOCIADOS AL MISMO)
  	 			#-------------------------------------------

			 public static function deleteCategoryController(){


  	 	    if (isset($_POST["editCategoryId"]))  {


  	 	    			// NOTA: Se pasa un valor entero como array ya que el modelo de productos recibe de varios métodos
  	 					$dataController = array("idcategory"=>$_POST["editCategoryId"]);

  	 					// Esta variable se envía al modelos para proceder a eliminar la categoria
  	 					$dataIdCategoryController = $_POST["editCategoryId"];

  	 					// VER PRODUCTOS ASOCIADOS A LA CATEGORIA
						// $answerProducts = productsModel::ViewProductById($dataController, "productos");

						//  foreach ($answerProducts  as $row => $item) {

						// $dataProductController = array("id"=>$item["id"], "idcategory"=>0, "enable"=> 1);
							
						// $answerDeleteProducts = productsModel::disableProductByIdCategory($dataProductController, "productos");
						
							$answerDeleteCategory = categorieModel::deleteCategoryModel($dataIdCategoryController, "categorias");
						
						
					
						


						 		if ($answerDeleteCategory  == 1) {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡Categoría eliminada correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "categories";
									}


															 	});

															 	</script>';


										}
										else {
											echo "error";

	 	
								 }
				 		}
				}




}
