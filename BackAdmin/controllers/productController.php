<?php 

class productsController{

// SAVE PRODUCTS
// ----------------------------------------------------------------------------------
	 public static function saveNewPorductController(){


	 if (isset($_POST["categoryName"])&&
	 			  $_POST["productTitle"]&&
	 			  $_POST["productDescription"]&&
				  $_POST["productCant"]&&
				  $_POST["productPrice"]) {

	 	$image = $_FILES["productImage"]["tmp_name"];  /*$_FILES["productImage"]->Form*/
	 
	 	$aleatory = mt_rand(100,999);

	 	$route = "views/img/products/product".$aleatory.".jpg";

	 	$new_width = 500;
	 	$new_height = 500;

	   $origin = imagecreatefromjpeg($image);

	   $destination = imagecreatetruecolor($new_width, $new_height );

	   imagecopyresized($destination, $origin,0,0,0,0, $new_width, $new_height, $new_width, $new_height);

	   imagejpeg($destination, $route);

	 // Clear Temp Images
	 // $clear = glob("views/img/products/tmp/*");
	 // foreach ($cleat as $file){
	 // unlink($file);
	 // 
	 // }
	   			
	
																											// TRA EL ID DE LA CATEGORIA
	 				$enableCategoryController = array("id"=>$_POST["categoryName"],"status"=>0);
	 				$updateCategory = categorieModel::enableCategory($enableCategoryController, "categorias");
	 					

					

	 				$dataController = array("idcategory" =>$_POST["categoryName"],
	 														  "title"			 	 =>$_POST["productTitle"],
	 														  "description"=>$_POST["productDescription"],
	 														  "cant"			 =>$_POST["productCant"],
	 														  "price"			 =>$_POST["productPrice"],
	 											  			  "route"			 =>$route);


	 				$answer = productsModel::saveNewModel($dataController, "productos");

	 				if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡El producto se ha cargado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "products";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;



	 	
				}

		 }

	}
	#VIEW PRODUCTS
	#---------------------------------------------------

	 public static function viewsProductsController(){


	 		$answer = productsModel::viewsProductsModel("productos");


	 		foreach ($answer as $row =>$item) {
	 				$row = $row + 1;

	 				if ($item["cant"]<=10) {

	 					$alert = "style=background:#FC754D";
	 					
	 				}elseif ($item["cant"]<=20 and $item["cant"] >10) {
	 					
	 					$alert = "style=background:#FFC9B9";
	 				}
	 				else{

	 							$alert = "";
	 				}

	 echo '<tr>
	 			<td '.$alert.'>'.$row.'</td>	
				<td '.$alert.'>'.$item["title"].'</td>
				<td '.$alert.'>'.$item["description"].'</td>
				<td '.$alert.'>'.number_format($item["price"], 0, ",", ".").' Bs</td>
				<td '.$alert.'>'.$item["cant"].'</td>


				
				
				




				<td '.$alert.'><a href="#edit'.$row.'"  data-toggle="modal">
				<button class="btn btn-success fa fa-pencil"></button></a>


				<div class="modal fade" id="edit'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<h4>Editar Producto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body col-lg-12 col-md-12 col-sm-12 col-xs-12">

			
			    <form method="post" enctype="multipart/form-data">
				
			    <div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Item</label>
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$row.'" readonly>	
				</div>
				</div>

			    <div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Codigo Prd</label>
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$item["id"].'" name="updateProductId" readonly>	
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Producto</label>
				<div class="col-sm-9">
				<input type="text" class="form-control" value="'.$item["title"].'" name="updateProductTitle">	
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Descripcion</label>
				<div class="col-sm-9">
				<input type="text" class="form-control" value="'.$item["description"].'" name="updateProductDescription">
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Precio</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" value="'.$item["price"].'" name="updateProductPrice">
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Cant. Disp.</label>
				<div class="col-sm-5">
				<input type="number" class="form-control" value="'.$item["cant"].'" name="updateProductCant">
				</div>
				</div>

				<div class="form-group row">
				<input  style= "display:none"  type= "text" class="form-control" value="'.$item["route"].'" readonly name="productRoute">
				</div>

				<div class="form-group row">
				<input style= "display:none" type="text" class="form-control" value="'.$item["enable"].'" readonly name="productEnable">
				</div>



				<p>Todos los productos se manejan por Unidades</p>

				

				
					
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>
				</div>
				</div>


				</td>



 				<form method="post" enctype="multipart/form-data">
				<td '.$alert.'><a href="#enable'.$row.'"  data-toggle="modal">
				<button class="btn btn-dark fa fa-eye"></button></a>

				<div class="modal fade" id="enable'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				

				</div>
				<div class="modal-body"  style="text-align: center;margin: 0%;">


				<h4>¿Desea Inhabilitar este producto?</h4>
				<input type="text" class="form-control" value="'.$item["id"].'" name="enableProductId" style="display:none">	
				
				<p>El producto no será visto por los usuarios en el sitio web</p>

				<br>
				<br>
				<br>

				<div class="row">
				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" aria-label="close"></button>
				</div>

				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>

				</div>
				
				</div>
				</td>
				</Form>







				<td '.$alert.'><a href="#image'.$row.'"  data-toggle="modal">
				<button class="btn btn-primary fa fa-image"></button></a>


				<div class="modal fade" id="image'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				

				</div>
				<div class="modal-body"  style="text-align: center;margin: 0%;">


				<img class="img-size"  style="width:250px"  src="views/img/'.substr($item["route"],10).'">

				<p>La imagen debe ser de 500px*500px</p>
							
			<div class="form-group row">
			<div class="col-lg-12">
			<input type="file"  class="input-sm" class="form-control" id="productImage" name="productImage">
			</div>
			</div>

					
		
				<br>
				<br>


			

				
				<button type="submit" class="fa fa-pencil  form-control btn-success"  aria-label="close"></button>
				
				

				</div>
				
				</div>
				</td>





				</tr>



				';




				}
	

	 }

	 # DELETE PRODUCT
	 #--------------------------------------------------

	  public static function deleteProductController(){


	  	if (isset($_POST["productId"])) {

	  		unlink($_POST["productRoute"]);
	  
	  		$dataController = $_POST["productId"];


	  		$answer = productsModel::deleteProductModel($dataController, "productos");



	  			if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡El producto '.$dataController.'  se ha borrado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "productList	";
							}


								});

								</script>';
				
										}

										else
										{
											echo "error";
										}

								}
								else {
									
										}


									}

			# UPDATE PRODUCT
			#	-------------------------------------------------											

		 public static function updateProductController(){

		 	if (isset($_POST["updateProductId"])) {
			
		 	


		 	$dataController = array("id"=>$_POST["updateProductId"],
		 											  "title"=>$_POST["updateProductTitle"],
		 											  "description"=>$_POST["updateProductDescription"],
		 											  "price"=>$_POST["updateProductPrice"],
		 											  "cant"=>$_POST["updateProductCant"],
		 											  "route"=>$_POST["productRoute"],
		 											  "enable"=>$_POST["productEnable"]);




		 	$answer = productsModel::updateProductModel($dataController, "productos");

		if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡El producto se ha actualizado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "productList	";
							}


								});

								</script>';
				
										}

										else
										{
											echo "error";
										}

		 	  }

		}

		# GENERAR REPORTE DE PRODUCTOS
		#--------------------------------------------------------
		 public static function viewsProductsReportController(){


				$answer = productsModel::viewsProductsModel("productos");

					return $answer;


		 }
		 #DESACTIVAR PRODUCTO
		 #-------------------------------------------------------
		  public static function enableProductController(){

		  	if (isset($_POST["enableProductId"])) {
		  		$disable = 1;
		  		$idProduct = $_POST["enableProductId"];
		  			
		  		$enableProductIdController = array ("id"=>$idProduct, "enable"=>$disable);

		  		$answer = productsModel::enableProductModel($enableProductIdController,"productos");


		  				if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡El producto se ha desabilitado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "productList	";
							}


								});

								</script>';
				
										}

										else
										{
											echo "error";
										}

		  			}


		  }
		  #VER PRODUCTOS DESACTIVADOS
		  #----------------------------------------------

		   public static function viewProductsDisable(){


		   	$answer = productsModel::viewsDisableProductsModel("productos");


	 		foreach ($answer as $row =>$item) {
	 				$row = $row + 1;

	 echo '<tr>
	 			<td>'.$row.'</td>	
				<td>'.$item["title"].'</td>
				<td>'.$item["description"].'</td>
				<td>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
				<td>'.$item["cant"].'</td>


				
				
				




				<td><a href="#edit'.$row.'"  data-toggle="modal">
				<button class="btn btn-success fa fa-pencil"></button></a>


				<div class="modal fade" id="edit'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<h4>Editar Producto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body col-lg-12 col-md-12 col-sm-12 col-xs-12">

			
			    <form method="post" enctype="multipart/form-data">
				
			    <div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Item</label>
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$row.'" readonly>	
				</div>
				</div>

			    <div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Codigo Prd</label>
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$item["id"].'" name="updateProductId" readonly>	
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Producto</label>
				<div class="col-sm-9">
				<input type="text" class="form-control" value="'.$item["title"].'" name="updateProductTitle">	
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Descripcion</label>
				<div class="col-sm-9">
				<input type="text" class="form-control" value="'.$item["description"].'" name="updateProductDescription">
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Precio</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" value="'.$item["price"].'" name="updateProductPrice">
				</div>
				</div>

				<div class="form-group row">
				<label for="" class="col-sm-3 col-form-label">Cant. Disp.</label>
				<div class="col-sm-5">
				<input type="number" class="form-control" value="'.$item["cant"].'" name="updateProductCant">
				</div>
				</div>

				<div class="form-group row">
				<input  style= "display:none"  type= "text" class="form-control" value="'.$item["route"].'" readonly name="productRoute">
				</div>

				<div class="form-group row">
				<input style= "display:none" type="text" class="form-control" value="'.$item["enable"].'" readonly name="productEnable">
				</div>



				<p>Todos los productos se manejan por Unidades</p>

				

				
					
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>
				</div>
				</div>


				</td>



 				<form method="post" enctype="multipart/form-data">
				<td><a href="#enable'.$row.'"  data-toggle="modal">
				<button class="btn btn-dark fa fa-eye"></button></a>

				<div class="modal fade" id="enable'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				

				</div>
				<div class="modal-body"  style="text-align: center;margin: 0%;">


				<h4>¿Desea habilitar este producto?</h4>
				<input type="text" class="form-control" value="'.$item["id"].'" name="disableProductId" style="display:none">	
				
				<p>El producto  será visto por los usuarios en el sitio web</p>

				<br>
				<br>
				<br>

				<div class="row">
				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" aria-label="close"></button>
				</div>

				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>

				</div>
				
				</div>
				</td>
				</Form>







				<td><a href="#image'.$row.'"  data-toggle="modal">
				<button class="btn btn-primary fa fa-image"></button></a>


				<div class="modal fade" id="image'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				

				</div>
				<div class="modal-body"  style="text-align: center;margin: 0%;">


				<img class="img-size"  style="width:250px"  src="views/img/'.substr($item["route"],10).'">

				<p>La imagen debe ser de 500px*500px</p>
							
			<div class="form-group row">
			<div class="col-lg-12">
			<input type="file"  class="input-sm" class="form-control" id="productImage" name="productImage">
			</div>
			</div>

					
		
				<br>
				<br>


			

				
				<button type="submit" class="fa fa-pencil  form-control btn-success"  aria-label="close"></button>
				
				

				</div>
				
				</div>
				</td>





				</tr>



				';

					   }


		   }
		   #HABILITAR PRODUCTO
		   #--------------------------------------------------------

		    public static function disableProductController(){


		    	if (isset($_POST["disableProductId"])) {
		    		
		    	$disable = 0;
		  		$idProduct = $_POST["disableProductId"];
		  			
		  		$enableProductIdController = array ("id"=>$idProduct, "enable"=>$disable);

		  		$answer = productsModel::enableProductModel($enableProductIdController,"productos");


		  				if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡El producto se ha habilitado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "productInh	";
							}


								});

								</script>';
				
										}

										else
										{
											echo "error";
										}




		    			}



		    }
}
?>