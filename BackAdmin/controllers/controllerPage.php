<?php 

class page{

#Call the template
#------------------------------------
 public static function template(){


 			include "views/template.php";

 		}
 



 #Interaction.
 #------------------------------------

 public static function pageConnectController(){

if (isset( $_GET["action"])) {
	
	 	$controllerPage = $_GET["action"];

	 	
}
else{


	$controllerPage ="index";


}


 	$answer = pageModel::pageConnectModel($controllerPage);

 	include $answer;





 }
}