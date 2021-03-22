
<nav	class="navbar navbar-expand-lg	navbar-dark   justify-content-between "   style="background: #56575A">

<a class="navbar-brand"	href="index.php?action=home">MercadoOnline</a>

<button	class="navbar-toggler"	type="button"	data-toggle="collapse"
data-target="#navbarSupportedContent"	aria-controls="navbarSupportedContent"
aria-expanded="false"	aria-label="Toggle	navigation">
<span	class="navbar-toggler-icon"></span>
</button>

<div	class="collapse	navbar-collapse"	id="navbarSupportedContent">

<ul	class="navbar-nav mr-auto">

<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="index.php?action=products"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false" style="color: white">Productos</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item"href="index.php?action=products">Añadir Productos</a>
<a class="dropdown-item"href="index.php?action=productList">Lista de Productos</a>
<a class="dropdown-item"href="index.php?action=productInh">Productos inhabilitados</a>
<div	class="dropdown-divider"></div>
<a class="dropdown-item"	a href="index.php?action=exit">Ver histórico de Productos</a>
</div>


</li>



<a	class="nav-link	"	href="index.php?action=orders"	role="button" style="color: white">Pedidos

<?php  
$countOrder = new purchaseOrderController();
$countOrder -> viewCountOrdersController();

 ?>


</a>




<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false" style="color: white">Envíos</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="#">Estado de envíos</a>
<a class="dropdown-item" href="index.php?action=zoneDelivery">Zonas de envíos</a>
<a class="dropdown-item" href="index.php?action=deliveryTax">Impuesto de envío</a>
<a class="dropdown-item" href="index.php?action=branch">Entrega por Sucursal</a>
</div>



</li>

<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false" style="color: white">Clientes</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="index.php?action=clients">Registro</a>
<a class="dropdown-item" href="clientsInformation">Información al Cliente</a>

</div>
</li>

<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="index.php?action=convertion"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false" style="color: white">Tasa $</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="index.php?action=convertion" >Tasa del día  
	<?php 
	$viewConvertion = new  convertionController();
	$viewConvertion ->viewConvertionController();
	 ?> Bs</a>


</div>
</li>


<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false" style="color: white">Bancos</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="index.php?action=banks">Añadir bancos</a>


</div>
</li>






<li	class="nav-item dropdown">
<a	class="nav-link	dropdown-toggle"	href="#"	id="navbarDropdown"	role="button"
data-toggle="dropdown"	aria-haspopup="true"	aria-expanded="false" style="color: white">Perfil</a>

<div	class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item"><?php echo $_SESSION["user"]?></a>
<a class="dropdown-item" href="updateCount">Editar perfil</a>


<a class="dropdown-item" href="#termC">Condiciones de uso</a>
			
		

<div	class="dropdown-divider"></div>
<a class="dropdown-item"	a href="index.php?action=exit">Salir</a>

</div>
</li>





</ul>











</div>
</nav>
