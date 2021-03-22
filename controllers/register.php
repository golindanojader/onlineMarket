<?php 

class enterRegister{

	 public static function controllerEnterRegister (){

	 	if (isset($_POST["userRegister"]) && 
	 				 $_POST["passwordRegister"] && 
	 				 $_POST["repeatPasswordRegister"]) {
	 				
	 				// Convert to lower case
	 				 $_POST["userRegister"] = strtolower($_POST["userRegister"]);

	 				// Variable $size, to validate max characteres of  $_POST["userRegister"]
	 				$size = strlen("1234567891012345678910123456789101234567");
	 				$userRegister = strlen($_POST["userRegister"]);
	 				$passwordRegister =  crypt($_POST["passwordRegister"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	 				$repeatPasswordRegister =  crypt($_POST["repeatPasswordRegister"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

	 				// Variable $lenght, to validate max characteres of   $_POST["passwordRegister"]
	 				$lenght = strlen("1234567");
	 				//  Validate Password lenght
	 				$passwordLenght =  strlen($passwordRegister);

	 				// Validate max lenght in $_POST["userRegister"]
	 				if ($userRegister>$size) {

	 				echo '<p class="form-control btn btn-sm btn-danger" style=" width: 270px auto;  font-size: 15px; ">Error en registro, ingrese otra cuenta de correo</p>';
	 					
	 				}
	 			
		// Validate Password
	 	elseif ($passwordRegister != $repeatPasswordRegister ) {

	 					echo '<p class="form-control btn btn-sm btn-danger" style=" width: 270px auto;  font-size: 15px; ">Error en registro, las contraseñas no coinciden</p>';
	 					
	 					
	 				}

	 	//  Validate Password lenght
	 	elseif ($passwordLenght <= $lenght){

	 				echo '<p class="form-control btn btn-sm btn-danger" style=" width: 270px auto;  font-size: 15px; ">Error en registro, contraseña muy corta.</p>';
	 			
	 

	 	}

	 		// Validate $_POST["userRegister"]
	 	elseif (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["userRegister"])){

	 				// NOTE: Encrypt passwordRegister
	 				// 
	 				$dataController  = array("user"=>$_POST["userRegister"],
	 															"password"=>$passwordRegister);

				
					#NOTA: En esta sección se prepara para la validacion de correo electrónico
					#---------------------------------------------------------------------------------
					$tempPassRand= mt_rand(1000000,9999999);

					$validateDataController = array("user"=>$_POST["userRegister"],
	 																			"password"=>$passwordRegister,
	 																			"temppass"=>$tempPassRand);

				 // echo 'Su clave de registro es  '.$tempPass.'';

				 $answeValidateUser = ModelRegister::saveModelValidateUser($validateDataController, "validacionusuarios");
				 $answer = ModelRegister::saveModelRegister($dataController, "usuarios");
				
				if ($answeValidateUser == 1 && $answer== 1) {


					$emailDestination = $_POST["userRegister"];
	 				$matter = "Mercado Online";
	 				$title = "Gracias por registrarte";
	 				
	 			

				 // ENVIO DE EMAIL---------------------------------------------

	 				$messaje = '<html>
	 									 <head>
	 									 <title>Mercado Online</title>
	 									 </head>

	 									 <body>
	 									 <h1>Hola, '.$_POST["userRegister"].'</h1>
	 									
	 									 <p>Tu clave de validacion es: <p>
	 									 </body>
	 									 </html>';

	 									 $headers = 'MIME-Version: 1.0' ."\r\n";
	 									 $headers .='Content-type: text/html; charset=UTF-8'."\r\n";
	 									 $headers .='From: <mercadoonline@gmail.com>'."\r\n";

	 									 $send = mail($emailDestination, $title, $messaje, $headers);

	 	

				 // FIN DE ENVIO DE EMAIL------------------------------------------------------
				 if ($send) {

					echo '<script >swal({

								title: "¡Revise su correo electrónico!",
								text: "¡Su clave de validación ha sido enviada exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "register";
									}


												});

												</script>';

												
															
				}
					 }
				else{

					echo "error en registro";
				}





	 					} /*AT LINE 35*/
			
	 			} /*AT LINE 9*/

		}

		// Validate User existent
		 public static function userControllerValidate($validarUsuario){



		 		$datosController = $validarUsuario;

		 		$respuesta = ModelRegister::userModelValidate($datosController, "usuarios");

				if (strlen($respuesta["user"])>0) {

					// SI TRAE DATOS DE LA BD
					
						echo 0;
	
					}else{

						echo 1;

				
					}
		 		
		 	
		 }


		 		 		 public function    viewTermsCondController(){
		 		 		
		 		 		$table = "terminos_condiciones";

		 		 		$answer = ModelRegister::viewTermsCondModel($table);
		 		 		

					echo '<h3>'.$answer["header"].'</h3>
							<hr>
							<div class="row container-fluid" style="text-align:justify">
		
							<p style="text-align:justify; ">'.$answer["information"].'</p>	';			
							

		 		 }

}




	