<?php 

if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>

<br>
<section>
	
	<!-- Lash -->
	<ul class="nav nav-pills ">

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=clientsInformation">Términos y condiciones</a>
		</li>

			</ul>
				<!-- End Lash -->
			<hr>
		

		<div class="row container-fluid">

		<form method="post" enctype="multipart/form-data">
	<div  class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<p>Ingrese los Términos y condiciones para el uso del sistema.</p>
		
		<input type="text" class="form-control" name="headerTerminosC" placeholder="Título" required>
		
		<br>

	<textarea class="form-control" id="terminosC" name="BodyterminosC"  cols="100"	rows="10"   placeholder="Contenido del mensaje" required ></textarea>
	</div>
		</div>

		<?php 

			$saveTermsCond = new clientController();
			$saveTermsCond-> saveTermsCondController();
			

		 ?>

		<div  class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<br>
			<input type="submit" class="form-control btn-primary" value="Registrar información">
			<br>
				</form>
			
		<!-- VER TERMINOS Y CONDICIONES -->
		<a href="#modal"  data-toggle="modal">
		<button type="button" class="form-control btn-warning" >Ver términos y condiciones </button></a>
			
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
		<div class="modal-dialog" role="document"  modal-lg>
		<div class="modal-content" style="font-size:14px">
		<div class="modal-header  ">
		
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span> </button>
		</div>
		<div class="modal-body"  style="text-align: left; margin: 0%;">

			<?php

			$viewTermsCond = new clientController();
			$viewTermsCond-> viewTermsCondController();
			
			?>
			
			</div>
					<div  class="col-lg-12 col-md-12 col-sm124 col-xs-12">
			<button type="button" class=" form-control btn-primary "  data-dismiss="modal"  aria-label="Close">Entendido</button>
			<br>
		</div>
			</div>
			</div>
			</div>
			
			
	

		
		
	</section>
		

	

		
