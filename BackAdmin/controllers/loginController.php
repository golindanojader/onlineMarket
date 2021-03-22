<?php 


class loginController	{


	 public static function adminLoginController(){

	 	
	 			
if (isset($_POST["adminUserLogin"])&&
			 $_POST["adminUserPassword"]) {

			 $_POST["adminUserLogin"] = strtolower($_POST["adminUserLogin"]);

				if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["adminUserLogin"])){


							$dataController = array("user"=>$_POST["adminUserLogin"],
																	  "password"=>crypt($_POST["adminUserPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$') );
							
								
								$answer = loginModel::adminLoginModel($dataController, "empleados");

								$intents = $answer["intents"];
								$actualUser = $_POST["adminUserLogin"];
								$maxIntents = 2;


								if ($intents < $maxIntents) {


								if ($answer["user"]==$_POST["adminUserLogin"] && 
									$answer["password"]==crypt($_POST["adminUserPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$')) {
									
									$intents = 0;

									$dataController = array("actualUser"=>$actualUser, "upgradeIntents"=>$intents);
									$answerUpgradeIntents = loginModel::intentsModel($dataController, "user");
										


									// Creating sessions variables
									$_SESSION["validate"] 		= true;
									$_SESSION["id"]     	    	=$answer["id"];
									$_SESSION["rol"]     			=$answer["rol"];
									$_SESSION["user"] 			=$answer["user"];
									$_SESSION["name"] 			=$answer["name"];
									$_SESSION["lastname"] 	=$answer["lastname"];
									$_SESSION["password"] 	=$answer["password"];

			
										header("location:home");
										

												}

									
											else{

													++$intents;
	 													$dataController = array("actualUser"=>$actualUser, "upgradeIntents"=>$intents);
													$answerUpgradeIntents = loginModel::intentsModel($dataController, "empleados");

	 												echo '<div class="alert alert-danger" style="margin:10px auto; width: 270px; border-radius: 0px; font-size: 15px; text-align:center">Usuario o Clave incorrecta</div>';


											}
												}/*if ($intents < $maxIntents) {*/
											else{

												$dataController = array("actualUser"=>$actualUser, "upgradeIntents"=>$intents);
											$answerUpgradeIntents = loginModel::intentsModel($dataController, "empleados");

	 										echo '<div class="alert alert-danger" style="margin:10px auto; width: 270px; border-radius: 0px; font-size: 15px; text-align:center">Ha fallado 3 veces, demuestre que no es un robot</div>';
											}

								}


					}


			}

	 }

