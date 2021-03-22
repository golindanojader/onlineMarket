<?php 

class zoneDeliveryController{



# SAVE COUNTRY STATES
#-------------------------------------------------------
 public static function saveStateMunicipalityController(){

if (isset($_POST["estate"])&&
			 $_POST["municipality"]){

	$estateController = array("estate"=>$_POST["estate"]);

	// busca el estado
	$answerEstate = zoneDeliveryModel::viewZoneDeliveryEstateModel($estateController,"estado");

	if ($answerEstate["estate"]==$_POST["estate"]) {


	$dataControllerMunicipality = array("idestate"=>$answerEstate["id"], 
																	"municipality"=>$_POST["municipality"]);




	$answer= zoneDeliveryModel::saveMunicipalityModel($dataControllerMunicipality, "municipios");




			if ($answer=="ok") {
	
		echo '<script >swal({

								title: "¡OK!",
								text: "¡Zona de envío almacenado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "zoneDelivery";
									}


															 	});

															 	</script>';



										}

		
	}else{
				// guarda el estado
				$estateController = array("estate"=>$_POST["estate"]);
				$answerEstate=zoneDeliveryModel::saveStateModel($estateController, "estado");

				// consulta el estado
				$estateController = array("estate"=>$_POST["estate"]);
				$answerIdEstateSaved =zoneDeliveryModel::viewZoneDeliveryEstateModel($estateController,"estado");


				// captura el id para almacenarlo en la tabla de municipios
				$municipalityController =array("idestate"=>$answerIdEstateSaved["id"], 
																		"municipality"=>$_POST["municipality"]);

				$answerMunicipality= zoneDeliveryModel::saveMunicipalityModel($municipalityController, "municipios");

					echo '<script >swal({

								title: "¡OK!",
								text: "¡Zona de envío almacenado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "zoneDelivery";
									}


															 	});

															 	</script>';

						}
	


	 		 }


 }





# VIEW COUNTRY STATES
#--------------------------------------------------------
 public static function viewZoneDeliveryEstateController(){

 	$answerState = zoneDeliveryModel::viewZoneDeliveryEstateModel("estado");
 	$answerMunicipality = zoneDeliveryModel::viewZoneDeliveryMunicipalityModel("municipios");

		foreach ($answerState as $value) {

		echo '	<option value="">'.$value["estate"].'</option>';
				 }
		  }


		   public static function borrarBorrar($datos){

		   	$dataController = $datos;

		   	 $answer =zoneDeliveryModel::borrarBorrar($dataController, "municipios");
	   		
		   	foreach ($answer as $row => $item) {
	
			echo '
			<table class="table table-striped table-responsive" style="font-size:13px">




	<tbody>
		<tr>
			<td>'.$item["municipality"].'</td>

			<td>
 	 			<a href="#delete'.$row.'"data-toggle="modal">
 	 			<button type="button" class="form-control btn btn-danger fa fa-trash" ></button></a>

 	 			<div class="modal fade" id="delete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

				<h4>¿Desea borrar la dirección de envío?</h4>
				<br>

				
				<form method="post" enctype="multipart/form-data">

					<h6>'.$item["municipality"].'</h6>

				<div class="form-group row">
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$item["id"].'"   id="idMunicipality" name="idMunicipality" readonly style="display:none" > 	
				</div>
				</div>


				<div class="row container-fluid">
				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>



				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>
				</div>



 	 			</td>
		</tr>
	</tbody>
</table>';


			 }


		   }

#VIEW MUNICIPALIITIES
#---------------------------------------------------------------
 public static function viewZoneDeliveryMunicipalityController(){


 $answerMunicipality = zoneDeliveryModel::viewZoneDeliveryMunicipalityModel("municipios");


foreach ($answerMunicipality as $row=>$item) {	
	$row = $row +1 ;
	

echo '<tbody>
	
 	 			<tr>
 	 			<td>'.$item["municipality"].'</td>

 	 			<td>
 	 			<a href="#delete'.$row.'"data-toggle="modal">
 	 			<button type="button" class="form-control btn btn-danger fa fa-trash"></button></a>

 	 			<div class="modal fade" id="delete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

				<h4>¿Desea borrar la dirección de envío?</h4>
				<br>

				
				<form method="post" enctype="multipart/form-data">

					<h6>'.$item["municipality"].'</h6>

				<div class="form-group row">
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$item["id"].'"   id="idMunicipality" name="idMunicipality" readonly style="display:none" > 	
				</div>
				</div>


				<div class="row container-fluid">
				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>



				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>
				</div>



 	 			</td>
 	 			</tr>
 	 		</tbody>';


			 }
		
		}


#VIEW ID FROM STATE
#--------------------------------------------------


 public static function viewIdStateController($dataFromAjax){

		$dataController = $dataFromAjax;

		$answer = zoneDeliveryModel::viewIdStateModel($dataController, "estado");

		echo $answer["id"];
	
	
 		}

  #DELETE ZONE DELIVERY MUNICIPALITY
  #-----------------------------------------------------
   public static function deleteZoneDeliveryMunicipalityController(){

   	if (isset($_POST["idMunicipality"])) {

   		$dataController = $_POST["idMunicipality"];

   		$answer = zoneDeliveryModel::deleteZoneDeliveryMunicipalityModel($dataController, "municipios");

   						if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡Direccion de envio borrada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {


								window.location = "zoneDelivery";
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