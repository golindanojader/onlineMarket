<?php 



if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>
<hr>


	
	<!-- Lash -->
	<ul class="nav nav-pills ">

		<li class="nav-item">
			<a class="nav-link"  href="index.php?action=products">Añadir Productos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=productList">Lista de productos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=productInh"> Prod. Inhabilitados</a>
		</li>

			<li class="nav-item">
			<a class="nav-link active"   href="index.php?action=categories"> Categorias</a>
		</li>

	
	</ul>
		
	<!-- End Lash -->

	<section>
		


	<div class="row container-fluid">
		

	<div  class="col-lg-8 col-md-8 col-sm-5 col-xs-5">
	<hr>
	<form method="post" enctype="multipart/form-data">

	<!-- Categorie Name -->
	<div  class="form-group row ">


		<div class="col-sm-3">
			<input type="text" class="form-control form-control-sm"  id="" placeholder="Ingrese nueva categoría" name="categorieName" required maxlength="40"> 
		<br>
		</div>


			<!-- Submit -->
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-sm">Registrar</button>
		</div>


	</div>








<?php 

$saveCategoryController = new categorieController();
$saveCategoryController -> saveCategorieController();

$editCategoryController = new  categorieController();
$editCategoryController -> editCategoryController();


# NOTA: Al eliminar una categoría se borran el ó los productos asociados a la misma.
$deleteCategoryController = new categorieController() ;
$deleteCategoryController -> deleteCategoryController();

 ?>

	</form>

<hr>
</div>
	
		<table class="table table-responsive  table-striped " id="productTable" style="text-align: center;">
			<thead>
				<tr>
					<th>Item</th>
					<th>Categoría</th>
					<th>Productos</th>
					<th>Detalle</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>

<tbody>

		<?php 
		$viewTableCategoriesController = new categorieController();
		$viewTableCategoriesController -> viewTableCategoriesController();
		 ?>
	
</tbody>

	</table>

		


	</div>
	</section>