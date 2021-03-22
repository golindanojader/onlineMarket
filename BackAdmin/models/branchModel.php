<?php 

require_once "connection.php";


class branchModel{

#SAVE THE BRANCH ADDRESS
#---------------------------------------------------------------------
 public static function saveBranchModel($brachAddress, $table){

 	 	$stmt = connection::connect()->prepare("INSERT INTO $table(branch) VALUES( :branch)");

 	 	$stmt ->bindParam(":branch",$brachAddress,PDO::PARAM_STR);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();
 		


 				}	

#VIEW THE BRACH ADDRESS
#-------------------------------------------------------------------------
 public static function viewBranchModel($table){

$stmt = connection::connect()->prepare("SELECT branch FROM $table");


		 $stmt -> execute();

		 return $stmt->fetchAll();

		 $stmt->close();
		 	}

 		
#DELETE BRANCH ADDRESS 
#--------------------------------------------------------------------------

	public static function deleteAddressModel($addressName,$table){


		  $stmt = connection::connect()->prepare("DELETE  FROM $table WHERE  branch = :branch");

		  $stmt ->bindParam(":branch",$addressName,PDO::PARAM_STR);

 	 	if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();
 		

 		}

 	# VER DIRECCIÓN DE SUCURSAL POR PEDIDO
 	#---------------------------------------------------------------------------

 	 public static function viewBranchModelByOrder($branchAddress, $table){

		$stmt = connection::connect()->prepare("SELECT branch FROM $table WHERE id = $branchAddress ");

		 $stmt -> execute();

		 return $stmt->fetch();

		 $stmt->close();


 	 }

}