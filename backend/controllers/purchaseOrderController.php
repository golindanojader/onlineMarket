<?php 


class purchaseOrderController{

	// LISTAR TODAS LAS COMPRAS
	// -----------------------------------------------
		 public static function viewMyPurchases(){

		 	$dataController = $_SESSION["id"];
	
			#SI LA VARIABLE GET ESTÁ VACIA MUESTRA LAS CINCO COMPRAS
			#------------------------------------------------------------------------
			$dataController = $_SESSION["id"];
			$table = "pedido";
								
				// VER TODOS LOS PEDIDO REALIZADOS DE ACUERDO AL ID DE CLIENTE
		 		$answerOrder=purchaseOrderModel::viewPurchaseOrderModel($dataController, "pedido");
	
		 		foreach ($answerOrder as $row => $value) {
		 			$row = $row + 1;

		 			switch ($row) {
		 			case $row:
		 			
		 				
		 				}


		 		}


		 		#DETERMINAR EL ESTADO DE ENVÍO
		 		foreach ($answerOrder as $row => $item) {
		 			$newDate = date("d/m/yy", strtotime($item["date"]));
		 			

		 			if ($item["status"]==1) {

		 				$item["status"] = "Enviando";	
		 				$colorStatus =  "style=background:#CFDCFB";


		 				
		 			}elseif($item["status"]==2){

		 				$item["status"] = "Entregado";	
		 				$colorStatus = "style=background:#CFFBD3";

		 				}elseif($item["status"]==3){

		 				$item["status"] = "Eliminado";	
		 				$colorStatus =  "style=background:#FCB8B8";
		 			

		 			}else{

		 					$item["status"] = "En proceso";
		 					$colorStatus = "style=background:#F9FBCF";


		 			}
 			
		echo '  
					<tr>
				
					<td '.$colorStatus.'>'.$newDate.'</td>
					<td '.$colorStatus.'>'.$item["idorder"].'</td>
					<td '.$colorStatus.'>'.number_format($item["price"], 0, ",", ".").' Bs.</td>
					<td '.$colorStatus.'>'.$item["convertion"].'</td>
					<td '.$colorStatus.'>'.$item["status"].'</td>
					

					<td  '.$colorStatus.'><a href="#view'.$row.'"  data-toggle="modal">
					<button class="form-control 	btn btn-primary fa fa-list btn-sm" style="height:25px; width:20px"></button></a>
				

					<div class="modal fade "  id="view'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true" >
					<div class="modal-dialog" role="document" >
					<div class="modal-content" style="font-family:Pavanam-Regular; border-radius:0px">
					<div class="modal-header" >
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body"  style="text-align: left; margin: 0%;">

					
					
					<label  class="label for="" style="font-size:12px">Fecha: '.$newDate.'</label>';



					echo  '
						<table class="table" style="font-size:12px">

		 		  	 	<thead>
		 		  	 	<tr>
		 		  	 	<th>Pedido # '.$item["idorder"].'</th>
		 		  	 	<th></th>
		 		  	 	<th></th>
		 		  	 	<th></th>
		 		  	 	</tr>
						<tr>
						<th>Producto</th>
						<th>Cant</th>
						<th>Precio</th>
						<th>Total</th>
						</tr>
						</thead>';

					// CAPTURA EL NUMERO DE ORDEN PARA ENVIARLO AL MODELO
					// Y TRAER LOS PRODUCTOS
					$dataSendController = $item["idorder"];

					// VER LOS PRODUCTOS ASOCIADOS A ESE PEDIDO DE LA TABLA PUENTE
		 			 $answerProducts=purchaseOrderModel::viewOrderProductList($dataSendController, "pedido_has_producto");

		 			 // Capturar el valor del iva
					$answerIva=iva::viewIvaModel("iva");

					#El impuesto de envio es el valor sobrante entre iva menos monto total
					// Captura el valor de envío
					$answerTax=deliveryTaxModel::viewDeliveryTaxModel("envios");

					$totalMountFromBd = $item["mount"];

					$subTotal = 0;
					$total = 0;

			

		 			 foreach ($answerProducts as $value) {

		 			 $dataSend = array("id"=>$value["idproduct"]);

		 		  	 $answeProductName = viewsProductsModel::viewProductName($dataSend, "productos");

		

		 			 foreach ($answeProductName as $item) {
		 			 			 

		echo'
			
	<tbody>
		
			<td>'.$item["title"].'</td>
			<td>'.$value["cant"].'</td>
			<td>'.number_format($value["price"]).'</td>
			<td>'.number_format($total=$value["cant"]*$value["price"]).' Bs</td>

	</tbody>';
			
			$subTotal = $subTotal + $total;

						 }

			 	 }			 

			 	 	 // DETERMINAR EL TOTAL IVA
						 $totalIva = ($answerIva["iva"] * $subTotal) / 100;

					// DETERMINAR EL TIPO DE ENVÍO
						 $answerDeliveryType=purchaseOrderModel::DeliveryTypeModel($dataSendController ,"pedido");

					// SUBTOTAL + IVA 
					 	 $totalMount = 	$subTotal +  $totalIva;

					 // CONVERSION
					 	$totalDollar = $answerDeliveryType["convertion"];
				
					if ( $answerDeliveryType["branch"] == 0) {
						$bs = "Bs";

						$valorImpuesto = $totalMountFromBd - $totalMount ;
						
						
					}
					else{

							$bs = "";

						$valorImpuesto = 0;
						

					}
	 

					
			echo '
			<td></td>
			<td></td>
			<td style="font-weight: bold">Subtotal:</td>
			<td>'.number_format($subTotal).' Bs</td>
			<tr>
				<td></td>
			<td></td>
			<td style="font-weight: bold">Iva 12%:</td>
			<td>'.number_format($totalIva).' Bs</td>
			<tr>
				<td></td>
			<td></td>
			<td style="font-weight: bold">Envío:</td>
			<td>'.number_format($valorImpuesto).  $bs.'</td>
			<tr>
				<td></td>
			<td></td>
			<td style="font-weight: bold">Total Bs:</td>
			<td>'. number_format($totalMountFromBd).' Bs</td>
			<tr>
				<td></td>
			<td></td>
			<td style="font-weight: bold">Total $</td>
			<td> '.$totalDollar.' $</td>
			
			<tr>
				<td>Todos los envíos se realizan en horario de oficina</td>
				<td></td>
				<td></td>
				<td></td>
		
			<tr>

		
				</table>
				</td>

				';

												
								
								
							}


		 		}

		 		#RETIRO POR SUCURSAL
		 		#--------------------------------------------------------------------
		 		 public static function saveProcessPurchaseIndividualRetireController(){
		 		 // VALIDAR QUE EXISTE EL USUARIO EN EL CARRITO DE COMPRAS
				$dataController =  $_SESSION["id"];
				$answerPurchaseCar  = viewsProductsModel::processPurchaseModel($dataController,"carritocompras");
				 //VALIDAR EL TOTAL DEL CARRITO DE COMPRAS
 				$answerTotalPurchaseCar=viewsProductsModel::TotalSumPurchaseCarView($dataController , "carritocompras");

 				#CALCULO DE IVA
 				#-------------------------------------------------------------------------
 	 			$iva = iva::viewIvaModel("iva");
 				$totalIva= ($iva["iva"] * $answerTotalPurchaseCar["total"]) / 100; 
 				#-------------------------------------------------------------------------

 				#TOTAL DE LA COMPRA
 				$totalPurchase = $answerTotalPurchaseCar["total"] + $totalIva;

				// VALIDAR EL TOTAL EN $
 				$answerConvertion = viewsProductsModel::conversionDollarModel("tasa");
 				$totalConvertionDollar = number_format($totalPurchase / $answerConvertion["tasa"],2);

		 		 	if (isset($_POST["checkRp"])) {
		 		 		$checkRp = $_POST["checkRp"];

			
		 		 	if ($answerPurchaseCar["iduser"]=="") {

					echo '<p style="color:red; font-size:18px">Disculpe usted no tiene productos en el carrito de compras</p>';
	
												}else{

													$idOrder = mt_rand(100000,999999);

						 	$dataControllerOrder= array("idorder"=>$idOrder,
																			   "iduser"=>$_SESSION["id"],
																			   "reference"=>0,
													 						   "mount"=>$totalPurchase,
													 					       "convertion"=>$totalConvertionDollar,
													 					       "branch" =>$checkRp);
						 	echo '<div id=reload value=1>';

					// GUARDAR PRODUCTOS EN EL PEDIDO
					$answer = purchaseOrderModel::savePurchaseOrder($dataControllerOrder, "pedido");

					//VALIDAR LOS PRODUCTOS EN EL CARRITO DE COMPRAS Y ENVIARLOS A LA TABLA PUENTE pedido_has_producto
					$answerProduct =viewsProductsModel::processProductPurchaseModel($dataController, "carritocompras");

					foreach ($answerProduct as $value) {

										$value["idproduct"];
										$value["cant"];
										$value["price"];

						$array = array("idorder"=>$idOrder,
												 "idproduct"=>$value["idproduct"],
							  					  "cant"=>$value["cant"],
							  					  "price"=>$value["price"]);

				$dataControllerOrderHasProduct=purchaseOrderModel::savePurchaseOrderHasProduct($array,"pedido_has_producto");

																}

							if ($dataControllerOrderHasProduct =="ok") {

						// BORRAR DATOS TEMPORALES DEL CARRITO DE COMPRA
				$deletePurchaseCarTemporalData = purchaseOrderModel::deletePurchaseCarTempData($dataController, "carritocompras");


				
		  echo '

		 			<script >swal({

								title: "¡Pedido realizado exitosamente!",
								text: "¡Nuestro personal administrativo está validando su información!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "paymentForm";

								
									}


												});

												   

												</script>';





																	}else{


																		echo 'error';
																	}




												}


		 		 				}


		 		 }

#VER EL TOTAL DE COMPRAS(TANTO LAS ELIMINADAS COMO LAS EXITOSAS)(BORRAR)
#------------------------------------------------------------------------------------
 public static function totalPurchasesController(){

$table = "pedido";
$idUser = $_SESSION["id"];


$answer = purchaseOrderModel::totalPurchasesModel($idUser, $table);
if ($answer["count"]==0) {
	echo "Sin compras registrado";
}else{

$count = $answer["count"];

return $count;
				}
		 }		 		 

}
