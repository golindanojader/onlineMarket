<?php 


class categoryController{

 public static function viewCategoriesController(){

$answer = categoryModel::viewCategoriesModel("categorias");

	 	foreach ($answer as $row => $item) {
	 	ob_start();
	 	// sirve para indicarle a PHP que se ha de iniciar el buffering de la salida, es decir, que debe empezar a guardar la salida en un bufer interno, en vez de enviarla al cliente. De modo que, aunque se escriba código HTML con echo o directamente fuera del código PHP, no se enviará al navegador hasta que se ordene explícitamente. O eventualmente, hasta que se acabe el procesamiento de todo el archivo PHP.
	 	// 
	 	//   
		echo '<a class="dropdown-item form-control-sm" href="index.php?categoria='.$item["id"].' ">'.$item["category"].'</a>';

	 			}
		}
 }


