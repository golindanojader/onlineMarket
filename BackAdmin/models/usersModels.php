<?php 
require_once "connection.php";

class userModel{

#VER EL PERFIL DE USUARIO
#----------------------------------------------------------------
 public static function viewUserPerfilModel($dataModel, $table){

$stmt = connection::connect()->prepare("SELECT user, name, lastname, rol FROM $table WHERE id = :id AND user = :user");

 	 	$stmt ->bindParam(":id",$dataModel["id"],PDO::PARAM_INT);
		$stmt ->bindParam(":user",$dataModel["user"],PDO::PARAM_STR);

		 $stmt -> execute();

		 return $stmt->fetch();

		 $stmt->close();


 		}

 #VER LISTADO DE USUARIOS
 #-----------------------------------------
  public static function  viewUsersModel($table){

  	$stmt = connection::connect()->prepare("SELECT id, user, rol, name, lastname FROM $table ORDER BY rol DESC");
 	$stmt -> execute();

	return $stmt->fetchAll();

		 $stmt->close();


  		}

  #VALIDAR LA CLAVE DEL USUARIO PARA PROCEDER CON LA ACTUALIZARCIÓN DE LA CUENTA
  #----------------------------------------------------------------------------------------------------------
   public static function  validateUserPassController($dataModelAnswerUserActualPass, $table){

   		$stmt = connection::connect()->prepare("SELECT user FROM $table WHERE id = :id AND password = :password");

 	 	$stmt ->bindParam(":id",$dataModelAnswerUserActualPass["id"],PDO::PARAM_INT);
		$stmt ->bindParam(":password",$dataModelAnswerUserActualPass["password"],PDO::PARAM_STR);

		 $stmt -> execute();

		 return $stmt->fetch();

		 $stmt->close();


   		}

   		#ACTUALIZAR DATOS DEL USUARIO 
   		#---------------------------------------------------------------------------------------
   		 public static function updateCountUserModel($dataModelUpdateValues, $table){

   		 	  	$stmt = connection::connect()->prepare("UPDATE $table SET user=:user, password=:password, name=:name, lastname=:lastname, rol=:rol WHERE id = :id");

   		 	  	$stmt -> bindParam(":user", $dataModelUpdateValues["user"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":password", $dataModelUpdateValues["password"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":name", $dataModelUpdateValues["name"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":lastname", $dataModelUpdateValues["lastname"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":rol", $dataModelUpdateValues["rol"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":id", $dataModelUpdateValues["id"], PDO::PARAM_INT);
 			 

 			 	if ($stmt -> execute()) {

 			 			return 1;
 			 			
 			 		}else
 			 		{
 			 			return 0;

 			 		}
 			 			$stmt->close();


   		 }

   		#CREAR USUARIO
		#-----------------------------------------------
   		  public static function createUserModel($dataModel, $table){

   		 $stmt = connection::connect()->prepare("INSERT INTO $table(user,password,name,lastname,rol) VALUES( :user,:password,:name,:lastname,:rol)");

 	 	$stmt ->bindParam(":user",$dataModel["user"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":password",$dataModel["password"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":name",$dataModel["name"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":lastname",$dataModel["lastname"],PDO::PARAM_STR);
 	 	$stmt ->bindParam(":rol",$dataModel["rol"],PDO::PARAM_INT);
 	
 	 	if ($stmt -> execute()) {
 	 		
 	 		return 1;

 	 				} 
 	 				else {

 	 					return 0;
 	 				}

 	 					$stmt->close();
   		  }


#ACTUALIZAR DATOS DE USUARIOS
#-----------------------------------------------------
 public static function updateCountRegisterUser($dataModel, $table){


 			   	$stmt = connection::connect()->prepare("UPDATE $table SET user=:user, password=:password, name=:name, lastname=:lastname, rol=:rol WHERE id = :id");

   		 	  	$stmt -> bindParam(":user", $dataModel["user"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":password", $dataModel["password"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":name", $dataModel["name"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":lastname", $dataModel["lastname"], PDO::PARAM_STR);
 			 	$stmt -> bindParam(":rol", $dataModel["rol"], PDO::PARAM_INT);
 			 	$stmt -> bindParam(":id", $dataModel["id"], PDO::PARAM_INT);
 			 

 			 	if ($stmt -> execute()) {

 			 			return 1;
 			 			
 			 		}else
 			 		{
 			 			return 0;

 			 		}
 			 			$stmt->close();



 		}

 		 public static function deleteUserCountModel($dataModel, $table){

 		 	$stmt = connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
 		 	$stmt -> bindParam(":id",$dataModel, PDO::PARAM_INT);

 		 	if ($stmt->execute()) {

 		 			return 1;
 		 		
 		 	}
 		 	else{

 		 		return 2;
 		 	}




 		 }

}
