<?php 

if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>



 <!-- Home -->
<hr>
 <div id="home" class="col-lg-12 col-md-12 col-sm12 col-xs-12">


 	<div class="jumbotron">


 		<h1>Bienvenid@ <?php echo $_SESSION["name"].'  '.  $_SESSION["lastname"] ?></h1>
 		<h4><p>Bienvenid@ al panel de control</p></h4>
 		
 	</div>
	 	<hr>
	 	
 	</div>

<ul>



 <li class="homeBoton">
<a href="orders">
<div style="background: #5C89D7">
<span class="fa fa-truck"></span>
	
<?php  
$countOrder = new purchaseOrderController();
$countOrder -> viewCountOrdersController();

 ?>

	
<p>Pedidos</p>
</div>
 </a>
 </li>



  <li class="homeBoton">

<a href="products">

<div style="background: #5C89D7">
<span class="fa fa-cart-plus"></span>
<p>Productos</p>
</div>
 </a>
 </li>




 <li class="homeBoton">
<a href="clients">
<div style="background: #5C89D7">
<span class="fa fa-users"></span>
<p>Clientes</p>
</div>
 </a>
 </li>

 <li class="homeBoton">
<a href="convertion">
<div style="background: #5C89D7">
<span class="fa fa-dollar"></span>
<p>Tasa de cambio</p>
</div>
 </a>
 </li>

  <li class="homeBoton">
<a href="banks">
<div style="background: #5C89D7">
<span class="fa fa-bank"></span>
<p>Bancos</p>
</div>
 </a>
 </li>

 </ul>