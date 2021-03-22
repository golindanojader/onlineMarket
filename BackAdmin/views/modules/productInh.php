<?php 



if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();


}
 
include "views/modules/navegation.php";
 ?>


<hr>
<!-- Lash -->
<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

<li class="nav-item">
<a class="nav-link"  href="index.php?action=products">Añadir Productos</a>
</li>

<li class="nav-item">
<a class="nav-link "  href="index.php?action=productList">Lista de productos</a>
</li>

<li class="nav-item">
<a class="nav-link  active"  href="index.php?action=productInh">Prod. Inhabilitados</a>
</li>

<li class="nav-item">
<a class="nav-link"   href="index.php?action=categories"> Categorias</a>
</li>

</ul>
<!-- End Lash -->
<hr>


<div id="productList" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-family: ubuntu-light; font-size: 14px">


	<table class="table table-striped table-sm dt-responsive compact columns.data columns.defaultContent" id="productTable">
		

	
		

		<thead>
			<tr>
				
				<th>Item</th>
				<th>Producto</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Cant. Disp</th>
				<th>Editar</th>
				<th>Habilitar</th>
				<th>Imagen</th>

			</tr>

		</thead>
		<tbody>
			<?php 

			$viewProductsDisable = new productsController();
			$viewProductsDisable -> viewProductsDisable();

			  $deleteProduct = new productsController();
   			  $deleteProduct -> deleteProductController();

    		$updateProduct = new  productsController();
   			$updateProduct ->updateProductController();

   			$disableProduct =   new  productsController();
   			$disableProduct -> disableProductController()

			 ?>



		</tbody>

	</table>

<!-- <div class="row container-fluid">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
					<a href="reports/fpdf181/reports/ProductList.php" target="blank">
					<button type="button" class="form-control btn-dark fa fa-print"></button>
					</a>
			</div>
			
		</div> -->
	
</div>