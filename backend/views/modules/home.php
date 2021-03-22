<?php 

if (!$_SESSION["validate"]) {

	header("location:index");
	
	// exit();
}else{



	echo '<div class="main">';


		$products = new viewsProductsController();
		$products->productController();

		$purchaseCar = new viewsProductsController();
		$purchaseCar ->saveProductPurchaseCar();

		// ENVIAR A ZONA DE  REGISTRO DE DIRECCION (SI INGRESA POR PRIMERA VEZ)
		$sendToAddressController = new addressController();
		$sendToAddressController -> sendToAddressController();
		}
		 ?>

	</div>


	
</div>




<div class=" row container" style="margin-left: 160px">

			

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<br>

		<?php 

		$productList = new viewsProductsController();
		$productList ->productListController();


 		if ($productList->productListController()!=0) {

			// ceill -> Redondea un numero entero mayor hacia arriba
 	   // floor -> Redondea un numero entero menor hacia abajo
		$listProduct = ceil($productList->productListController()/12);


 		if ($listProduct > 2) {

 		echo '<ul class="pagination">';


 		for ($i = 1; $i <= 2; $i++) {

 		echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
 					}

 			echo '
 			
 			 <li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$listProduct.'</a></li>
 			 
 			 <li lass="page-item"><a class="page-link"  href="index.php?page='.$i.'"><i class = "fa fa-angle-right" aria-hidden="true"></i></a></li>
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

	</div>

		
	</div>



