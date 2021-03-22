
<nav	class="navbar navbar-expand-sm	navbar-light  justify-content-between" style="background:linear-gradient(rgba(
400,999,999,1), rgba(999,999,999,1));: ; font-family: Pavanam-Regular; ">

<a class="navbar-brand"	href="index.php">

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
<a	class="nav-link"a href="index.php">Inicio<span	class="sr-only"></span></a>
</li>


<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false">Categorías</a>
<div	class="dropdown-menu" aria-labelledby="navbarDropdown">

<?php 
$viewCategoriesController = new categoryController();
$viewCategoriesController ->viewCategoriesController();

 ?>

</div>
</li> 




<li	class="nav-item">
<a	class="nav-link" a href="login">Mi cuenta</a>
</li>


</ul>

<form	class="form-check-inline">
<input	class="form-control	mr-sm-2"	type="text"  id="productName"  placeholder="¿Qué buscas?"	aria-label="Search">
	



</form>

</div>
</nav>
