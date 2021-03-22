<?php 


class viewsProductsController{

	#VIEW PRODUCTS
	#---------------------------------------------
		public static function productController(){

			echo "<label for=productName></label>
			<br>";

		if (isset($_GET["categoria"]) =="") {

		if (isset($_GET["page"])) {

			$page = $_GET["page"];
			
		#TRAER LOS PRIMEROS DOCE PRODUCTOS
		#-----------------------------------------------
		$table = "productos";
		$base = 0;
		$tope = 12;
		
		if ($page == 1) {
		
	 
	 	$answer = viewsProductsModel::productModel($base, $tope, $table);


	 	foreach (	$answer as $row =>$item) {
	 		
	 				    $cant=1;   //Cantidad minima de producto   //Cantidad minima de producto

	 					$row = $row +1;


echo '
				<a href="#image'.$item["id"].'"  data-toggle="modal">
				<div class="mainProducts"><img class="img-size" src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				<div class="description">'.$item["title"].'</div><div class="price"'.number_format($item["price"], 0, ",", ".").' Bs.</div></div></a>


				<div class="modal fade" id="image'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
				<div class="modal-dialog" role="document">
				<div class="modal-content"  style="border-radius:0px">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>


				<div class="modal-body"  style="text-align: center;margin: 0%;">

				<div class="row container-fluid">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img class="img-size"  style="width:200px"  src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				


				<label for="" class="col-sm-12 col-form-label " style="font-size:15px; font-weight: bold; font-family:"Pavanam-Regular"; " id="productDescription" name="productDescription">'.$item["description"].'</label>

				<input type="text" name="productTitle" value="'.$item["title"].'" style="display:none">
				<input type="text" name="idproduct" value="'.$item["id"].'"  style="display:none">
				<input type="text" id="'.$row.'"  value="'.$item["cant"].'" style="display:none">


				<label for="" class="col-sm-12 col-form-label" style="font-size:20px;">'.number_format($item["price"], 0, ",", ".").' Bs.</label>
				</div>

			
			
				<div class="row">
				<div class="col-sm-3">




				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control" readonly id="productPrice" name="productPrice" value=" '.$item["price"].'" style="display:none">

		
				</div>
				</div>
				<hr>

				<div class = row container-fluid>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<br>
				<input type="number" class="form-control"  id="'.$item["id"].'"  name="cantProduct" value='.$cant.' min="1" max='.$item["cant"].'>
				</div>



				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
				<br>
				<button type="submit" class="fa fa-shopping-basket form-control btn-primary btn-sm" aria-label="close"></button>
				</div>
				</div>


	</div>
				</div>



				</div>
				</form>
	
				</div>



				</div>
				</div>';

										}
											
										}


		elseif ($page == 2) {
			$base = 12;
		
		$answer = viewsProductsModel::productModel($base, $tope, $table);
	 	foreach (	$answer as $row =>$item) {
	 		
	 				    $cant=1;   //Cantidad mínima de producto   //Cantidad minima de producto
	 					$row = $row +1;


echo '
				<a href="#image'.$item["id"].'"  data-toggle="modal">
				<div class="mainProducts"><img class="img-size" src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs.</div></div></a>


				<div class="modal fade" id="image'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
				<div class="modal-dialog" role="document">
				<div class="modal-content"  style="border-radius:0px">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>


				<div class="modal-body"  style="text-align: center;margin: 0%;">

				<div class="row container-fluid">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img class="img-size"  style="width:200px"  src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				


				<label for="" class="col-sm-12 col-form-label " style="font-size:15px; font-weight: bold; font-family:"Pavanam-Regular"; " id="productDescription" name="productDescription">'.$item["description"].'</label>

				<input type="text" name="productTitle" value="'.$item["title"].'" style="display:none">
				<input type="text" name="idproduct" value="'.$item["id"].'"  style="display:none">
				<input type="text" id="'.$row.'"  value="'.$item["cant"].'" style="display:none">


				<label for="" class="col-sm-12 col-form-label" style="font-size:20px;">'.number_format($item["price"], 0, ",", ".").' Bs.</label>
				</div>

			
			
				<div class="row">
				<div class="col-sm-3">

				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control" readonly id="productPrice" name="productPrice" value=" '.$item["price"].'" style="display:none">

		
				</div>
				</div>
				<hr>

				<div class = row container-fluid>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<br>
				<input type="number" class="form-control"  id="'.$item["id"].'"  name="cantProduct" value='.$cant.' min="1" max='.$item["cant"].'>
				</div>



				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
				<br>
				<button type="submit" class="fa fa-shopping-basket form-control btn-primary btn-sm" aria-label="close"></button>
				</div>
				</div>


				</div>
				</div>



				</div>
				</form>
	
				</div>



				</div>
				</div>';

									
					}
									
					}else{
						
// NOTA: esta variable  $baseDinamica resta 12  para seguir la secuencia de numeros
// CASO 1 ----------BASE 0 primeros 12 productos
// CASO 2 ----------BASE 12
// 
// DESDE AQUI LOS VALORES SON DINAMICOS
// CASO 3 ----------BASE 24
// CASO 4 ----------BASE 36

   $baseDinamica = 12;
   $base = ($page * $baseDinamica) - $tope;

   		$answer = viewsProductsModel::productModel($base, $tope, $table);
	 	foreach ($answer as $row =>$item) {
	 		
	 				    $cant=1;   //Cantidad minima de producto   //Cantidad minima de producto

	 					$row = $row +1;


echo '
				<a href="#image'.$item["id"].'"  data-toggle="modal">
				<div class="mainProducts"><img class="img-size" src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs.</div></div></a>


				<div class="modal fade" id="image'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
				<div class="modal-dialog" role="document">
				<div class="modal-content"  style="border-radius:0px">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>


				<div class="modal-body"  style="text-align: center;margin: 0%;">

				<div class="row container-fluid">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img class="img-size"  style="width:200px"  src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				


				<label for="" class="col-sm-12 col-form-label " style="font-size:15px; font-weight: bold; font-family:"Pavanam-Regular"; " id="productDescription" name="productDescription">'.$item["description"].'</label>

				<input type="text" name="productTitle" value="'.$item["title"].'" style="display:none">
				<input type="text" name="idproduct" value="'.$item["id"].'"  style="display:none">
				<input type="text" id="'.$row.'"  value="'.$item["cant"].'" style="display:none">


				<label for="" class="col-sm-12 col-form-label" style="font-size:20px;">'.number_format($item["price"], 0, ",", ".").' Bs.</label>
				</div>

			
			
				<div class="row">
				<div class="col-sm-3">




				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control" readonly id="productPrice" name="productPrice" value=" '.$item["price"].'" style="display:none">

		
				</div>
				</div>
				<hr>

				<div class = row container-fluid>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<br>
				<input type="number" class="form-control"  id="'.$item["id"].'"  name="cantProduct" value='.$cant.' min="1" max='.$item["cant"].'>
				</div>



				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
				<br>
				<button type="submit" class="fa fa-shopping-basket form-control btn-primary btn-sm" aria-label="close"></button>
				</div>
				</div>


	</div>
				</div>



				</div>
				</form>
	
				</div>



				</div>
				</div>';


								}
							}

				}else{
									
		$table = "productos";
		$base = 0;
		$tope = 12;
				
	 
	 			$answer = viewsProductsModel::productModel($base, $tope, $table);


	 	foreach (	$answer as $row =>$item) {
	 				    $cant=1;   //Cantidad minima de producto
	 					$row = $row +1;


echo '
				<a href="#image'.$item["id"].'"  data-toggle="modal">
				<div class="mainProducts"><img class="img-size" src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs.</div></div></a>


				<div class="modal fade" id="image'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
				<div class="modal-dialog" role="document">
				<div class="modal-content"  style="border-radius:0px">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>


				<div class="modal-body"  style="text-align: center;margin: 0%;">

				<div class="row container-fluid">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img class="img-size"  style="width:200px"  src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				


				<label for="" class="col-sm-12 col-form-label " style="font-size:15px; font-weight: bold; font-family:"Pavanam-Regular"; " id="productDescription" name="productDescription">'.$item["description"].'</label>

				<input type="text" name="productTitle" value="'.$item["title"].'" style="display:none">
				<input type="text" name="idproduct" value="'.$item["id"].'"  style="display:none">
				<input type="text" id="'.$row.'"  value="'.$item["cant"].'" style="display:none">


				<label for="" class="col-sm-12 col-form-label" style="font-size:20px;">'.number_format($item["price"], 0, ",", ".").' Bs.</label>
				</div>

				<div class="row">
				<div class="col-sm-3">

				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control" readonly id="productPrice" name="productPrice" value=" '.$item["price"].'" style="display:none">

		
				</div>
				</div>
				<hr>

				<div class = row container-fluid>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<br>
				<input type="number" class="form-control"  id="'.$item["id"].'"  name="cantProduct" value='.$cant.' min="1" max='.$item["cant"].'>
				</div>



				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
				<br>
				<button type="submit" class="fa fa-shopping-basket form-control btn-primary btn-sm" aria-label="close"></button>
				</div>
				</div>


				</div>
				</div>
				</div>
				</form>

				</div>
				</div>
				</div>';

										}

									}
								}
								else{ /* De lo contrario Si la varible GET de categorias viene llena */
								/* TODO BUSCAR PLUGINS DE JQUERY PARA LA PAGINACIÓN */
								
								
					  $dataCategoryController = $_GET["categoria"];
					  
					  if (isset($_GET["page"])=="") {
						/* $page = $_GET["page"]; */
					  
					  $table = "productos";
					  $tope = 12;
					  $base = 0;
					
						$answer = viewsProductsModel::productsModelByCategoryModel($base, $tope, $dataCategoryController,"productos");

								 		foreach ($answer as $row =>$item) {
						$cant=1;
						$row = $row +1;

	echo ' <a href="#image'.$item["id"].'"  data-toggle="modal">
		   <div class="mainProducts"><img class="img-size" src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
			<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"], 0, ",", ".").' Bs.</div></div></a>


			<div class="modal fade" id="image'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
			<div class="modal-dialog" role="document">
			<div class="modal-content"  style="border-radius:0px">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span> </button>
			</div>


				<div class="modal-body"  style="text-align: center;margin: 0%;">

				<div class="row container-fluid">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img class="img-size"  style="width:200px"  src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				


				<label for="" class="col-sm-12 col-form-label " style="font-size:15px; font-weight: bold; font-family:"Pavanam-Regular"; " id="productDescription" name="productDescription">'.$item["description"].'</label>

				<input type="text" name="productTitle" value="'.$item["title"].'" style="display:none">
				<input type="text" name="idproduct" value="'.$item["id"].'"  style="display:none">
				<input type="text" id="'.$row.'"  value="'.$item["cant"].'" style="display:none">


				<label for="" class="col-sm-12 col-form-label" style="font-size:20px;">'.number_format($item["price"], 0, ",", ".").' Bs.</label>
				</div>

			
			
				<div class="row">
				<div class="col-sm-3">




				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control" readonly id="productPrice" name="productPrice" value=" '.$item["price"].'" style="display:none">

		
				</div>
				</div>
				<hr>

				<div class = row container-fluid>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<br>
				<input type="number" class="form-control"  id="'.$item["id"].'"  name="cantProduct" value='.$cant.' min="1" max='.$item["cant"].'>
				</div>



				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
				<br>
				<button type="submit" class="fa fa-shopping-basket form-control btn-primary btn-sm" aria-label="close"></button>
				</div>
				</div>


				</div>
				</div>



				</div>
				</form>
	
				</div>



				</div>
				</div>';
							
										}

								}elseif(isset($_GET["page"])==1){
									$page = $_GET["page"];
										
								}
					}
	
		}

		#SAVE PRODUCTO IN THE PURCHASE CAR
		#------------------------------------------------------------
	 	public static function saveProductPurchaseCar(){

	 			 	if (isset($_POST["cantProduct"]) &&
	 			 	 			 $_POST["productPrice"])  {
	 			 	

	 				$idProduct 	= 	$_POST["idproduct"];
	 				$productTitle = $_POST["productTitle"];
	 				$cantProduct =  $_POST["cantProduct"];
	 				$productPrice = $_POST["productPrice"];
	 				$total = $cantProduct  *  $productPrice ;
	 				$idUser = $_SESSION["id"];

	 		  // COMPARAR LAS CANTIDADES INGRESADAS POR EL USUARIO
	 		$comparateCantController = viewsProductsModel::comparateCantModel($idProduct , "productos");


	 		if ($cantProduct > $comparateCantController["cant"] ) {

	 				echo '<script >swal({

								title: "¡Error!",
								text: "¡Ha sobrepasado el límite de stock!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "home";
									}


												});

												</script>';

												}
												elseif ($cantProduct< 1) {

														echo '<script >swal({

																	title: "¡Error!",
																	text: "¡Ingrese una cantidad válida!",
																	type: "error",
																	confirmButtonText: "Cerrar",
																	closeOnConfirm: false
																	},

																		function(isConfirm){

																			if (isConfirm) {


																			window.location = "home";
																			}


																			});

																		</script>';
													
																			}
																			else{


	

	 		// Valida si los valores se encuentran en el carrito de compra
	 		// si existen se modifica de lo contrario se agrega
	 		$compareArrayController = array("iduser"=>$_SESSION["id"], 
	 																  "idproduct"=>$_POST["idproduct"]);



	 		$comparateController = viewsProductsModel::comparateModel($compareArrayController, "carritocompras");


	 		if ($comparateController["idproduct"] == $_POST["idproduct"]  and
	 			 $comparateController["iduser"]== $_SESSION["id"] ) {

	 				// Variable para ser enviada al método updateProductPurchaseCar
	 			$dataArrayToUpdate= array("idproduct"=>$comparateController["idproduct"],
	 																"iduser"=> $comparateController["iduser"],
	 																"cant"=>$cantProduct,
	 																"total"=>$total);

	 		

	 			$answerController = viewsProductsController::updateProductPurchaseCar($dataArrayToUpdate);
	 			
	 		}else{

	 			// AGREGAR AGREGAR PRODUCTO

	 			$dataController = array("idproduct" =>$_POST["idproduct"],
													  	  "iduser"=>$_SESSION["id"],
													  	  "title"=>$_POST["productTitle"], 
									 	 			  	  "cant"=>$_POST["cantProduct"],
									 	 			  	  "price"=>$_POST["productPrice"],
									 				  	  "total"=>$total);


			$answer  = viewsProductsModel::purchaseCar($dataController,"carritocompras");

			if ($answer == "ok") {

				echo '<script >swal({

								title: "¡OK!",
								text: "¡El producto se ha agregado al carrito de compras!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "home";
									}


												});

												</script>';

												}

												else {
													$answerController = viewsProductsController::updateProductPurchaseCar($dataController);
												

															}

	 												}

											}
									
									}

							}
	
#UPDATE PRODUCT IN PURCHASE
#---------------------------------------------------------
 public static function updateProductPurchaseCar($dataController){

	$answer= viewsProductsModel::updatePurchaseCar($dataController, "carritocompras");


			
						if ($answer == "ok") {

					echo '<script >swal({

								title: "¡OK!",
								text: "¡La cantidad se ha actualizado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "home";
									}


															 	});

															 	</script>';

												}
												else{

													echo 'error linea 159';


						}




 }


# VIEW PRODUCTS IN PURCHASE CAR
#-----------------------------------------------------
 public static function viewPorductInpurchaseCar(){

 	// It determines the product total for user
 	$iduserController = $_SESSION["id"];

 	// VER PRODUCTOS EN EL CARRITO DE COMPRAS
 	$answer  = viewsProductsModel::viewPurchaseCarView($iduserController, "carritocompras");

 	// VER EL SUB TOTAL
 	// ----------------------------------------------- 
 	$totalPrice  = viewsProductsModel::TotalSumPurchaseCarView($iduserController,"carritocompras");


 	#CALCULO DE IVA
 	#-------------------------------------------------------------------------
 	 $iva = iva::viewIvaModel("iva");
 	 $totalIva= ($iva["iva"] * $totalPrice["total"]) / 100; 
 	#-------------------------------------------------------------------------

 	 // VER EL IMPUESTO DE ENVIO
 	// ------------------------------------------------------------------------
 	$answerTax = deliveryTaxModel::viewDeliveryTaxModel("envios");
 	$totalTax = $totalIva + $answerTax["tax"] + $totalPrice["total"];

 	 // TRAE EL VALOR DE LA TASA $ DEL DÍA
 	 // ------------------------------------------------------------------------
 	 $convertion = viewsProductsModel::conversionDollarModel("tasa");

 	 // CONVERSION TOTAL EN $
 	 // ------------------------------------------------------------------------
 	 $totalConvertion =   ($totalPrice['total']+ $totalIva +  $answerTax["tax"]) / $convertion["tasa"];

 	 #TOTAL PURCHASE
 	 #-------------------------------------------------------------------------
 	 $totalPurchase = $totalIva+$totalPrice['total']+$answerTax["tax"];

 	 #SI EL SUBTOTAL VIENE VACIO  COLOCA LOS MONTOS EN CERO
if ($totalPrice["total"] == "") {
	 	$totalTax = 0;
	 	$totalPurchase =0;
	 	$totalConvertion=0;

}

if ($answerTax["tax"]==0) {

	$tax = "Gratis";
	
}
else {
		$tax = "";
}


 	$num = 0;
 	
 	

	 	echo '<thead style="background:; font-family:Pavanam-Regular">
				<tr>
					
					
					<th style="font-size: 15px; font-weight: bold">Producto</th>
					<th style="font-size: 15px; font-weight: bold">Cant.</th>
					<th style="font-size: 15px; font-weight: bold">Precio</th>
					<th style="font-size: 15px; font-weight: bold">Total</th>
					<th style="font-size: 15px; font-weight: bold;"></th>
				</tr>
			</thead>';

			foreach ($answer as $row =>$item) {
				$num++;

			
			echo '<tbody>
				<tr>
					
					
					<input type="text" name="deleteProduct" value="'.$item["idproduct"].'" style="display: none">
					
					<td style="font-size: 14px; font-family:Pavanam-Regular; text-align:left">'.$item["title"].'</td>
					<td style="font-size: 14px; font-family:Pavanam-Regular; text-align: center">'.$item["cant"].'</td>
					<td style="font-size: 14px; font-family:Pavanam-Regular">'.number_format($item["price"], 0, ",", ".").' </td>

					<td style="font-size: 14px; font-family:Pavanam-Regular">'.number_format($item["total"], 0, ",", ".").' </td>

					
					<td><a href="#delete'.$num.'"  data-toggle="modal">
					<button class="btn btn-danger fa fa-remove"></button></a>


				<div class="modal fade" id="delete'.$num.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

				<h4>¿Desea borrar este producto?</h4>
				<br>
				<form method="post" enctype="multipart/form-data">
				<input type="text" name="deleteIdProduct" value="'.$item["idproduct"].'"  style="display:none; ">
				<label for="productTitle" class="col-sm-12 col-form-label" style="font-size:20px;" name ="productTitle">'.$item["title"].'</label>
				<p>El producto se borarrá del carrito de compras</p>

				

				<div class="form-group row">

				<br>
				<br>

				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>



				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>

				</td>	


				</tr>
			</tbody>';	

	 			}

	 		echo 
	 		'<thead style="background:">
				<tr>
					
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 14px; font-weight: bold">Sub-Total</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">'.number_format($totalPrice['total'], 0, ",", ".").'</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">Bs</th> 	
			
				</tr>
			</thead>';


			echo 
	 		'<thead style="background:">
				<tr>
					
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 14px; font-weight: bold">Iva 12 %</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">'.number_format($totalIva, 0, ",", ".").'</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">Bs</th> 	
			
				</tr>
			</thead>';


			echo 
	 		'<thead style="background:">
				<tr>
					
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 14px; font-weight: bold">Envío  '.$tax.' </th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">'.number_format($answerTax["tax"], 0, ",", ".").'</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">Bs</th> 	
			
				</tr>
			</thead>';

			echo
			 '<thead style="background:">
				<tr>
					
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 14px; font-weight: bold">Total a pagar</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">'.number_format($totalPurchase, 0, ",", ".").'</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">Bs</th> 	
			
				</tr>
			</thead>';



				echo 
	 		'<thead style="background:">
				<tr>
			
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 12px; font-weight: bold"></th>
					<th style="font-size: 14px; font-weight: bold">Cambio</th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">'.number_format($totalConvertion,2).' </th>
					<th style="font-size: 14px; font-weight: bold; font-family:Pavanam-Regular">$</th> 	

					
					
					
				</tr>
			</thead>';
		
	


		 }

		 # DELETE PRODUCTS OF PURCHASE CAR
		 #---------------------------------------------------------

		  public static function deleteProductController(){
		 	
		if (isset($_POST["deleteIdProduct"])) {
		
		 		$iduser = $_SESSION["id"];

		 		$dataController=array("idproduct"=> $_POST["deleteIdProduct"],
		 												"iduser"=> $_SESSION["id"]);

		 		

		 		$answer=viewsProductsModel::deleteProductModel($dataController, "carritocompras");

					if ($answer == "ok") {

				
				echo '<script >swal({

								title: "¡OK!",
								text: "¡Borrado del carrito de compras!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "purchaseCar";
									}


									});

								</script>';
			}
				else{
					echo 'error controller';
				}


		  }

		  }


		  public static function viewTotalPorductInpurchaseCar(){

		  		$iduserController = $_SESSION["id"];

 				$answer  = viewsProductsModel::viewPurchaseCarView($iduserController, "carritocompras");
 				$totalPrice  = viewsProductsModel::TotalSumPurchaseCarView($iduserController,"carritocompras");

 				 	#CALCULO DE IVA
 					#-------------------------------------------------------------------------
 	 				$iva = iva::viewIvaModel("iva");
 	 				$totalIva= ($iva["iva"] * $totalPrice["total"]) / 100; 
 					#-------------------------------------------------------------------------

 	 				#VER EL IMPUESTO DE ENVIO
 					# ------------------------------------------------------------------------
 					$answerTax = deliveryTaxModel::viewDeliveryTaxModel("envios");

 					if ($totalPrice["total"] == "") {

 						$answerTax["tax"]=0;
 						
 					}

	 		echo 
	 		'<th style="font-size: 12px; font-weight: bold">'.number_format($totalPrice['total']+$totalIva+$answerTax["tax"], 0, ",", ".").' Bs</th> ';

		}


		#VIEW CONVERSION DOLLAR
		#--------------------------------------------
		 public static function conversionDollarController(){

		 $iduserController = $_SESSION["id"];

 		$totalPrice  = viewsProductsModel::TotalSumPurchaseCarView($iduserController,"carritocompras");

		 $conversion = viewsProductsModel::conversionDollarModel("tasa");

		#CALCULO DE IVA
 		#----------------------------------------------------------------------------------
 	 	$iva = iva::viewIvaModel("iva");
 	 	$totalIva= ($iva["iva"] * $totalPrice["total"]) / 100; 
 		#----------------------------------------------------------------------------------
 		 	

 	 	#VER EL IMPUESTO DE ENVIO
 	    # ----------------------------------------------------------------------------------
 		$answerTax = deliveryTaxModel::viewDeliveryTaxModel("envios");


 			if ($totalPrice["total"] == "") {

 						$answerTax["tax"]=0;
 						
 					}
 	

 		 $totalConvertionDollar = (($totalPrice["total"] + $totalIva + $answerTax["tax"] ) / $conversion["tasa"]);

		 	echo '<th style="font-size: 12px; font-weight: bold">'.number_format($totalConvertionDollar,2).' $</th> ';

		 }

		 #VER PAGINACIÓN
		 #----------------------------------------------------------------------------------------
		  public static function productListController(){
  		

  			if (isset($_GET["categoria"])=="") {

  			$table = "productos";
			$base = 0;
			$tope = 12;
								
		  	$answer= viewsProductsModel::ProductsCount($table);

						$row = 	$answer["count"];

						return $row;

						}else{

							$dataCategoryController  = $_GET["categoria"];

							$answer = viewsProductsModel::ProductsModelByCategory(	$dataCategoryController, "productos");

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

		   $answer = viewsProductsModel::ProductsModelFromAjax($dataController, "productos");

		   	   if ($answer == "") {

		   	
		   }else{
	
		 	 foreach ($answer as $row=>$item) {   

		 	 		    $cant=1;   //Cantidad minima de producto
	 					$row = $row +1;


		
	echo '
				<a href="#image'.$item["id"].'"  data-toggle="modal">
				<div class="mainProducts"><img class="img-size" src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				<div class="description">'.$item["title"].'</div><div class="price">'.number_format($item["price"]).' Bs. </div></div></a>


				<div class="modal fade" id="image'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
				<div class="modal-dialog" role="document">
				<div class="modal-content"  style="border-radius:0px">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>


				<div class="modal-body"  style="text-align: center;margin: 0%;">

				<div class="row container-fluid">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<img class="img-size"  style="width:200px"  src="../Backadmin/views/img/'.substr($item["route"],10).'" style="cursor:pointer" >
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				


				<label for="" class="col-sm-12 col-form-label " style="font-size:15px; font-weight: bold; font-family:"Pavanam-Regular"; " id="productDescription" name="productDescription">'.$item["description"].'</label>

				<input type="text" name="productTitle" value="'.$item["title"].'" style="display:none">
				<input type="text" name="idproduct" value="'.$item["id"].'"  style="display:none">
				<input type="text" id="'.$row.'"  value="'.$item["cant"].'" style="display:none">


				<label for="" class="col-sm-12 col-form-label" style="font-size:20px;">Bs. '.number_format($item["price"]).'</label>
				</div>

			
			
				<div class="row">
				<div class="col-sm-3">




				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control" readonly id="productPrice" name="productPrice" value=" '.$item["price"].'" style="display:none">

		
				</div>
				</div>
				<hr>

				<div class = row container-fluid>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<br>
				<input type="number" class="form-control"  id="'.$item["id"].'"  name="cantProduct" value='.$cant.' min="1" max='.$item["cant"].'>
				</div>



				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
				<br>
				<button type="submit" class="fa fa-shopping-basket form-control btn-primary btn-sm" aria-label="close"></button>
				</div>
				</div>


	</div>
				</div>



				</div>
				</form>
	
				</div>



				</div>
				</div>';



		   			
		   					 	 			}
		 			
		 							}

							}


					}

		   }

}