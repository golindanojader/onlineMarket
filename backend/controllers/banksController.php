<?php 


class bankController{


#VIEW BANKS
#--------------------------------------------
 public static function viewBankController(){

 	 	$answer = bankModel::viewBankModel("bancos");


	   	foreach ($answer as $row => $item) {
	   		
	   		$row = $row+1;
	  	
	   			echo '<thead>
				<tr>
				<th style="display:none">'.$item["id"].'</th>
	
				</tr>
				</thead>

				<tbody>

				<tr>
				

				<td><a href="#view'.$row.'"data-toggle="modal">
				<button type="button"  style="font-family: ubuntu-light; font-size: 12px" class="form-control btn-primary " value=>'.$item["bank"].'</button></a>



				<div class="modal fade" id="view'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; ">


				
			

						<table class="table" style="font-family:  Pavanam-Regular; font-size: 15px; text-align: left">
						<thead>
						
						<tr>
						<th style="background: white; font-size:17px; style="text-align: left;"">'.$item["bank"].'</th>
						<th style="background: white"></th>
						

						</tr>
					</thead>
					<tbody>
						<tr>
						<td style="font-weight: bold">Titular</td>
						<td>'.$item["possessor"].'</td>
						</tr>
						<tr>
						<td style="font-weight: bold">Num Doc</td>
						<td>'.$item["document"].'</td>
						</tr>

						<tr>
						<td style="font-weight: bold">Tipo de Cuenta</td>
						<td>'.$item["typecount"].'</td>
						</tr>

						<tr>
						<td style="font-weight: bold">Cuenta Num</td>
						<td>'.$item["countnum"].'</td>
						</tr>

						<div class="form-group row">
						<div class="col-sm-4">
						<input type="text" class="form-control" value="'.$item["id"].'"  style="display:none" readonly > 
						<input type="text" class="form-control"name="possessor" value="'.$item["possessor"].'"  style="display:none" readonly > 
						

						</div>
						</div>
						
						</tbody>
						</table>
						<hr>

						<div class="row container-fluid">
						<div class="col-lg-8 col-md-8 col-sm-8  col-xs-8">

						



							</div>

						<div class="col-lg-4 col-md-4 col-sm-4  col-xs-4">
						
						

						</div>
						</div>
						
						
				</td>
				</tr>

				
		</tbody>';	


 			}



}

#VIEW PAY MOVIL (BORRAR)
#-------------------------------------------

 public static function viewPayMovilController(){


 	  $answer= bankModel::viewPayMovilModel("pagomovil");


		 foreach ($answer as $row=> $item) {
		 $row = $row+1;


		 	echo '	


				<tbody  style="font-family: ubuntu-light; font-size: 13px">
				<tr>
				<td>'.$item["numbank"].'</td>
				<td>'.$item["documentid"].'</td>
				<td>'.$item["phone"].'</td>
				
				</td>
			</tr>
		</tbody>';		


 			}

}

// PROCESS PURCHASE(PROCESAR COMPRA)
// ----------------------------------------------------
 public static function processPurchaseController(){

// VALIDAR QUE EXISTE EL USUARIO EN EL CARRITO DE COMPRAS
$dataController =  $_SESSION["id"];
$answerPurchaseCar  = viewsProductsModel::processPurchaseModel($dataController,"carritocompras");

// VALIDAR QUE EXISTA DATOS PERSONALES DEL USUARIO
 $answerAddress = addressModel::validateClientAddressModel($dataController ,"clientes");

 //VALIDAR EL TOTAL DEL CARRITO DE COMPRAS
 $answerTotalPurchaseCar=viewsProductsModel::TotalSumPurchaseCarView($dataController , "carritocompras");

  // VALIDAR EL IMPUESTO DE ENVIO
 // ------------------------------------------------------------------------
 $answerTax = deliveryTaxModel::viewDeliveryTaxModel("envios");

 $iva = iva::viewIvaModel("iva");
 $totalIva= ($iva["iva"] * $answerTotalPurchaseCar["total"]) / 100; 
 $totalPagar =  $totalIva +$answerTotalPurchaseCar["total"] + $answerTax["tax"];


// VALIDAR EL TOTAL EN $
 $answerConvertion = viewsProductsModel::conversionDollarModel("tasa");
 $totalConvertionDollar = number_format($totalPagar / $answerConvertion["tasa"],2);


if (isset($_POST["sendPurchase"])) {
if ($answerPurchaseCar["iduser"]=="") {

	echo '<p style="color:red; font-size:18px">Disculpe usted no tiene productos en el carrito de compras</p>';
	
}


elseif($answerAddress["name"] =="" &&
		  $answerAddress["lastname"] ==""&&
		  $answerAddress["phone"]=="" &&
		  $answerAddress["identification"]==""&&
		  $answerAddress["municipality"]==""&&
		  $answerAddress["address"]=="") {
	
			echo '<p style="color:red; font-size:18px">Estimado usuario no ha ingresado dirección de envío</p>';
}


else{

		$idOrder = mt_rand(100000,999999);
		
		$dataControllerOrder= array("idorder"=>$idOrder,
															"iduser"=>$_SESSION["id"],
															"reference"=>$_POST["sendPurchase"],
													 		"mount"=>$totalPagar,
													 		"convertion"=>$totalConvertionDollar,
													 		"branch"=>0);
		
		// GUARDAR PRODUCTOS EN EL PEDIDO
		$answer= purchaseOrderModel::savePurchaseOrder($dataControllerOrder, "pedido");


		


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
				#Si se ejecuta todo correctamente generar un valor que es procesado con Ajax para acceder del lado del 
				#administrador y asi refrescar la pag dinamicamente
				// json_encode(array('success' => 1));
	// BORRAR DATOS TEMPORALES DEL CARRITO DE COMPRA
	$deletePurchaseCarTemporalData = purchaseOrderModel::deletePurchaseCarTempData($dataController, "carritocompras");



				
		 		echo '<script >swal({

								title: "¡Pedido realizado exitosamente!",
								text: "¡Nuestro personal administrativo está validando los datos de su compra!",
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

					}

