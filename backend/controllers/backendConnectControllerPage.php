<?php 

class connectControllerPage{


 public static function template(){

 		include "views/template.php";

 		}


 public static function connectPage(){

if (isset($_GET["action"])) {
	
	$controllerConnect = $_GET["action"];



		}else {
			$controllerConnect = "index";
		}

		$answer = connectModelPage::connectPageModel($controllerConnect);

		include $answer; 
	}

}