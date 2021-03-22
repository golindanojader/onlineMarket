<?php 


class pageModel{


 public static function pageConnectModel($modelPage){

 	if ($modelPage=="home"      					||
 		$modelPage=="about"    					||
 		$modelPage=="services" 					|| 
 		$modelPage=="convertion" 				||
 	    $modelPage=="products" 					||
 	    $modelPage=="clients" 		 				||
 	    $modelPage=="clientsInformation" 	||
 	    $modelPage=="clientsEnable"   		||
 	    $modelPage=="banks" 		 				||
 	    $modelPage=="orders" 		 				||
 	    $modelPage=="statusSend"  				||
 	    $modelPage=="statusCheck"				||
 	    $modelPage=="statusDelete"			||
 	    $modelPage=="zoneDelivery"			||
 	    $modelPage=="productInh"  			||
 	    $modelPage=="deliveryTax"  			||
 	    $modelPage=="branch"  					||
 	    $modelPage=="categories"  				||
 	    $modelPage=="updateCount"  			||
 		$modelPage=="productList") {
 		

 			$module = "views/modules/".$modelPage.".php";

 				}
 				else if(	$modelPage  == "index"){

 					

 							$module = "views/modules/login.php";

 				}

 				else if(	$modelPage  == "exit"){

 						

 							$module = "views/modules/exit.php";

 				}

 				else{

 						$module = "views/modules/login.php";

 				}



			return $module ;


 		}




}