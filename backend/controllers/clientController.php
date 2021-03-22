<?php 

class  ClientController{


		 public static function deleteClientController(){

		
		 	$dataController = array("id"=>$_SESSION["id"], "user"=>$_SESSION["user"]);

		 	echo '
		 		<a href="#delete"  data-toggle="modal">
		 		<button class="btn btn-danger btn-sm" >Eliminar mi cuenta</button></a>



			<div class="modal fade" id="delete"
			tabindex="-1" role="dialog" arialabelledby="exampleModalLongTitle" ariahidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
		
			
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<h4>¿Deseas eliminar tu cuenta?</h4>
			<br>
			<p>Al eliminar tu cuenta todos tus registros serán borrados y no podrás ingresar nuevamente a la plataforma web.<p>
			</div>

			<div class="modal-footer">
			
			<form method="post" enctype="multipart/form-data">
			<input type="text" name="deleteClient" value="true" placeholder="" style="display:none">
			<button type="submit" class="btn btn-primary">Sí, estoy de acuerdo.</button>
			</form>

			</div>
			</div>
			</div>
			</div> ';



if (isset($_POST["deleteClient"])) {

	if ($_POST["deleteClient"]!="true"){

			
				echo '<script >swal({

								title: "¡Error!",
								text: "¡Estás intentando ingresar un valor no válido!",
								type: "error",
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
	else{


								$answer = clientModel::deleteClientModel($dataController, "usuarios");


												echo '<script >swal({

								title: "¡Ok!",
								text: "¡Has eliminado tu cuenta!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {
										window.location = "../index.php";
									}


															 	});

															 	</script>';



		
												}

	
								}


		 		}

		 		#VER TÉRMINOS Y CONDICIONES
		 		#-------------------------------------------------
		 		 public function    viewTermsCondController(){
		 		 	$table = "terminos_condiciones";

		 		 	$answer = clientModel::viewTermsCondModel($table);
		 		 		
		 		 	$modal=1;
			
					echo '<h3>'.$answer["header"].'</h3>
					<hr>
					<div class="row container-fluid" style="text-align:justify">
				
					<p style="text-align:justify; ">'.$answer["information"].'</p>	';			
							

		 		 }

		 		 // PENDIENTE (NO GENERA LA VARIABLE DE SESSION CON AJAX)
		 		  public static function  validatePassFromAjax($dataAjax){

		 		  	$password = array("pass"=>$dataAjax);
		 		  	$user = $_SESSION["id"];
		 		  // 		$table = "usuarios";
		 		  // 		$answer = clientModel::validatePassFromAjaxModel($dataPassController, $table);
		 		  		
		 		  // 		$userAnswer = $answer["user"];

		 				// return $userAnswer;

		 		  


		 		  }

		 		  #ACTUALIZAR CONTRASEÑA
		 		  #--------------------------------------------------
		 		   public static function   updatePassController(){

		 		   	if (isset($_POST["actualPass"]) && $_POST["newPass"] && $_POST["repeatPass"]) {
		 											
		 		 		 $actualPass = crypt($_POST["actualPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		 		 		 $iduser= $_SESSION["id"];
		 		 		 $user = $_SESSION["user"];
		 		 	 	 $table = "usuarios";

		 		 	 	 $dataController = array("id"=>$iduser, "user"=>$user,	"password"=>$actualPass);
		 		 		 $answerActualPass = clientModel::validatePassModel($dataController, $table);

		 		 		if ($answerActualPass["id"]!="" &&  $answerActualPass["user"]!="") {
		 		 										
		 		 			$newPass 	  = crypt($_POST["newPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');		
		 		 			$repeatPass =  crypt($_POST["repeatPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		 		 			if ($repeatPass !=$newPass ) {

		 		 				echo '	
		 		 				<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
		 		 				<span class="form-control btn btn-danger btn-sm">Las contraseñas no coinciden</span>
								</div>';
		 		 				
		 		 			}else{

		 		 				$dataController = array("id"=>$iduser, "user"=>$user,	"password"=>$newPass);
		 		 				$answer = clientModel::updatePassModel($dataController, $table);

		 		 				if ($answer == 1) {

		 		 					echo '<script >swal({

								title: "¡Ok!",
								text: "¡Su contraseña ha sido cambiada exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {
										window.location = "updatePass";
									}


															 	});

															 	</script>';
		 		 					
		 		 				}else{


		 		 					echo '<script >swal({

								title: "¡Error al actualizar la contraseña!",
								text: "¡Disculpe, Su contraseña no ha podido ser cambiada!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {
										window.location = "updatePass";
									}

															 	});

															 	</script>';
		 		 					}

		 		 			}


		 		 		}else{

		 		 				echo '	
		 		 				<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
		 		 				<span class="form-control btn btn-danger btn-sm">Contraseña Incorrecta, ingrese los datos nuevamente</span>
								</div>';




		 		 										}
		 

		 		   						}


		 		   }

}