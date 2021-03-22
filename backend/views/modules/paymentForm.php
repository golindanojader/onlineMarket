<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	exit();
}

 ?>	


<!-- Lash -->
	<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<li class="nav-item">
			<a class="nav-link"  href="index.php?action=purchaseCar">Carrito</a>
		</li>

		<li class="nav-item">
			<a class="nav-link active "  href="index.php?action=paymentForm">Forma de pago</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=address">Dirección de envíos</a>
		</li>

	</ul>
	<!-- End Lash -->
	<hr>
<div class="row container-fluid">
	

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<br>
	<table class="table table-striped table-sm  table-borderless table-light">
	<label  class="label-info" for=""  style="font-family: ubuntu-light; font-size: 15px">Transferencias</label>
		
<?php 
$viewBank = new bankController();
$viewBank -> viewBankController();
 ?>

	</table>



<form method="post"   onsubmit="return sendValidate()">
<input type = "number"  class="form-control form-control-sm" name="sendPurchase" id="sendPurchase"  placeholder="Ingrese el Número de referencia completo" >
<br>
<input type="submit" class="form-control btn-success"    value="Procesar Compra" >

<?php 
$processPurchase = new bankController();
$processPurchase->processPurchaseController();

 ?>
</form>

</div>





</div>



<div class="row container-fluid" >

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " >

		<table class="table table-bordered" >
				<br>
			<thead>
				<tr>
					<th  style="font-family: ubuntu-light; font-size: 15px">Deseo retirarlo personalmente</th>
				</tr>
				
			</thead>


					<form method="post" enctype="multipart/form-data">
					<tbody>
					
						<?php 
						$viewBranchAddress  =  new branchController();
						$viewBranchAddress -> viewBranchAddressController();
					
						$processPurchaseIndividualRetire = new purchaseOrderController();
						$processPurchaseIndividualRetire ->saveProcessPurchaseIndividualRetireController();
						 ?>


						
				
			</tbody>
			
		</table>

		<button type="submit" class="form-control btn-primary btn-sm ">Retirar en sucursal</button>

		</form>
	</div>
</div>

