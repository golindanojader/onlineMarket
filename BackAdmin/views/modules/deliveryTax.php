<?php 



if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>

<div class="row container-fluid">



	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">

		<br>

		<?php 
		$viewTax = new deliveryTaxController();
		$viewTax->viewDeliveryTaxController();
		 ?>
		


<br>

		<form method="post" enctype="multipart/form-data">
		<label for="" class="col-sm-2 ">Impuesto de envío</label>
		<div class="col-sm-2">
			<input type="number"  class="form-control form-control-sm" id="" name="deliveryTax" placeholder="Valor Bs" required maxlength="10" value="0"> 
		</div>
		<br>
	

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
	<input type="submit" class="form-control btn-primary" value="Enviar">
	<br>
	<p>NOTA(EN ESTA SECCION SE DEBERIA COLOCAR EL IMPUESTO POR ZONA)</p>
	</div>

	<?php 
	$saveDeliveryTax = new deliveryTaxController();
	$saveDeliveryTax->saveDeliveryTaxController();


	 ?>


	</div>

</form>


</div>