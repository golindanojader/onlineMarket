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
			<a class="nav-link"  href="index.php?action=orders">Ordenes Pendientes</a>
		</li>

		

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=statusSend">Enviadas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link   active"  href="index.php?action=statusCheck"> Satisfactoria</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=statusDelete"> Eliminadas</a>
		</li>

	</ul>
	<!-- End Lash -->
<br>
	<div class="row container-fluid">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >



					<table id="checkTable" class="table table-striped table-sm dt-responsive compact columns.data columns.defaultContent table-hover"  style="font-family: ubuntu-light; font-size: 13px">
					
						<thead>
							<tr>
								<th>Item</th>
								<th>Fecha</th>
								<th>Orden</th>
								<th>Monto</th>
								<th>$</th>
								<th>Referencia</th>
								<th>Detalle</th>
								<th>Factura</th>

							</tr>
						</thead>

							<tbody>
							
				<?php 

					$viewPurchaseOrder = new purchaseOrderController();
					$viewPurchaseOrder -> viewStatusCheckPurchaseOrderController();

					$sendStatus= new purchaseOrderController();
					$sendStatus-> updateStatusController();

				 ?>
				</tbody>

					</table>






			 </div>
		
	</div>