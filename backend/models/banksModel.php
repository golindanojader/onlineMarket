<?php 

require_once "connection.php";


class bankModel{



	 	#VIEW BANKS
 		#------------------------------------------
 		#
 	
 		 public static function viewBankModel($table){

 			 $stmt = connection::connect()->prepare("SELECT id,bank, document, possessor, countnum, typecount FROM $table");


		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


 		 }

 		 # VIEW PAY MOVIL
 		 # ---------------------------------------------

 		 public static function viewPayMovilModel($table){


 			 $stmt = connection::connect()->prepare("SELECT id,numbank, documentid, phone FROM $table");


		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


 		 }


}