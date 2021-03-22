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
			<a class="nav-link active"  href="index.php?action=orders">Ordenes Pendientes</a>
		</li>

			<li class="nav-item">
			<a class="nav-link "  href="index.php?action=statusSend">Enviadas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=statusCheck">Satisfactorias</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=statusDelete"> Eliminadas</a>
		</li>

	</ul>

<br>
	<!-- End Lash -->

	<div class="row container-fluid">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


			

					<table class="table table-striped" style="font-family: Pavanam-Regular; font-size: 13px" id="productTable">

						<thead>
							<tr>
								<th>Item</th>
								<th>Fecha</th>
								<th>Orden</th>
								<th>Bs</th>
								<th>$</th>
								<th>Ref.#</th>
								<th>Detalle</th>
								<th>Enviando</th>
								
								<th>Eliminar</th>

							</tr>
						</thead>
						<tbody>
							
				<?php 

					$viewPurchaseOrder = new purchaseOrderController();
					$viewPurchaseOrder -> viewPurchaseOrderController();

					$sendStatus= new purchaseOrderController();
					$sendStatus-> updateStatusController();

				 ?>
				</tbody>

					</table>



							 <label for="label"> Ref. #  0 (Retiro en sucursal)</label>


			 </div>
		
	</div>
