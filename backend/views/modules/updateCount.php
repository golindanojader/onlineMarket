<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	exit();
}

 ?>
 
 	<!-- Lash -->
	<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=updateCount">Datos de envío</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=updatePass">Contraseña</a>
		</li>

	
	</ul>
	<!-- End Lash -->
	<hr>
	
	
	


		<form method="post" enctype="multipart/form-data">
	
	<!-- Actual Pass -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Contraseña Actual</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm"  type="password" name="actualPass"  maxlength="20" required>	
		</div>
	</div>


		<!-- VER LAS ZONAS DE ENVÍO DISPONIBLES -->
		<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Zonas de Envíos</label>
		<div class="col-sm-2">
		<select  class="custom-select custom-select-sm" id="estate" name="UpdateClientEstate" required>

		<?php  
		$viewStateController = new zoneDeliveryController();
		$viewStateController -> viewUpdateZoneDeliveryEstateController();
		?>
	 
		</select>
		

		<label for="municipios"></label>
		
		</div>
		
		</div>
	
		<!-- Document -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Doc. Identidad</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm" type="text" name="UpdateClientIdentification" maxlength="20" required>		
		</div>
	</div>
				
	<!-- Name -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Nombre</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm"  type="text" name="UpdateClientName"  maxlength="20" required>	
		</div>
	</div>
	
	<!-- LastName -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Apellido</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm" type="text" name="UpdateClientLastname" maxlength="20" required>	
		</div>
	</div>
	
	
		<!-- Telephone Number -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Teléfono</label>
		<div class="col-sm-2">
			<input  class="form-control form-control-sm" type="text" name="UpdateClientPhone" maxlength="15" required>	
		</div>
	</div>
			
			



		<!-- Address -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Dirección</label>
		<div class="col-sm-5">
		<input  class="form-control form-control-sm" type="text" name="UpdateClientAddress" maxlength="80" required>	
		</div>
	</div>

	

<br>


<div class="row container-fluid">


<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2">
<input type="submit"class="form-control btn-success btn-sm" value="Actualizar datos">
	



<br>
	</div>


	
</div>

	<?php 

		$updateDateCount = new addressController();
		$updateDateCount -> updateClientAddressController();


	
	 ?>



</form>



	<div class="row container-fluid">
	<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" >
				

		<?php 

		$deleteClientCount = new ClientController();
		$deleteClientCount -> deleteClientController();

		 ?>


				
			
				<br>
			</div>

		</div>