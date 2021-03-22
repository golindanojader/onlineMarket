<?php 
require_once "connection.php";


class bankModel{

	#SAVE BANK
	#--------------------------------------------------------------

	public static function saveBankModel($dataModel, $table){

		$stmt = connection::connect()->prepare("INSERT INTO $table(bank,document, possessor,countnum,typecount) VALUES( :bank, :document, :possessor,:countnum,:typecount)");

		$stmt ->bindParam(":bank",$dataModel["bank"],PDO::PARAM_STR);
		$stmt ->bindParam(":document",$dataModel["document"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":possessor",$dataModel["possessor"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":countnum",$dataModel["countnum"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":typecount",$dataModel["typecount"],PDO::PARAM_STR);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();



		 }

	# SAVE PAY MOVIL
	#----------------------------------------		 		 
 public static function savePayMovilModel($dataModel, $table){

 	$stmt = connection::connect()->prepare("INSERT INTO $table(numbank,documentid,phone) VALUES(:numbank,:documentid,:phone)");

 		$stmt ->bindParam(":numbank",$dataModel["numbank"],PDO::PARAM_INT);
 	 	$stmt ->bindParam(":documentid",$dataModel["documentid"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":phone",$dataModel["phone"],PDO::PARAM_STR);

 	 	 	if ($stmt -> execute()) {

 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();

 		}	

 		#VIEW BANKS
 		#------------------------------------------
 		#
 	
 		 public static function viewBankModel($table){

 			 $stmt = connection::connect()->prepare("SELECT id,bank, document, possessor, countnum, typecount FROM $table");


		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


 		 }


 		 #VIEW PAY MOVIL
 		 #---------------------------------------------
 		 
 		 	 public static function viewPayMovilModel($table){


 			 $stmt = connection::connect()->prepare("SELECT id,numbank, documentid, phone FROM $table");


		 	$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


 		 }

 		 #DELETE BANK
 		 #--------------------------------------------------------

 		  public static function deleteBankModel($dataModel, $table){


 		  	$stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

 		 	$stmt -> bindParam(":id",$dataModel, PDO::PARAM_INT);

 		 	if ($stmt->execute()) {

 		 			return "ok";
 		 		
 		 	}
 		 	else{

 		 		return "error";
 		 	}



 		  }

 		  #DELETE PAY MOVIL
 		  #-------------------------------------------------------------

 		   public static function deletePayMovilModel($dataModel, $table){

 		   	 $stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

 		 	$stmt -> bindParam(":id",$dataModel, PDO::PARAM_INT);

 		 	if ($stmt->execute()) {

 		 			return "ok";
 		 		
 		 	}
 		 	else{

 		 		return "error";
 		 	}



 		   }



}