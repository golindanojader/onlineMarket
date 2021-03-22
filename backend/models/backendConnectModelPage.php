<?php 

class connectModelPage{


 public static function connectPageModel($modelConnect){


if ($modelConnect =="home" 		 	 ||
	$modelConnect =="purchases" 	 ||
	$modelConnect =="shippingss" 	 ||
	$modelConnect =="profile" 		 ||
	$modelConnect =="purchaseCar" 	 ||
	$modelConnect =="paymentForm"	 ||
	$modelConnect =="address"		 ||
	$modelConnect =="updateCount" 	 ||
	$modelConnect =="updatePass" 	 ||
	$modelConnect =="exit" ) {

	$module = "views/modules/".$modelConnect.".php";
	
						}		
						elseif($modelConnect == "index"){

								$module = "views/modules/home.php";

						}

				

						else{

								$module = "views/modules/home.php";

						}
						return $module;
		 }

}