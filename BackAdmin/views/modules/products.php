<?php 


if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();


}
 
include "views/modules/navegation.php";
 ?>
<hr>
<div id="productRegisterSection" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

	
	<!-- Lash -->
	<ul class="nav nav-pills ">

		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=products">Añadir Productos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=productList">Lista de productos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="index.php?action=productInh"> Prod. Inhabilitados</a>
		</li>

			<li class="nav-item">
			<a class="nav-link "  href="index.php?action=categories"> Categorias</a>
		</li>
	</ul>
	<!-- End Lash -->

<hr>
<form method="post" enctype="multipart/form-data">

		<!-- Categoria -->
		<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Categoría</label>
		<div class="col-sm-3">

	<select  class="custom-select-sm form-control" name="categoryName">


		<?php 
		$viewCategoriesController = new categorieController();
		$viewCategoriesController -> viewCategoriesController();
		 ?>
	
	</select>

	</div>
	</div>

	<!-- Producto Name -->
	<div  class="form-group row ">
		<label for="input" class="col-sm-2 col-form-label is-valid">Título</label>
		<div class="col-sm-3">
			<input type="text" class="form-control form-control-sm"  id="productTitle" name="productTitle" required maxlength="40"> 
		</div>
	</div>


	<!-- Product Description -->
	<div class="form-group row">
		<label for="" class="col-sm-2 col-form-label">Descripción</label>
		<div class="col-sm-5">
			<input type="text"  class="form-control form-control-sm" id="productDescription" name="productDescription" required maxlength="50">
		</div>
	</div>

	<!-- Cant Product -->
	<div class="form-group row">
		<label for="" class="col-sm-2 col-form-label">Cantidad</label>
		<div class="col-sm-2">
			<input type="number"  class="form-control form-control-sm" id="productCant" name="productCant" required maxlength="10"  minlength="1" value="1">
		</div>
	</div>

	<!-- Price -->
	<div class="form-group row">
		<label for="" class="col-sm-2 col-form-label ">Precio</label>
		<div class="col-sm-2">
			<input type="number"  class="form-control form-control-sm" id="productPrice" name="productPrice" required>
		</div>
	</div>

		<div class="form-group row">
		<label for="" class="col-sm-2 col-form-label">Imagen</label>
		<div class="col-sm-3">
			<input type="file"  class="input-sm" class="form-control" id="productImage" name="productImage" required>
		</div>
	</div>



	<!-- Submit -->
	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary btn-sm">Registrar Producto</button>
			
		</div>
		
	</div>

	<?php 

	$product = new productsController();
	$product->saveNewPorductController();

	 ?>

</form>
</div>

