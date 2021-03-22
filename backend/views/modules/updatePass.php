<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	exit();
}

 ?>
 	<!-- Lash -->
	<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=updateCount">Datos de envío</a>
		</li>

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=updatePass">Contraseña</a>
		</li>

	
	</ul>
	<!-- End Lash -->
	<hr>
	

	<form method="post" enctype="multipart/form-data">

			<!-- Actual Pass -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Contraseña Actual</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm"  type="password" name="actualPass" id="passAjax" maxlength="20" required>	
		</div>
	</div>



		<!-- New Pass -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid " >Nueva Contraseña</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm" class="password"  type="password" id="password" name="newPass"  maxlength="20" required>	
		</div>
	</div>




		<!--  Repeat Pass -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Repetir Contraseña</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm"  type="password"   id="passwordRepeat" name="repeatPass"  maxlength="20" required>	
		</div>
	</div>


<?php 
$updatePass = new ClientController();
$updatePass -> updatePassController();
 ?>

<div class="row container-fluid">
	<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2">
		<br>
<button type="submit" class="form-control btn-success btn-sm">Aceptar</button>

	</div>
</div>






	</form>


