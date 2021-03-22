

<nav	class="navbar navbar-expand-lg	navbar-light  justify-content-between" style="background: ">

<a class="navbar-brand"	href="index.php?action=home">
	
	<img src="views/img/logo.png" alt="" style="width: 150px; height: 30px">
</a>

<button	class="navbar-toggler"	type="button"	data-toggle="collapse"
data-target="#navbarSupportedContent"	aria-controls="navbarSupportedContent"
aria-expanded="false"	aria-label="Toggle	navigation">
<span	class="navbar-toggler-icon"></span>
</button>




<div	class="collapse	navbar-collapse"	id="navbarSupportedContent">

<ul	class="navbar-nav mr-auto">
<li	class="nav-item active">
<a	class="nav-link"a href="index.php?action=home">Productos<span	class="sr-only">(current)</span></a>
</li>


<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false">Categorías</a>
<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php 
$viewCategoriesController = new categoryController();
$viewCategoriesController->viewCategoriesController();


 ?>

</div>
</li> 




	
<li	class="nav-item">
<a	class="nav-link" a href="index.php?action=purchases">Mis Compras</a>
</li>







<li	class="nav-item">
<a	class="nav-link" a href="index.php?action=purchaseCar" style="font-size: 15px; color: #4A366C;">
	<?php  

	$totalProducts  = new viewsProductsController();
	$totalProducts -> viewTotalPorductInpurchaseCar();
	?> 

	<i class="fa fa-shopping-basket"></i></a>
	</li>	

<li	class="nav-item">
<a	class="nav-link" a href="index.php?action=purchaseCar" style="font-size: 15px; color: #4A366C;">
<?php 

$convertionDollar = new  viewsProductsController();
$convertionDollar -> conversionDollarController();

 ?>
	<i class="fa fa-shopping-basket"></i></a>
	</li>


	<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false">Perfil</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">


<a class="dropdown-item"><?php  echo $_SESSION["user"] ?></a>
<a class="dropdown-item" href="index.php?action=updateCount">Configuración</a>

<a class="dropdown-item" href="#termC" data-toggle="modal">Términos y condiciones</a>	

<div	class="dropdown-divider"></div>
<a class="dropdown-item"	a href="index.php?action=exit">Salir</a>

</div>
</li>
</ul>

<form	class="form-inline	my-2	my-lg-2"> 

<input	 class="form-control	mr-sm-2"	type="search"	id="productName" placeholder="¿Qué buscas?"	aria-label="Search">
<!-- <button	class="btn	btn-outline-success	my-2	my-sm-0"	type="submit">Buscar</button> -->


</form>

</div>

</nav>




			
		<div class="modal fade" id="termC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
	
		<div class="modal-dialog" role="document"  modal-lg>
		<div class="modal-content" style="font-size:14px">
		<div class="modal-header">
		
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span> </button>
		</div>
		<div class="modal-body"  style="text-align: left; margin: 0%;">

	
<?php   
			  $viewTermsCond = new clientController();
			  $viewTermsCond-> viewTermsCondController(); 

	?>
		</div>


		<div  class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<button type="button" class=" form-control btn-primary "  data-dismiss="modal"  aria-label="Close">Entendido</button>
		<br>
		</div>
		</div>
		</div>
		</div>


