<?php 

class addressController{



	#VER DATOS DEL CLIENTE EN DATOS DE ENVÍO
	#-------------------------------------------------------
	 public static function viewClientAdressController(){



	 	$dataController = array("id" => $_SESSION["id"]);


		$answer = addressModel::viewClientAddressModel($dataController ,"clientes");
	
		if ($answer["name"]!="") {
	
		echo '
			 <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" >
			 <h6 >Doc. Identidad</h6>
			 <label class=" label form-control form-control-sm">'.$answer["identification"].'</label>
			 </div>

			 <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" >
			 <h6 >Nombre</h6>
			 <label class=" label form-control form-control-sm">'.$answer["name"].'</label>
			 </div>

			 <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" >
			 <h6 >Apellido</h6>
			 <label class=" label form-control form-control-sm">'.$answer["lastname"].'</label>
			 </div>

			 <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" >
			 <h6 >Teléfono</h6>
			 <label class=" label form-control form-control-sm">'.$answer["phone"].'</label>
			 </div>
	  

			 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" >
			 <h6 >Dirección</h6>
			 <label class=" label form-control form-control-sm">'.$answer["address"].'</label>
				  </div>';

}else{ 

	echo '
			<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<h6>Doc. Identidad</h6>
			<input  class="form-control form-control-sm" type="text" name="ClientIdentification"  maxlength="25" value="'.$answer["identification"].'"required>	
			</div>
 			


 			<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" >
			<h6 >Nombre</h6>
			<input  class="form-control form-control-sm"  type="text" name="ClientName" maxlength="25"  value="'.$answer["name"].'" required >	
			</div>

			<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<h6>Apellido</h6>
			<input  class="form-control form-control-sm" type="text" name="ClientLastname"  maxlength="25" value="'.$answer["lastname"].'" required>	
			</div>

			<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<h6>Teléfono</h6>
			<input  class="form-control form-control-sm" type="text" name="ClientPhone" maxlength="25" value="'.$answer["phone"].'" required>	
			</div>
			
			<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
			<h6>Dirección</h6>
			<input  class="form-control form-control-sm" type="text" name="ClientAddress"  maxlength="40" value="'.$answer["address"].'"required>
			</div>';

					}
					
	 		}
	 		


		#VER DATOS DEL CLIENTE EN MIS COMPRAS
		#----------------------------------------------------
		 public static function vewDataClientAddress(){

  			$dataController = array("id" => $_SESSION["id"]);


			$answer = addressModel::viewClientAddressModel($dataController ,"clientes");

echo '<label for="form-control"  style="font-family:ubuntu-light">Cliente: '.$answer["name"].'   '.$answer["lastname"].'  </label>
					<br>
		<label for="form-control"  style="font-family:ubuntu-light">Doc Num:  '.$answer["identification"].' </label>
					<br>
		<label for="form-control"  style="font-family:ubuntu-light">Teléfono:   '.$answer["phone"].' </label>
					<br>
		<label for="form-control "  style="font-family:ubuntu-light">Dirección:  '.$answer["address"].' .  '.$answer["municipality"].' '.$answer["estate"].'</label>';



  }



	 		 public static function borrarBorrar($datos){

		   	$dataController = $datos;

		   	 $answer = addressModel::borrarBorrar($dataController, "municipios");


	   		echo '
	   		<br>

	   		<select class="custom-select custom-select-sm"  name="ClientMunicipality" required>';
		   	foreach ($answer as $row ) {
	
			 echo '<option value="'.$row["municipality"].'"" >'. $row["municipality"].'</option>';
	
			 }
		
			 echo '</select>';


		   }


#VIEW ID FROM STATE
#--------------------------------------------------
 public static function viewIdStateController($dataFromAjax){

		$dataController = $dataFromAjax;

		$answer = addressModel::viewIdStateModel($dataController, "estado");

		echo $answer["id"];
	
	
 		}



#GUARDAR DATOS DEL CLIENTE
#------------------------------------------------------

public static function saveClientAddressController(){

	 		$idDataController = array("id" => $_SESSION["id"]);
	 		$idUser =  $_SESSION["id"];


			$answer = addressModel::viewClientAddressModel($idDataController ,"clientes");

				if ($answer["name"]!="") {
					
					echo '	<button  class="form-control btn btn-outline-success btn-sm"  type="submit"  value="Enviar" style="display:none"> Enviar</button>';
				}else{

						echo '	<button  class="form-control btn btn-outline-success btn-sm"  type="submit"  value="Enviar" > Enviar</button>';

				}

			

			// SI LOS DATOS VIENEN VACIOS DE LA BD PROCEDE A GUARDAR
			// -----------------------------------------------------------------------
			if ($answer["name"]=="" &&
				$answer["lastname"]==""&&
				$answer["identification"]==""&&
				$answer["phone"]==""&&
				$answer["address"]==""&&
				$answer["municipality"]==""&&
				$answer["estate"]=="" ) {
				
	 		if (isset($_POST["ClientName"])&&
	 				 	 $_POST["ClientLastname"]  &&
	 				 	 $_POST["ClientPhone"]  &&
	 				 	 $_POST["ClientIdentification"]  &&
	 				 	 $_POST["ClientEstate"] &&
	 				  	 $_POST["ClientAddress"] &&
	 				 	 $_POST["ClientMunicipality"])
	 				  {

						 $dataController= array( "identification"=> $_POST["ClientIdentification"],
						 											"iduser"=>$idUser,
						 											"name"=>$_POST["ClientName"],
																    "lastname"	=>  $_POST["ClientLastname"],
																    "phone"=>  $_POST["ClientPhone"],
																    "estate"=>$_POST["ClientEstate"],
																    "municipality"=> $_POST["ClientMunicipality"],
																    "address" =>$_POST["ClientAddress"] );

						 $saveDataClientController = addressModel::saveDataClientModel($dataController, "clientes");


						 		if ($saveDataClientController == "ok") {

				echo '<script >swal({

								title: "¡OK!",
								text: "¡Datos registrado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "address";
									}


												});

												</script>';

												}else{

echo 'datos incompletos';

												}


	 		
 	}


 	}





}
	#ACTUALIZAR DATOS DEL  CLIENTE
	#------------------------------------------------------
	
	 public static function updateClientAddressController(){

	 
	 	$idUser =  $_SESSION["id"];

	 	if (isset($_POST["actualPass"])								&&
	 				 $_POST["UpdateClientName"]		 		&&
	 				 $_POST["UpdateClientLastname"]  		&&
	 				 $_POST["UpdateClientPhone"]  			&&
	 				 $_POST["UpdateClientIdentification"]  &&
	 				 $_POST["UpdateClientEstate"] 				&&
	 				 $_POST["UpdateClientAddress"] 			&&
	 				 $_POST["UpdateClientMunicipality"])
	 				  {
	 				  	$table = "usuarios";																																
	 				  	$dataController = array ("id"=>$_SESSION["id"], "user"=>$_SESSION["user"], "password"=> crypt($_POST["actualPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'));
	 				  	$answerPass = addressModel::validatePassworModel($dataController, $table);

	 				  	if ($answerPass["id"]!="") {

	 				  	$table = "clientes";

	 					$dataController = array("iduser"=>$answerPass["id"], "name"=> $_POST["UpdateClientName"], "lastname"=>$_POST["UpdateClientLastname"], "phone"=> $_POST["UpdateClientPhone"], "identification"=>$_POST["UpdateClientIdentification"], "estate"=>$_POST["UpdateClientEstate"], "municipality"=> $_POST["UpdateClientMunicipality"], "address"=>$_POST["UpdateClientAddress"]);

	 					$answerClientData= addressModel::updateDataClientModel($dataController, $table);

	 					if ($answerClientData == 1) {

	 						echo '<script >swal({

								title: "¡OK!",
								text: "¡Datos actualizados correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "updateCount";
									}


												});

												</script>';
	 						
	 								}

	 				  

	 				  	}else{

	 				  		echo '<div class=" col-lg-5 col-md-5 col-sm-5 col-xs-5">
	 				  		<span class="form-control btn-sm btn-danger">Disculpe, la contraseña es incorrecta</span></div>
	 				  		<br>';
	 				  							}
	 		
 									
 									}


	 				 }


#DETERMINAR SI EL USUARIO NO HA INGRESADO DIRECCION DE ENVIO
#-------------------------------------------------------------------------------
 public static function sendToAddressController(){

$idUser = $_SESSION["id"];
$table = "clientes";

$answer = addressModel::validateClientAddressModel($idUser, $table);

if ($answer["iduser"]=="") {
	
	header("location:address");
					

					}

 			}
#CUANDO EL USUARIO INGRESE POR PRIMERA VEZ MUESTRA MENSAJE PARA REGISTRAR DATOS PERSONALES
#--------------------------------------------------------------------------------------------------------------------

 public static function   InformationController (){


 $idUser = $_SESSION["id"];
$table = "clientes";

$answer = addressModel::validateClientAddressModel($idUser, $table);

if ($answer["iduser"]=="") {
	
		

			echo '<script >swal({

				title: "Bienvenido",
				text: "Para terminar el proceso de registro completa los siguientes campos",
				icon: "success",
				button: "Aww yiss!",

	});

	</script>';
					

					}


 			}

		}

