<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	exit();
}

 ?>

	<!-- Lash -->
	<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=purchaseCar">Carrito</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=paymentForm">Forma de pago</a>
		</li>

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=address">Datos de envíos</a>
		</li>

	</ul>
	<!-- End Lash -->
	<hr>

		<form method="post" enctype="multipart/form-data">
	<div class="row container-fluid">
	<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2">
	<h6>Zonas disponibles</h6>


	<select  class="custom-select custom-select-sm"  id="estateSave" name="ClientEstate" required>

	<?php  
	 $viewStateController = new zoneDeliveryController();
	 $viewStateController -> viewZoneDeliveryEstateController();
	
	// TÉRMINOS Y CONDICIONES
	 $sendToAddressController = new addressController();
	 $sendToAddressController -> InformationController();
	?>
	 	
	</select>
	</div>
	
	<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">

			<label for="municipiosSave"></label>

	<?php 

	$viewMunController = new zoneDeliveryController();
	$viewMunController -> viewZoneDeliveryMunicipalityController();

	?>

	</div>

</div>

<hr>


<div class="row container-fluid">

		<?php 

		$viewDataUser = new addressController();
		$viewDataUser ->viewClientAdressController();

		 ?>
			

	</div>

<hr>

	<br>
	<div class= "row container-fluid ">

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
		
	






<?php 
$saveClientAddress= new addressController();
$saveClientAddress ->saveClientAddressController();

$updateClientAddress = new addressController();
$updateClientAddress->updateClientAddressController();
 ?>
	</form>
	</div>
</div>

	</div>

