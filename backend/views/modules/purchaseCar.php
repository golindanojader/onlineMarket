<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	exit();
}

 ?>
	<!-- Lash -->
	<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=purchaseCar">Carrito</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=paymentForm">Forma de pago</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=address">Datos de envíos</a>
		</li>

	</ul>
	<!-- End Lash -->
	<hr>

<div class="row container-fluid" >

	<div id="productList" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
</div>

<div id="productList" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

	<table class="table table-striped table-sm table-borderless ">
			
		
	<?php 

	$viewPorductInpurchaseCar  = new viewsProductsController();
	$viewPorductInpurchaseCar  -> viewPorductInpurchaseCar();

	$deletePorductInpurchaseCar  = new  viewsProductsController();
	$deletePorductInpurchaseCar ->deleteProductController();

	 ?> 
			
		
	</table>

</div>


<div id="productList" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
</div>

</div>

