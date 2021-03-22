<?php 
if(!$_SESSION["validate"]) {
	header("location:index");
	
	exit();
}
 
include "views/modules/navegation.php";
 ?>
 <hr>
<!-- Lash -->
	<ul class="nav nav-pills col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=clients">Clientes</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=clientsEnable">clientes bloqueados</a>
		</li>
		
	</ul>
	<!-- End Lash -->
	<br>
 <div class="row container-fluid">
 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 		<table class="table table-striped table-sm" id="clientTable" style="font-family: Pavanam-Regular; ">
 			<thead>
 				<tr>
 					<th>#</th>
					<th>Usuario</th>
 					<th>Datos Personales</th>
 					<th>Bloquear cuenta</th>
 				</tr>
 			</thead>
 			<tbody>
 			
 		
  		<?php 
 			$viewClientData = new clientController();
 			$viewClientData -> viewClientController();
 			$updateStatusClientController = new clientController();
 			$updateStatusClientController ->updateStatusClientController();
 		 ?> 
 				</tbody>
 		</table>
 	</div>
 	
 </div>