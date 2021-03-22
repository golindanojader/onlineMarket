<?php 


if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>
 <section>
 	
<br>
 		<!-- Lash -->
	<ul class="nav nav-pills ">

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=branch">Añadir Sucursal</a>
		</li>

	</ul>
<hr>
			<!-- End Lash -->
 
	<div class="row container-fluid">

	<form method="post"  enctype="multipart/form-data">

	<!-- Branch Address -->
	<div class="form-group row">


		<label for="" class="col-sm-12 col-form-label">Dirección de sucursal</label>
		
		<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
		
		<input type="text"  class="form-control form-control-sm"  name="brachAddress" required maxlength="80">
		<br>
			
		</div>




		<div class="col-lg-4 col-md-4 col-sm-4  col-xs-4">
		<input type="submit" class="form-control btn-primary btn-sm"  value="Enviar">
		</div>

	

	<?php 
	$saveBranchController= new branchController();
	$saveBranchController->saveBranchController();
	 ?>
	 </div>
	 </div>
</form>



	<div class="col-lg-6 col-md-6 col-sm-6  col-xs-6">
		<table class="table table-striped">
	<thead>
		<tr>
			<th>Dirección</th>
		</tr>
	</thead>


	<?php 

	$viewBranchController= new branchController();
	$viewBranchController->viewBranchController();

	$deleteAddressController = new branchController();
	$deleteAddressController->deleteAddressController();

	 ?>



</table>

</div>

	</section>
