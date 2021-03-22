<?php 


class enterLogin{

	 public static  function controllerEnterLogin (){
	 	ob_end_flush();
	 	// sirve para indicar a PHP que se desea realizar el volcado de todo el bufer en la salida, con lo que se enviará al cliente que ha solicitado la página.

	if (isset($_POST["userLogin"])  &&  
	 			 $_POST["userPassword"]){

	 		// Convert to lower-case
	 		$_POST["userLogin"] = strtolower($_POST["userLogin"]);

	 	// Si cumple con la expresion regular
	if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["userLogin"])){


				$controllerData = array("user"		  =>$_POST["userLogin"],
														  "password"=>crypt($_POST["userPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'));

				$answer = enterLoginModel::modelEnterLogin($controllerData, "usuarios");

				$intents = $answer["intents"];
				$actualUser = $_POST["userLogin"];
				$maxIntents = 2;

				if ($intents < $maxIntents) {

					// Validate BD Data

				if ($answer["user"]		    	== $_POST["userLogin"] &&
					$answer["password"]	== crypt($_POST["userPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$')) {

					$intents = 0;

					$controllerData = array("actualUser"=>$actualUser, "upgradeIntents"=>$intents);
					$answerUpgradeIntents = enterLoginModel::intentsModel($controllerData, "usuarios");

					// DETERMINAR SI EL USUARIO SE ENCUENTRA BLOQUEADO
					$dataUserController =$answer["id"];
					$answerStatusClient = enterLoginModel::viewStatusClientModel($dataUserController, "usuarios");

					if ($answerStatusClient["status"]==1) {



	 					echo '<script>swal({

								title: "Usuario bloqueado temporalmente",
								text: "Estimado usuario su cuenta ha sido bloqueada temporalmente por políticas de la empresa, para más información contacte a nuestro personal administrativo atravéz del 0412-487-65-47 ",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "index";
									}


															 	});

															 	</script>';


										}
										else {
											

					// Creating sessions varaibles
					session_start();
					$_SESSION["validate"] = true;
					$_SESSION["id"]     =$answer["id"];
					$_SESSION["user"] =$answer["user"];
					$_SESSION["password"] =$answer["password"];
					$_SESSION["rol"] = $answer["rol"];

					
						if ($answer["rol"]== 0  && $_SESSION["validate"] = true ) {
							
					
						header("location:backend/index.php");
							
								}	
	 			
	 					}

	 			}
	 		else {

	 			++$intents;
	 				$controllerData = array("actualUser"=>$actualUser, "upgradeIntents"=>$intents);
					$answerUpgradeIntents = enterLoginModel::intentsModel($controllerData, "usuarios");

	 				echo '<div class="alert alert-danger" style="margin:10px auto; width: 270px;  font-size: 15px">Usuario o Contraseña incorrecta</div>';
	 		}


	 		}
	 		else{

	 				$controllerData = array("actualUser"=>$actualUser, "upgradeIntents"=>$intents);
					$answerUpgradeIntents = enterLoginModel::intentsModel($controllerData, "usuarios");

	 				echo '<div class="alert alert-danger" style="margin:10px auto; width: 270px;  font-size: 15px">Ha fallado 3 veces, demuestre que no es un robot</div>';

					}
	 			
	 			}
	 	
	    	}

	 }

	 // VALIDAR INGRESO CON AJAX
	 // #ESTE MÉTODO PERMITE VALIDAR LA CUENTA DEL USUARIO CUANDO INGRESA POR PRIMERA VEZ(CUANDO INGRESA
	 // EL SISTEMA SOLICITARÁ UNA CLAVE PARA VALIDAR AL USUARIO)
	#----------------------------------------------------------------------------------------------------------------
	  public static function validateAccessController($dataAjax){

	  		$dataController = array("user"=>$dataAjax);
	  		$table = "usuarios";
	  		
	  		$answer  = enterLoginModel::validateAccessModel($dataController, $table);
	  		
	  		$valida    = $answer["validate"];

	  		return $valida;

	  	
	  }

	  // VALIDA EL INGRESO POR PRIMERA VEZ Y SOLICITA LA CLAVE DE VALIDACION
	  // ------------------------------------------------------------------------------------
	   public static function  firstAccessController(){

	   	if (isset($_POST["validatePassword"])&& $_POST["labelInfo"]) {
	   		
	    $table = "validacionusuarios";

		$dataController = array("user"=>$_POST["labelInfo"], "temppass"=>$_POST["validatePassword"]);

	   		$answer =enterLoginModel:: firstAccessModel($dataController, $table);

	   		if ($answer["user"]!="" && $answer["temppass"]!="" ) { 	


	   		 $table = "usuarios";
	   		 $dataControllerValidate=array("user"=>$answer["user"],"validate"=>"1");
	   		#SI LOS DATOS SON VÁLIDOS SE PROCEDE A CAMBIAR EL ESTADO "VALIDATE A 1"
	   		 $answerValidate = enterLoginModel::changeStatusValidateModel($dataControllerValidate,$table);

	   		#LUEGO SE PROCEDE A BORRAR LOS DATOS TEMP 
	   		$answerDeleteTempData = enterLoginModel::deleteTempDataModel($dataController, "validacionusuarios");	

	   		echo $answerDeleteTempData;

	   						echo '<script >swal({

								title: "Cuenta validada",
								text: "¡Su cuenta ha sido validada exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "login";
									}


												});

												</script>';
	   		  
	   		  }  else{

	   		  	echo '<script >swal({

								title: "Clave no válida",
								text: "¡La clave introducida no es válida!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "login";
									}


												});

												</script>';
	   		  	
	   		  }

	   		}

	   }

	    public static function  passRecoverController(){

	    	if (isset($_POST["userRecover"])) {

	    	if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["userRecover"])) {

	    		#DETERMINAR SI EXISTE EL CORREO
	    	




	    			  	echo '<script >swal({

								title: "Revise su correo electrónico",
								text: "Su clave de recuperación ha sido enviada correctamente",
								type: "success",
								confirmButtonText: "Ok",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "login";
									}


												});

												</script>';


	    							}

	    				}

	    }
	    #VALIDAR QUE EXISTA EL USUARIO CON AJAX(PARA PROCEDER CON LA RECUERACION DE LA CLAVE)
	    #--------------------------------------------------------------------------------------------------------------
		 public static function    validateExistEmailAjaxController($dataAjax){

	 	$dataController = array("user"=>$dataAjax);
	 	$table = "usuarios";

	 	$answer = enterLoginModel::validateExistEmailAjaxModel($dataController, $table);

	 	if ($answer["user"]=="") {
	 		
	 		return 0;
	 	}else{
	 		return 1;
	 	}

	 }

	 	#ENVIAR LA CLAVE AL CORREO
		#------------------------------------------
	  	public static function  sendPassAjaxController($dataAjax){

	  	$newPassRand= mt_rand(1000000,9999999);
	  	$dataController = array("user"=>$dataAjax);
	 	$table = "usuarios";
	 	$answer = enterLoginModel::sendPassAjaxModel($dataController, $table);

	 	#ACTUALIZA LA CONTRASEÑA DEL USUARIO
	 	if ($answer["validate"]== 1) {
	 		$encryptPass = crypt($newPassRand,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	 		$dataControllerPass = array("user"=>$dataAjax, "password"=>$encryptPass);
	 		$answerNewPass = enterLoginModel::generateNewPassModel($dataControllerPass,$table);
	 		// borrar
	 		return $newPassRand;

	 	#ACTUALIZA LA CONTRASEÑA TEMPORAL DEL USUARIO
	 	}elseif ($answer["validate"]== 0) {
	 		$dataControllerTempPass = array("user"=>$dataAjax, "temppass"=>$newPassRand);
	 		$answerNewTempPass = enterLoginModel::generateNewTempPassModel($dataControllerTempPass, "validacionusuarios");
	 		// borrar
	 		return $newPassRand;
	 		
	 		}

	  }

}
