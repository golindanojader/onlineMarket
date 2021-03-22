<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	exit();
}

 ?>




<div class="row container-fluid">

	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
		<table class="" id="productTable">

			
			
			<thead  style="font-family: Pavanam-Regular; font-size: 12px">
				<tr>
					
					<th>fecha</th>
					<th>Pedido</th>
					<th>Monto</th>
					<th>$	</th>
					<th>Estado</th>
					<th>Detalle</th>
				
				</tr>
			</thead>

			<tbody  style="font-family:Pavanam-Regular; font-size: 12px;">

		<?php 
				$viewMyPurchases= new purchaseOrderController();
				$viewMyPurchases->viewMyPurchases();
			 ?>

			 </tbody>
		</table>



		


		
	</div>




</div>

