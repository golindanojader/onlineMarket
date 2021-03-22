<?php 


class branchModel{

 public static function viewBranchAddressModel($table){


 	$stmt = connection::connect()->prepare("SELECT id, branch FROM $table");


	$stmt -> execute();

	return $stmt->fetchAll();

	$stmt->close();

		}


}




