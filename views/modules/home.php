



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">

<div class="carousel-item active">
<img class="d-block w-100" src="views/img/publicidad4.jpg" alt="First slide">

</div>
<div class="carousel-item">
<img class="d-block w-100" src="views/img/publicidad5.jpg" alt="Second slide">
</div>

<div class="carousel-item">
<img class="d-block w-100" src="views/img/publicidad3.jpg" alt="Third slide">
</div>


<div class="carousel-item">
<img class="d-block w-100" src="views/img/publicidad2.jpg" alt=" Fourth slide">
</div>

<!-- 
<div class="carousel-item">
<img class="d-block w-100" src="views/img/publicidad5.jpg" alt="Third slide">
<div class="carousel-caption d-none d-md-block mainProducts">
<h5 style="color:black; font-size: 50px; height: 100px; font-family: Pavanam-Regular;margin-right: 200px">El mundo cambia</h5>
<p 	style="color:black; font-size: 20px; height: 100px; font-family:  Pavanam-Regular;margin-right: 200px">...y los procesos de negocio tambien</p>
</div>

</div> -->
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>



			<h2>Nuestros productos</h2>





	<div class="main" >




		<label for="productName"></label>


		<br>
		
		<?php 

			$products = new viewProductsController();
			$products -> ProductsController();
			
		 ?>
		
	</div>



<div class="pagination">

	
</div>
	
	<div class=" row container" >

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		
		<br>
		<hr class="hrStyle">

		<?php 
		$productList = new viewProductsController();
		$productList ->productListController();


 		if ($productList->productListController()!=0) {

 		// ceill -> Redondea un numero entero mayor hacia arriba
 	   // floor -> Redondea un numero entero menor hacia abajo
		$listProduct = ceil($productList->productListController()/12);


 		if ($listProduct > 2) {

 		echo '<ul class="pagination">';


 		for ($i = 1; $i <= $listProduct - 1  ; $i++) {

 		echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
 					}

 			echo '
 			
 			 <li class="page-item"><a class="page-link" href="index.php?page='.$i.'" >'.$listProduct.'</a></li>
 			 
 			 </ul>';

 		 		
 	}else{

 			echo '<ul class="pagination">';


 				for ($i = 1; $i <= $listProduct ; $i++) {

 						echo '<li class="page-item"><a class="page-link"  href="index.php?page='.$i.'">'.$i.'</a></li>';
 					
 				}

 			echo '</ul>';

 					}
 			
 		}else{

 			echo "sin productos";
 		}

		 ?>
<hr class="hrStyle">
	</div>
	</div>
	
