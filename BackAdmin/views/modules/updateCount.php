<?php 


if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}

 
include "views/modules/navegation.php";
 ?>


<div class="row container-fluid">

<div  class="col-lg-5 col-md-5 col-sm-5 col-xs-5" id="createUser" style="display: none">
	<br>
<form method="post" enctype="multipart/form-data">
			<label for="input" class=" col-form-label is-valid">Nombre</label>
	
			<input type="text" class="form-control form-control-sm"  name="createUserName" required maxlength="20"  value=''  required> 
			
			<label for="input" class=" col-form-label is-valid">Apellido</label>
	
			<input type="text" class="form-control form-control-sm"  name="createUserLastName" required maxlength="20" value='' required> 

			<label for="input" class=" col-form-label is-valid">Usuario</label>
	
			<input type="text" class="form-control form-control-sm"  name="createUserEmail" id="createUserEmail" required maxlength="40" value='' required> 

			<label for="input" class=" col-form-label is-valid">Clave Nueva</label>
	
			<input type="password" class="form-control form-control-sm"  name="createUserNewPass"  id="userNewPass" maxlength="15" value="" required>
			<br>


			<div class="form-check">
  			<input class="form-check-input" type="radio" name="createUserRol" value=1 >
  			<label class="form-check-label" for="exampleRadios2">Administrador</label>
			</div>

			<div class="form-check">
  			<input class="form-check-input" type="radio" name="createUserRol"  value=2 checked>
 		 	<label class="form-check-label" for="exampleRadios1">Empleado
  			</label>
			</div>

			<?php 
			$createUser =  new userController;
			$createUser -> createUserController();
			 ?>

			<br>
			<input  type="submit" class="form-control btn-primary  btn-sm" id="saveUpdateUser" value="Guardar">
			<br>
			 <button class="form-control btn-danger  btn-sm" id="hidePanelCreate">Cancelar</button>

</form>
</div>



 <div  class="col-lg-5 col-md-5 col-sm-5 col-xs-5" id="hideInfoPerfil">


<br>

<!-- PERFIL DE USUARIO -->
	<?php 
	$viewUserPerfil = new userController;
	$viewUserPerfil -> viewUserPerfilController();
	 ?>

	 <button class="form-control btn-info btn-sm" id="PanelEdit" value="">Editar perfil</button>
	 <br>
	 <button class="form-control btn-warning btn-sm" id="PanelCreate">Agregar usuario</button>
 
</div>




	
 <div  class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="display: none" id="viewPanelEdit">
 <form method="post" enctype="multipart/form-data">
 		
	<br>
	<!-- ACTUALIZAR DATOS DE USUARIO -->
	<?php 
	$viewUserPerfilEdit = new userController;
	$viewUserPerfilEdit -> viewUserPerfilEditController();


	$updateCountUser = new userController;
	$updateCountUser -> updateCountUserController();


	 ?>
		
		



<br>

 <input  type="submit" class="form-control btn-primary  btn-sm" id="saveUpdateUser" value="Actualizar">
  	</form>
 <br>
 <button class="form-control btn-danger  btn-sm" id="hidePanelEdit">Cancelar</button>

</div>


 <div  class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
 	<br>


 	<table class="table table-striped" id="userTable">

 		<thead>
 				<tr>
 			<th>Usuario</th>
 			<th>Perfil</th>
 			<th>Email</th>
 			<th>Editar</th>
 			<th>Accesos</th>
 		

 				</tr>
 		</thead>
 
 		<tbody>

 		<?php 
 		$viewUsers = new userController;
 		$viewUsers -> viewUsersController();


	$deleteUserCount = new userController;
	$deleteUserCount->deleteUserCountController();
 		 ?>
 			
 		</tbody>
 	</table>
</div>


<form method="post" enctype="multipart/form-data">

 </form>
</div>
