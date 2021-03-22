<?php 

class deliveryTaxController{


	 public static function saveDeliveryTaxController(){

	 	if (isset($_POST["deliveryTax"])) {

	 		$dataController = $_POST["deliveryTax"];

	 		$answer = deliveryTaxModel::saveDeliveryTaxModel($dataController, "envios");
	 		

	 			  			if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡Valor almacenado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "deliveryTax";
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


	 				 public static function viewDeliveryTaxController(){


	 				 	$answer = deliveryTaxModel::viewDeliveryTaxModel("envios");

	 				 echo '	<label for="" class="col-sm-2 ">Valor Actual.  '.$answer["tax"].' Bs</label>';
	 				 }


}




