<?php 

class userController{

#VER EL PERFIL DE USUARIO
#----------------------------------------------
 public static function  viewUserPerfilController(){

 				if (isset($_SESSION["id"]) && $_SESSION["user"] ) {
 					
 					$dataController = array("id"=>$_SESSION["id"], "user"=>$_SESSION["user"]);
 					$table = "empleados";


 				$answer = userModel::viewUserPerfilModel($dataController, $table);
 				switch ($answer["rol"]) {
 					case 1:
 						$perfil = "Administrador";
 						break;
 						
 					case 2;
					
					$perfil="Empleado"; 					
 					
 						break;
 				}

 					
 			echo '

 			<h2>Hola: '.$answer["name"].' '.$answer["lastname"].'</h2>
			
			<label for="input"  col-form-label is-valid">Cuenta:  '.$answer["user"].'</label>
			<br>
			<label for="input"  col-form-label is-valid">Perfil: '.$perfil.'</label>';

 					}


 			}


 			#VER LISTADO DE USUARIOS DEL DATA TABLE
 			#-----------------------------------------------------

 			 public static function  viewUsersController(){
 			 	$table = "empleados";
 			 	$answer = userModel::viewUsersModel($table);
 				

 				foreach ($answer  as $row => $item) {

 					if ( $item["rol"]== 1) {
 						$perfil = "Administrador";
 						$rolAdmin ="checked";
 						$rolEmployee="";
 					}else{

 						$perfil = "Empleado";
 						$rolEmployee="checked";
 						$rolAdmin="";
 					}
 									
 				echo '
 				<tr>
 				<td>'.$item["name"].'</td>
 				<td>'.$perfil.'</td>
 				<td>'.$item["user"].'</td>

 				<td><a href="#edit'.$row.'"  data-toggle="modal">
 						<button  class="form-control btn-info fa fa-pencil btn-sm"  type="button"></button></a>

 			<div class="modal fade" id="edit'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
			<div class="modal-dialog" role="document" style="">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span> </button>
			</div>
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				  <form method="post" enctype="multipart/form-data">


			
	
			<input type="text" class="form-control form-control-sm"  name="idUser" required maxlength="20"  value='.$item["id"].'  required style="display:none"> 

			<label for="input" class=" col-form-label is-valid">Nombre</label>
	
			<input type="text" class="form-control form-control-sm"  name="changeUserName" required maxlength="20"  value='.$item["name"].'  required> 

			<label for="input" class=" col-form-label is-valid">Apellido</label>
			<input type="text" class="form-control form-control-sm"  name="changeUserLastName" required maxlength="20" value='.$item["lastname"].' required> 

			<label for="input" class=" col-form-label is-valid">Usuario</label>
	
			<input type="text" class="form-control form-control-sm"  name="changeUserEmail" required maxlength="40" value='.$item["user"].' required> 



			<label for="input" class=" col-form-label is-valid">Clave Nueva</label>
	
			<input type="password" class="form-control form-control-sm"  name="createUserNewPass"  id="changeUserNewPass" maxlength="15" required>

			<br>

			<div class="form-check">
  			<input class="form-check-input" type="radio" name="changeUserRol" id="exampleRadios2" value=1 '.$rolAdmin.'>
  			<label class="form-check-label" for="exampleRadios2">
  			  Administrador
 			</label>
			</div>

			<div class="form-check">
  			<input class="form-check-input" type="radio" name="changeUserRol" id="exampleRadios1" value=2 '.$rolEmployee.'>
 		 	<label class="form-check-label" for="exampleRadios1">
  			 Empleado
  			</label>
			</div>


			<hr>
			<input  type="submit" class="form-control btn-primary  btn-sm" id="r" value="Guardar">
				<hr>
				</form>

				<br>

				</div>
				 

				</div>
				</div>
				</div>
				
 				</td>




 	<td><a href="#syst'.$row.'"  data-toggle="modal">
 			<button  class="form-control btn-warning fa fa-user btn-sm"  type="button"></button></a>
						


 			<div class="modal fade" id="syst'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
			<div class="modal-dialog" role="document" style="">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span> </button>
			</div>
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<br>


			<!-- -->
				 <p>En esta sección se establece las diferentes permisologías del usuario empleado a los diferentes módulos, de acuerdo a los requerimientos del cliente.<p>

			<form method="post" enctype="multipart/form-data">
			<input type="text" class="form-control form-control-sm"  name="deleteidUser" required maxlength="20"  value='.$item["id"].'  required style="display:none"> 
			<input type="submit" class="form-control btn-danger  btn-sm" value="Eliminar usuario  '.$item["user"].'">
			<br>
			</form>

	

				
				  </div>
				  </div>
				  </div>
				  </div>

				</td>

 				</tr>';

 				




 				if (isset($_POST["changeUserName"])	  &&
 							 $_POST["changeUserLastName"]&&
 							 $_POST["idUser"]							  &&
 							 $_POST["changeUserEmail"]		  &&
 							 $_POST["changeUserRol"]		  &&
 							 $_POST["createUserNewPass"]) {

 						$table = "empleados";

 					$dataController = array("user"=>$_POST["changeUserEmail"],"password"=>crypt($_POST["createUserNewPass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'), "name"=>$_POST["changeUserName"], "lastname"=>$_POST["changeUserLastName"], "rol"=>$_POST["changeUserRol"], "id"=> $_POST["idUser"]	); 
 					
 				$answer=userModel::updateCountRegisterUser($dataController, $table);

 				if ($answer==1) {

 						echo '<script >swal({

						title: "¡Datos Actualizados!",
						text: "¡Sus datos han sido actulizados correctamente!",
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
		       		}else{

		       			echo '<script >swal({

						title: "¡Error en actualizar datos!",
						text: "¡Ingrese los datos nuevamente!",
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
 				
 				


 											}


 								}



 			 }

 			#VER PERFIL DEL USUARIO
 			#--------------------------------------------------------
 			  public static function viewUserPerfilEditController(){

 			  	if (isset($_SESSION["id"]) && $_SESSION["user"] ) {
			
 				$dataController = array("id"=>$_SESSION["id"], "user"=>$_SESSION["user"]);
 				$table = "empleados";


 				$answer = userModel::viewUserPerfilModel($dataController, $table);

 				if ($answer["rol"]==1) {
 					$rolAdmin = "checked";
 					$rolEmployee = "";
 				}else{
 					$rolEmployee = "checked";
 					$rolAdmin = "";
 				}

 				echo '

 			<label for="input" class=" col-form-label is-valid">Nombre</label>
	
			<input type="text" class="form-control form-control-sm"  name="userName" required maxlength="20"  value='.$answer["name"].'  required> 
			
			<label for="input" class=" col-form-label is-valid">Apellido</label>
	
			<input type="text" class="form-control form-control-sm"  name="userLastName" required maxlength="20" value='.$answer["lastname"].' required> 

			<label for="input" class=" col-form-label is-valid">Usuario</label>
	
			<input type="text" class="form-control form-control-sm"  name="userEmail" required maxlength="40" value='.$answer["user"].' required> 

			<label for="input" class=" col-form-label is-valid">Clave Actual</label>
	
			<input type="password" class="form-control form-control-sm" id="userActualPass" name="userActualPass" maxlength="15" value="" required> 

			<label for="input" class=" col-form-label is-valid">Clave Nueva</label>
	
			<input type="password" class="form-control form-control-sm"  name="userNewPass"  id="userNewPass" maxlength="15" value="" required>
			<br>


			<div class="form-check">
  			<input class="form-check-input" type="radio" name="userRol" id="exampleRadios2" value=1 '.$rolAdmin.'>
  			<label class="form-check-label" for="exampleRadios2">
  			  Administrador
 			</label>
			</div>

			<div class="form-check">
  			<input class="form-check-input" type="radio" name="userRol" id="exampleRadios1" value=2 '.$rolEmployee.'>
 		 	<label class="form-check-label" for="exampleRadios1">
  			 Empleado
  			</label>
			</div>';




						}


 			  }

#ACTUALIZAR  CUENTA DE USUARIO
#----------------------------------------------------------
 		public static function  updateCountUserController(){

		if (isset($_POST["userName"])&& 
			 		 $_POST["userLastName"] && 
			         $_POST["userEmail"] && 
			 		 $_POST["userActualPass"] && 
			 		 $_POST["userNewPass"] &&
			 		 $_POST["userRol"]) {



		            
		            #VALIDAR QUE LA CLAVE SEA CORRECTA PARA PROCEDER A ACTUALIZAR EL REGISTRO
		        	$dataControllerAnswerUserActualPass = array("id"=>$_SESSION["id"], "password"=>crypt($_POST["userActualPass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'));
		        	$table ="empleados";
		       		$answerUserActualPass = userModel::validateUserPassController($dataControllerAnswerUserActualPass, 	$table);

		       		if ($answerUserActualPass["user"]!="") {

		       	var_dump($dataControllerUpdateValues = array("user"=>$_POST["userEmail"], 
		       												 "password"=>crypt($_POST["userNewPass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'), 
		       												 "name"=>$_POST["userName"],
		       												 "lastname"=> $_POST["userLastName"],
		       												 "rol"=>$_POST["userRol"],
		       												 "id" => $_SESSION["id"]));

		       		$answerUpdateController=userModel::updateCountUserModel($dataControllerUpdateValues, $table);

		       		if ($answerUpdateController==1) {
		       		
		       			echo '<script >swal({

						title: "¡Datos Actualizados!",
						text: "¡Sus datos han sido actulizados correctamente!",
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
		       		}else{

		       			echo '<script >swal({

						title: "¡Error en actualizar datos!",
						text: "¡Ingrese los datos nuevamente!",
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



		       		
		       		}else{

		       			echo '<script >swal({

						title: "¡Error!",
						text: "¡Disculpe, su clave no es correcta!",
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
 			  

 			   }


		}

		#CREAR USUARIO
		#-----------------------------------------------
		 public static function createUserController(){

		 	
		 	if (isset($_POST["createUserName"]) 		 &&
		 				 $_POST["createUserLastName"] &&
		 				 $_POST["createUserEmail"] 		 && 
		 				 $_POST["createUserNewPass"]	 && 
		 				 $_POST["createUserRol"]) {
		 				
		 				$table ="empleados";

		 			$dataController = array("user"=>$_POST["createUserEmail"],
	 "password"=>crypt($_POST["createUserNewPass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'),
	 "name"=>$_POST["createUserName"], "lastname"=>$_POST["createUserLastName"], 
	 "rol"=>$_POST["createUserRol"]);

		 		$answer= userModel::createUserModel($dataController,$table);

		 		if ($answer == 1) {
		 			
		 				echo '<script >swal({

						title: "¡Usuario creado!",
						text: "¡El usuario ha sido creado correctamente!",
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
		 				}else{

		 						echo '<script >swal({

						title: "¡Error al crear usuario!",
						text: "¡Disculpe, el usuario no ha sido creado, intente nuevamente!",
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


		 		

		 		}


		 }
#BORRAR CUENTA DE USUARIO
#---------------------------------------------------
 public static function deleteUserCountController(){


 			if (isset($_POST["deleteidUser"])) {
 				
 				$dataController = $_POST["deleteidUser"];
 				$table = "empleados";
 				$answer= userModel::deleteUserCountModel($dataController, $table);

 				if ($answer == 1) {
 					
 						echo '<script >swal({

						title: "¡Usuario borrado!",
						text: "¡El usuario ha sido borrado correctamente!",
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
 			}

 		}




		
}