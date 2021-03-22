<?php 

class pageConnect{

 public  static function modelConnectPage ($Modelconnect){

 	 // white list(it allows to navigate in a sure way)
 	if ($Modelconnect == "about"    ||
 		$Modelconnect == "services" ||
 		$Modelconnect == "login" 	 ||
 		$Modelconnect == "register" ) {

 		$module = "views/modules/".$Modelconnect.".php";
 		
 	}

 	elseif($Modelconnect == "index"){

 		$module = "views/modules/home.php";

 	}

 	 	elseif($Modelconnect == "BackAdmin"){

 		$module = "BackAdmin/index.php";

 	}

 	else{

 		$module = "views/modules/home.php";

 				}

 	return $module;


 		}

}