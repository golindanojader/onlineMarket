<?php 
class connection{
	 public static function connect(){

	 	$link = new PDO("mysql:host=localhost;dbname=mercadoonline","root","");
	 	return $link;
	 }
}