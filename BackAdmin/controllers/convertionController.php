<?php 

class convertionController{

#VER TASA DEL DIA
#-----------------------------------------------------

 public static function viewConvertionController(){

 	$answer = convertionModel::viewConvertionModel("tasa");


 	echo number_format($answer["tasa"], 0, ",", ".") ; 


 			}

 	#UPDATE TASA DEL DIA
 	#------------------------------------------------------
 	
 public static function updateConvertionController(){

 			if (isset($_POST["updateConvertion"])) {
 				


 			$dataController =  array("tasa"=>$_POST["updateConvertion"]);

 			$answer = convertionModel::updateConvertionModel($dataController,"tasa");

 			if ($answer == "ok") {
 				
 			echo '<script >swal({

								title: "¡OK!",
								text: "¡La tasa se ha actualizado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "convertion";
									}


															 	});

															 	</script>';


										}


 			}


 		}

}

