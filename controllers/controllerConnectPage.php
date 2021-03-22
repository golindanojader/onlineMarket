<?php 

// Call the tamplate
class mvcController{

	 public static function template(){

	 	include "views/template.php";

	 }



	  public static function controllerConnectPage(){

	  	if (isset($_GET["action"])) {

	  	$controllerConnect = $_GET["action"];
	  		
	  	}else{

	  	$controllerConnect = "index";

	  	}

	  		// To inherit
	  		$answer = pageConnect::modelConnectPage($controllerConnect);

	  		// include answer
	  		include $answer;

	  }
} 