<?php 

class purchaseOrderController {


	#ORDENES PENDIENTES
	#-----------------------------------------------------------
	 public static function viewPurchaseOrderController(){

	 	$answer = purchaseOrderModel::viewPurchaseOrderModel("pedido");


	 	foreach ($answer as $row => $item) {
	 	$newDate = date("d/m/yy", strtotime($item["date"]));


	 			$row = $row +1;

 					if ($item["reference"]==0) {
	 				$disabledButton = "";
	 				$colorLight = "btn-light";
	 				$icon = " fa fa-user btn-sm";
	 				$NoDisplayBranch="";


	 		}
	 		else
	 		{
	 				$disabledButton = "";
	 				$colorLight = "btn-warning";
	 				$icon = " fa fa-truck btn-sm";
	 				$NoDisplayBranch ="style= display:none";

	 		}

	 	
	 			echo '
						
							<tr>
								<td>'.$row.'</td>
								<td>'.$newDate.'</td>
								<td>'.$item["idorder"].'</td>
								<td>'.number_format($item["mount"], 0, ",", ".").' Bs.</td>
								<td>'.$item["convertion"].'</td>
								<td>'.$item["reference"].'</td>

				<td><a href="#detail'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-primary fa fa-th-list btn-sm"></button></a>

				<div class="modal fade" id="detail'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
			
				<div class="modal-dialog"  modal-lg   role="document" >
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body "; margin: 0%;">';

				$dataIdOrderController = $item["idorder"];
				$dataIdClientController = $item["iduser"];
				// TRAER LOS ID DE PRODCTOS REFERENTES AL NUMERO DE ORDEN
				$answerIdProduct = purchaseOrderModel::viewIdProductPurchaseOrderModel($dataIdOrderController, "pedido_has_producto");
				// TRAER LOS DATOS PERSONALES DEL CLIENTE
				$answerDataClient = clientModel::viewPurchaseClientModel($dataIdClientController, "clientes");

				// TRAER LA DIRECCION DE SUCURSAL SI EL PEDIO ES DE RETIRO POR SUCURSAL
				$answerBranchAddress = branchModel::viewBranchModelByOrder($item["branch"], "sucursales");

				echo

				 '<table class="table  table-light" style="font-size:12px;">
				<thead>
				<tr>
				<th style="font-size:15px;">Orden #  '.$item["idorder"].'</th>
				</tr>


				<th style="text-align:left">Cliente:  '.$answerDataClient["name"].'  '.$answerDataClient["lastname"].' -Documento: '.$answerDataClient["identification"].'   -Telefono:  '.$answerDataClient["phone"].'</th>
				</tr>
				
				<th style="text-align:left">Dirección: '.$answerDataClient["address"].'   - '.$answerDataClient["municipality"].' - '.$answerDataClient["estate"].'

				<tr>
				<td '.$NoDisplayBranch.'>Sucursal:  '.$answerBranchAddress["branch"].'</td>
				</tr>
				</th>
				
			</thead>
				</table>
				<br>';



		echo  '<table class="table  table-light" style="font-size:12px;">

			<thead>
			<tr>
			<th >Producto</th>
			<th >Cantidad</th>
			<th >Precio</th>
			<th >Total</th>
			</thead>';
		



// NOTA: NO BORRAR LOS COMENTARIOS(SE PRUEBA CON UN INNER JOIN)

// ITERAR RESULTADOS DE LA TABLA pedido_has_producto
foreach ($answerIdProduct as $row => $item) {

$total= $item["cant"]*$item["price"];
// $dataProductNameController = array("id" => $item["idproduct"]);	

// TRAER LOS NOMBRE DE PRODUCTOS POR EL NUMERO DE ORDEN
// $answerProductName = purchaseOrderModel::viewProductNamePurchaseOrderModel($dataProductNameController, "productos");
 
// TRAER NOMBRE DE PRODUCTOS POR ID
// foreach ($answerProductName as $row => $value) {
 // echo'<label for="form-control" style="font-size:17px;">'.$value["title"].'</label>';

echo'


	<tbody>
		<tr>
				<td>'.$item["title"].'</td>
				<td>'.$item["cant"].'</td>
				<td>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
				<td>'.number_format($total, 0, ",", ".").' Bs.</td>
		</tr>
	</tbody>	';


					
				// }
				}
					

			echo '
			</table>
			</div>
			</div>
			</div>
			</td>






				<td><a href="#statusSend'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control '.$colorLight .' '.$icon .' " '.$disabledButton.'></button></a>
				<div class="modal fade" id="statusSend'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

			
			<form method="post" enctype="multipart/form-data">


			<h5>¿Desea cambiar el estado?</h5>
			<h2>Estado Enviando</h2>
			<h5> Orden # '.$item["idorder"].'</h5>
			<input type="text" class="form-control" name="idOrderSend" value='.$item["idorder"].' style="display:none">

			<br>


				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-check  form-control btn-success" class="close" aria-label="close" ></button>
				</div>
					</form>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>


				
				
		
					</div>
					</div>
					</div>
					

							</td>


							




				<td><a href="#statusDelete'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-danger fa fa-trash btn-sm"></button></a>
				<div class="modal fade" id="statusDelete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

			
			<form method="post" enctype="multipart/form-data">


			<h5>¿Desea cambiar el estado?</h5>
			<h2>Estado Eliminado</h2>
			<h5> Orden # '.$item["idorder"].'</h5>
			<input type="text" class="form-control" name="idOrderDelete" value='.$item["idorder"].' style="display:none">

			<br>


				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-check  form-control btn-success" class="close" aria-label="close" ></button>
				</div>
					</form>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>


				
				
		
					</div>
					</div>
					</div>
					

							</td>




							';

								}

	 		}

	 		// SEND STATUS (ENVIANDO)
	 		 public static function updateStatusController(){

	
	 		 		if (isset($_POST["idOrderSend"])) {
	 		 			// ENVIO LA ORDEN ACTUAL
	 		 			$idOrder = $_POST["idOrderSend"];



	 				 	//ESTADO ENVIANDO 
	 		 			$status= 1;
	 		 		
	 		 			$dataController = array("idorder" =>$idOrder,"status"=>$status);

	 		 			// ACTUALIZAR EL ESTATUS DE LA ORDEN
	 		 			 $answer= purchaseOrderModel::updateStatusPurchaseModel($dataController, "pedido"); 


	 		 		

	 		 			 if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡Estado Enviando!",
								text: "¡El estado de la orden se ha actualizado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "orders";
									}


															 	});

															 	</script>';


			
	 		 			 	}
	 		 			 }


	 		 			 elseif (isset($_POST["idOrderCheck"])) {
	 		 			 #PUNTO IMPORTANTE 
	 		 			 #EN ESTE ESTATUS SE ACTUALIZA EL INVENTARIO
	 		 			 #---------------------------------------------------------------

	 		 			 $idOrderCheck =$_POST["idOrderCheck"];

	 		 			 // ACTUALIZAR CANTIDAD DEL INVENTARIO
	 		 			 $answerInventoryUpdate= productsModel::viewCantProductsInOrder($idOrderCheck, "pedido_has_producto");

	 		 			 foreach ($answerInventoryUpdate as $value) {

	 		 			$updateInventoryController = array("id"=>$value["idproduct"]);


	 		 			$answerIdCantProductFromInventory=productsModel::viewsProductsInventoryModel($updateInventoryController , "productos");
	 		 			
	 		 					foreach ($answerIdCantProductFromInventory as $row =>$item) {

	 		 					  $row = $item["cant"]-$value["cant"];



	 		 					  $updateTotalInventoryController = array("id"=>$value["idproduct"],
	 		 																							  "cant"=>$row);

	 		 					  $updateInventory = productsModel::updateInventoryModel($updateTotalInventoryController, "productos");
	
	 		 				
	 		 				}


	 		 				}
	 		 			 		
						// ESTADO ENTREGADO
	 		 			 $status= 2;

	 		 			 $idOrder = $_POST["idOrderCheck"];


	 		 			 // CAMBIAR EL ESTADO
	 		 			$dataController = array("idorder" =>$idOrder,"status"=>$status);
	 		 			 $answer= purchaseOrderModel::updateStatusPurchaseModel($dataController, "pedido"); 


	 		 			 if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡Estado Entregado!",
								text: "¡El estado de la orden se ha actualizado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "statusSend";
									}


															 	});

															 	</script>';




	 										 }

	 							 }

	 					elseif (isset($_POST["idOrderDelete"])) {
							
	 		 			 $status= 3;
	 		 			 $idOrder = $_POST["idOrderDelete"];

	 		 			$dataController = array("idorder" =>$idOrder,"status"=>$status);

	 		 			 $answer= purchaseOrderModel::updateStatusPurchaseModel($dataController, "pedido"); 


	 		 			 if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡Estado Eliminado!",
								text: "¡El estado de la orden se ha actualizado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "orders";
									}


															 	});

															 	</script>';




	 										 }

	 							 }
			

	 					 

	 		 	 }
	 		 	 # VER ESTADOS ENVIADOS
	 		 	 #------------------------------------------------------------------

	 		 	  public static function viewStatusSendPurchaseOrderController(){

	 		 	  $answer = purchaseOrderModel::viewsStatusSendPurchaseOrderModel("pedido");


	 		 	  foreach ($answer as $row => $item) {
	 		 	  	$newDate = date("d/m/yy", strtotime($item["date"]));
	 				$row = $row +1;
	 	
	 			echo '
						<tbody>
							<tr>
								<td>'.$row.'</td>
								<td>'.$newDate.'</td>
								<td>'.$item["idorder"].'</td>
								<td>'.number_format($item["mount"], 0, ",", ".").' Bs.</td>
								<td>'.$item["convertion"].'</td>
								<td>'.$item["reference"].'</td>



				<td><a href="#detail'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-primary fa fa-th-list btn-sm"></button></a>


				<div class="modal fade" id="detail'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">';

				$dataIdOrderController = $item["idorder"];
				$dataIdClientController = $item["iduser"];
				// TRAER LOS ID DE PRODCTOS REFERENTES AL NUMERO DE ORDEN
				$answerIdProduct = purchaseOrderModel::viewIdProductPurchaseOrderModel($dataIdOrderController, "pedido_has_producto");
				// TRAER LOS DATOS PERSONALES DEL CLIENTE
				$answerDataClient =clientModel::viewPurchaseClientModel($dataIdClientController, "clientes");

				echo

				 '
				 <table class="table  table-responsive table-light" style="font-size:12px;">
					<thead>
			<tr>
				<th style="font-size:20px;">Orden #  '.$item["idorder"].'</th>
				<th></th>
				<th></th>
				<th></th>


				</tr>


<th style="text-align:left">Cliente:  '.$answerDataClient["name"].'  '.$answerDataClient["lastname"].' -Documeno: '.$answerDataClient["identification"].'   -Telefono:  '.$answerDataClient["phone"].'</th>
				</tr>
				
<th style="text-align:left">Dirección: '.$answerDataClient["address"].'   - '.$answerDataClient["municipality"].' - '.$answerDataClient["estate"].'
<th></th>
<th></th>
<th></th>


</th>
				
		
					</thead>
				</table>
				';

	echo  '<table class="table  table-light" style="font-size:12px;">

			<thead>
<tr>
<th >Producto</th>
<th >Cantidad</th>
<th >Precio</th>
<th >Total</th>
	</thead>';
		



// NOTA: NO BORRAR LOS COMENTARIOS(SE PRUEBA CON UN INNER JOIN)

// ITERAR RESULTADOS DE LA TABLA pedido_has_producto
foreach ($answerIdProduct as $row => $item) {

$total= $item["cant"]*$item["price"];
// $dataProductNameController = array("id" => $item["idproduct"]);	

// TRAER LOS NOMBRE DE PRODUCTOS POR EL NUMERO DE ORDEN
// $answerProductName = purchaseOrderModel::viewProductNamePurchaseOrderModel($dataProductNameController, "productos");
 




// TRAER NOMBRE DE PRODUCTOS POR ID
// foreach ($answerProductName as $row => $value) {
 // echo'<label for="form-control" style="font-size:17px;">'.$value["title"].'</label>';

echo'


	<tbody>
		<tr>
				<td>'.$item["title"].'</td>
				<td>'.$item["cant"].'</td>
				<td>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
				<td>'.number_format($total, 0, ",", ".").' Bs.</td>
		</tr>
	</tbody>	';


					
				// }
				}
					

			echo '
			</table>
			</div>
			</div>
			</div>
			</td>
							
				<td><a href="#statusCheck'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-success fa fa-check btn-sm"></button></a>
				<div class="modal fade" id="statusCheck'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

			
			<form method="post" enctype="multipart/form-data">


			<h5>¿Desea cambiar el estado?</h5>
			<h2>Estado Entregado</h2>
			<h5> Orden # '.$item["idorder"].'</h5>
			<input type="text" class="form-control" name="idOrderCheck" value='.$item["idorder"].' style="display:none">

			<br>


				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-check  form-control btn-success" class="close" aria-label="close" ></button>
				</div>
					</form>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>


				
				
		
					</div>
					</div>
					</div>
					

							</td>



				<td><a href="#statusDelete'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-danger fa fa-trash btn-sm"></button></a>
				<div class="modal fade" id="statusDelete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

			
			<form method="post" enctype="multipart/form-data">


			<h5>¿Desea cambiar el estado?</h5>
			<h2>Estado Eliminado</h2>
			<h5> Orden # '.$item["idorder"].'</h5>
			<input type="text" class="form-control" name="idOrderDelete" value='.$item["idorder"].' style="display:none">

			<br>


				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-check  form-control btn-success" class="close" aria-label="close" ></button>
				</div>
					</form>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button type="submit" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>


				
				
		
					</div>
					</div>
					</div>
					

							</td>';


								  }


	 		 	  }

	 		 	  #VER ESTADO ENTREGADO
	 		 	  #--------------------------------------
	 		 	   public static function viewStatusCheckPurchaseOrderController(){

	 		 	   	$answer = purchaseOrderModel::viewsStatusCheckPurchaseOrderModel("pedido");


	 		 	    foreach ($answer as $row => $item) {
	 		 	    $newDate = date("d/m/yy", strtotime($item["date"]));

	 				$row = $row +1;
	 	
	 			echo '
					
							<tr>
								<td>'.$row.'</td>
								<td>'.$newDate.'</td>
								<td>'.$item["idorder"].'</td>
								<td>'.number_format($item["mount"], 0, ",", ".").' Bs.</td>
								<td>'.$item["convertion"].'</td>
								<td>'.$item["reference"].'</td>



				<td><a href="#detail'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-primary fa fa-th-list btn-sm"></button></a>


				<div class="modal fade" id="detail'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">';

				$dataIdOrderController = $item["idorder"];
				$dataIdClientController = $item["iduser"];
				// TRAER LOS ID DE PRODCTOS REFERENTES AL NUMERO DE ORDEN
				$answerIdProduct = purchaseOrderModel::viewIdProductPurchaseOrderModel($dataIdOrderController, "pedido_has_producto");
				// TRAER LOS DATOS PERSONALES DEL CLIENTE
				$answerDataClient =clientModel::viewPurchaseClientModel($dataIdClientController, "clientes");

				echo

				 '
				 <table class="table  table-responsive table-light" style="font-size:12px;">
					<thead>
			<tr>
				<th style="font-size:20px;">Orden #  '.$item["idorder"].'</th>
				<th></th>
				<th></th>
				<th></th>
				
				</tr>


<th style="text-align:left">Cliente:  '.$answerDataClient["name"].'  '.$answerDataClient["lastname"].' -Documeno: '.$answerDataClient["identification"].'   -Telefono:  '.$answerDataClient["phone"].'</th>
				</tr>
				
<th style="text-align:left">Dirección: '.$answerDataClient["address"].'   - '.$answerDataClient["municipality"].' - '.$answerDataClient["estate"].'
<th></th>
<th></th>
<th></th>
</th>
				
</thead>
</table>';

	echo  '<table class="table  table-light" style="font-size:12px;">

			<thead>
<tr>
<th >Producto</th>
<th >Cantidad</th>
<th >Precio</th>
<th >Total</th>
	</thead>';
		



// NOTA: NO BORRAR LOS COMENTARIOS(SE PRUEBA CON UN INNER JOIN)

// ITERAR RESULTADOS DE LA TABLA pedido_has_producto
foreach ($answerIdProduct as $row => $item) {

$total= $item["cant"]*$item["price"];
// $dataProductNameController = array("id" => $item["idproduct"]);	

// TRAER LOS NOMBRE DE PRODUCTOS POR EL NUMERO DE ORDEN
// $answerProductName = purchaseOrderModel::viewProductNamePurchaseOrderModel($dataProductNameController, "productos");
 

// TRAER NOMBRE DE PRODUCTOS POR ID
// foreach ($answerProductName as $row => $value) {
 // echo'<label for="form-control" style="font-size:17px;">'.$value["title"].'</label>';

echo'


	<tbody>
		<tr>
				<td>'.$item["title"].'</td>
				<td>'.$item["cant"].'</td>
				<td>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
				<td>'.number_format($total, 0, ",", ".").' Bs.</td>
		</tr>
	</tbody>	';


					
				// }
				}
					

			echo '
			</td>

			</table>
			</div>
			</div>
			</div>
			
			
							<td>
							<a href="reports/fpdf181/reports/invoice.php?id='.$item["idorder"].'" target="blank"> 
							<button type="submit" class="fa fa-file  form-control btn-dark"></button>
							</a>

							</td>
							';



	 		 	   				}
	 		 	   			

	 		 	      }

	 		 	      # VER ESTADO DELETE
	 		 	      #-------------------------------------------------

	 		 	       public static function viewStatusDeletePurchaseOrderController(){

	 		 	       	$answer = purchaseOrderModel::viewStatusDeletePurchaseOrderModel("pedido");


	 		 	       	 foreach ($answer as $row => $item) {
	 		 	       	 $newDate = date("d/m/yy", strtotime($item["date"]));

	 					$row = $row +1;
	 	
	 						echo '
						<tbody>
							<tr>
								<td>'.$row.'</td>
								<td>'. $newDate.'</td>
								<td>'.$item["idorder"].'</td>
								<td>'.number_format($item["mount"], 0, ",", ".").' Bs.</td>
								<td>'.$item["convertion"].'</td>
								<td>'.$item["reference"].'</td>



				<td><a href="#detail'.$row.'"  data-toggle="modal">
				<button type="button" class="form-control btn-primary fa fa-th-list btn-sm"></button></a>


				<div class="modal fade" id="detail'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">';

				$dataIdOrderController = $item["idorder"];
				$dataIdClientController = $item["iduser"];
				// TRAER LOS ID DE PRODCTOS REFERENTES AL NUMERO DE ORDEN
				$answerIdProduct = purchaseOrderModel::viewIdProductPurchaseOrderModel($dataIdOrderController, "pedido_has_producto");
				// TRAER LOS DATOS PERSONALES DEL CLIENTE
				$answerDataClient =clientModel::viewPurchaseClientModel($dataIdClientController, "clientes");

				echo

				 '
				 <table class="table  table-responsive table-light" style="font-size:12px;">
					<thead>
			<tr>
				<th style="font-size:20px;">Orden #  '.$item["idorder"].'</th>
				<th></th>
				<th></th>
				<th></th>

				</tr>


<th style="text-align:left">Cliente:  '.$answerDataClient["name"].'  '.$answerDataClient["lastname"].' -Documeno: '.$answerDataClient["identification"].'   -Telefono:  '.$answerDataClient["phone"].'</th>
				</tr>
				
<th style="text-align:left">Dirección: '.$answerDataClient["address"].'   - '.$answerDataClient["municipality"].' - '.$answerDataClient["estate"].'
<th></th>
<th></th>
<th></th>
</th>
				
		
					</thead>
				</table>
				';

foreach ($answerIdProduct as $row => $item) {

$total= $item["cant"]*$item["price"];
$dataProductNameController = array("id" => $item["idproduct"]);	

	// TRAER LOS NOMBRE DE PRDUCTOS POR EL NUMERO DE ORDEN
$answerProductName = purchaseOrderModel::viewProductNamePurchaseOrderModel($dataProductNameController, "productos");

foreach ($answerProductName as $value) {


echo'

		<label for="form-control" style="font-size:17px;">'.$value["title"].'</label>';
				echo

				'<table class="table table-striped">

		<tbody>
			<tr>
				<td></td>
				<td>'.$item["cant"].'</td>
				<td>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
				<td>'.number_format($total, 0, ",", ".").' Bs.</td>
			</tr>
		</tbody>
	</table>';


		}

}
					echo '
		

			

				</div>
				</div>
				</div>';




							   }

	 		 	       }

	 		 	    #IMPRIMIR CABECERA
	 		 	    #------------------------------------------------------
	 		 	     public static function printBillReportHeaderController(){

	 		 	        	$idOrderController = $_GET["id"];

	 		 	        	$answer = purchaseOrderModel::printBillReporHeaderModel($idOrderController, "pedido");

	 		 	        	return $answer;



	 		 	   }

	 		 	   #IMPRIMIR CUERPO DE LA FACTURA
	 		 	   #---------------------------------------------------------- 
	 		 	   	 public static function printBillReportController(){
	
	 		 	   			 $idOrderController = $_GET["id"];
	
	 		 	   	 		  $answerBill = purchaseOrderModel::printBillReporModel($idOrderController, "pedido_has_producto");
	
	 		 	   	  		  return $answerBill;


	 		 	    }

	 		 	    // VER ORDENES PENDIENTES EN EL HOME
	 		 	    // ---------------------------------------------------------
	 		 	     public static function viewCountOrdersController(){


	 		 	      $answer = purchaseOrderModel::viewCountOrdersModel("pedido");
		

					if ($answer["id"]==0) {
			
					echo'  <span class="badge badge-danger badge-pill" style="font-family: Pavanam-Regular; font-size: 15px; display: none" >'.$answer["id"].'</span>';


					}else{

					echo'  <span class="badge badge-warning 14 badge-pill" style="font-family: Pavanam-Regular; font-size: 15px; " >'.$answer["id"].'</span>';


										}


	 		 	     }


}