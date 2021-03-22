<?php 

class zoneDeliveryController{

# VIEW COUNTRY STATES
#--------------------------------------------------------
 public static function viewZoneDeliveryEstateController(){

 	$dataController = array("id"=>$_SESSION["id"]);

 	$answer =  addressModel::viewClientAddressModel($dataController ,"clientes");

 	if (!$answer=="") {

 	echo '<option value='.$answer["estate"].'required>'.$answer["estate"].'</option>';


 	}

else{


 	$answerState = zoneDeliveryModel::viewZoneDeliveryEstateModel("estado");
 		

 		echo '<option  required ></option>';
	foreach ($answerState as $value=>$row) {
		
		echo '<option value='.$row["estate"].' >'.$row["estate"].'</option>';

								}
					
					}

		 }

// VIEW MUNICIPALITIES
// ---------------------------------------------------------------


 public static function viewZoneDeliveryMunicipalityController(){

 	$dataController = array("id"=>$_SESSION["id"]);

 	$answer =  addressModel::viewClientAddressModel($dataController ,"clientes");


 	
 	if (!$answer=="") {

 			echo '<option value="">'.$answer["municipality"].'</option>';

			}


		
			}


	#VER LOS ESTADOS DIPONIBLES EN LA SECCION DE ACTUALIZAR DATOS DE LA CUENTA
	#----------------------------------------------------------------------------------------------	
	 public static function viewUpdateZoneDeliveryEstateController(){
 	$dataController = array("id"=>$_SESSION["id"]);
	$answerState = zoneDeliveryModel::viewZoneDeliveryEstateModel("estado");
 		
 	echo '<option value="">Seleccione</option>';

	foreach ($answerState as $value=>$row) {
			

		echo '<option value='.$row["estate"].'>'.$row["estate"].'</option>';
	 }


	 }



		#VER LOS MUNICIPIOS DIPONIBLES EN LA SECCION DE ACTUALIZAR DATOS DE LA CUENTA
		#----------------------------------------------------------------------------------------------	
		#

	 public static function viewUpdateZoneDeliveryMunicipalityController(){
	// $answerMunicipality = zoneDeliveryModel::viewZoneDeliveryMunicipalityModel("municipios");

	// foreach ($answerMunicipality as $row) {

	// echo '<option value="'.$row["municipality"].'"">'. $row["municipality"].'</option>';

 							// }
				 }



			 public static function borrarBorrar($datos){

		   	$dataController = $datos;

		   	 $answer = zoneDeliveryModel::borrarBorrar($dataController, "municipios");


	   		echo '
	   		<br>
	   		<select class="custom-select custom-select-sm"  name="UpdateClientMunicipality" required>';
		   	foreach ($answer as $row ) {
	
			echo '<option value="'.$row["municipality"].'"" >'. $row["municipality"].'</option>';

			 }

			 echo '</select>';
		    }


#VIEW ID FROM STATE
#--------------------------------------------------
 public static function viewIdStateController($dataFromAjax){

		$dataController = $dataFromAjax;

		$answer = zoneDeliveryModel::viewIdStateModel($dataController, "estado");

		echo $answer["id"];
	
	
 		}


}