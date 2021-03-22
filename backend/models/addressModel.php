<?php 

require_once "connection.php";

class addressModel{

	// VIEW ADDRESS
	// ---------------------------------------------------------------------
	 public static function viewClientAddressModel($dataModel, $table){

	 	$stmt = connection::connect()->prepare("SELECT iduser, identification, name, lastname, phone, estate, municipality, address FROM $table WHERE iduser = :iduser");

	 		$stmt -> bindParam(":iduser",$dataModel["id"], PDO::PARAM_INT);

 
	 		$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();


	 }

	 // VALIDAR QUE LOS DATOS ESTEN LLENOS PARA PROCEDER CON LA COMPRA
	 // ----------------------------------------------------------------------------
	  public static function validateClientAddressModel($dataModel, $table){

	  		$stmt = connection::connect()->prepare("SELECT iduser, identification, name, lastname, phone, estate, municipality, address FROM $table WHERE iduser =$dataModel");


 
	 		$stmt -> execute();

		 	return $stmt->fetch();

		 	$stmt->close();

	  }

	  #GUADAR DATOS DEL CLIENTE
	  #---------------------------------------------------------
	   public static function saveDataClientModel($dataModel, $table){


	   	 $stmt = connection::connect()->prepare("INSERT INTO $table(identification, iduser, name,lastname,phone,estate, municipality, address) VALUES(:identification, :iduser, :name,:lastname,:phone,:estate,:municipality, :address)");

	  		$stmt ->bindParam(":identification",$dataModel["identification"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":iduser",$dataModel["iduser"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":name",$dataModel["name"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":lastname",$dataModel["lastname"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":phone",$dataModel["phone"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":estate",$dataModel["estate"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":municipality",$dataModel["municipality"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":address",$dataModel["address"],PDO::PARAM_STR);

 if ($stmt -> execute()) {
 	 		
 	 		return "ok";

 	 				} 
 	 				else {

 	 					return "error";
 	 				}

 	 					$stmt->close();


	   }

	    public static function updateDataClientModel($updateDataClientModel, $table){


 	 		$stmt = connection::connect()->prepare("UPDATE $table SET identification = :identification,  name= :name, lastname = :lastname, phone= :phone, estate= :estate, municipality= :municipality, address= :address WHERE  iduser = :iduser");

 	 		$stmt ->bindParam(":identification",$updateDataClientModel["identification"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":iduser",$updateDataClientModel["iduser"],PDO::PARAM_INT);
	  		$stmt ->bindParam(":name",$updateDataClientModel["name"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":lastname",$updateDataClientModel["lastname"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":phone",$updateDataClientModel["phone"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":estate",$updateDataClientModel["estate"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":municipality",$updateDataClientModel["municipality"],PDO::PARAM_STR);
	  		$stmt ->bindParam(":address",$updateDataClientModel["address"],PDO::PARAM_STR);
 	 				

 	 				 		 if ($stmt -> execute()) {


 	 						return 1;
 	 	

 	 				} 
 	 				else {

 	 					return 0;
 	 				}

 	 					$stmt->close();



	    }

	    	 public static function borrarBorrar($dataModel, $table){


			$stmt= connection::connect()->prepare("SELECT id, municipality FROM $table WHERE idestate = :idestate"); 
 	 	 	$stmt -> bindParam(":idestate", $dataModel, PDO::PARAM_INT);
 			
 			$stmt -> execute();

		 	return $stmt->fetchAll();

		 	$stmt->close();


			  }


			  
#VIEW ID FROM STATE
#--------------------------------------------------
 public static function viewIdStateModel($dataModel, $table){

 		 $stmt= connection::connect()->prepare("SELECT id FROM $table WHERE estate = :estate");

 		 $stmt -> bindParam(":estate", $dataModel, PDO::PARAM_STR);

 		 $stmt -> execute();

 		 return $stmt->fetch();

 		 $stmt->close(); 


			 }

			 #VALIDAR LA CONTRASEÑA DEL CLIENTE
			 #-------------------------------------------------
			  public static function  validatePassworModel($dataModel, $table){

			  	$stmt = connection::connect()->prepare("SELECT id FROM $table WHERE id = :id AND user = :user AND password = :password");

			  	$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
			  	$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
			  	$stmt -> bindParam(":password", $dataModel["password"], PDO::PARAM_STR);

			 $stmt -> execute();

 		 return $stmt->fetch();

 		 $stmt->close(); 

			  }

}

