	<?php 

class bankController{

	# SAVE BANK
	#-----------------------------------------------
	 public static function saveBankController(){

	 	if (isset($_POST["selectBanco"])&&
	 				 $_POST["titularBanco"]&&
	 				 $_POST["cuentaBanco"]&&
	 				 $_POST["DocBanco"]&&
	 				 $_POST["tCuentaBanco"]) {
	 		
	 		

	 $dataController = array("possessor"=>$_POST["titularBanco"],
	 											"document"=>$_POST["DocBanco"],
												"bank"=>$_POST["selectBanco"],
												"countnum" =>$_POST["cuentaBanco"],
												"typecount"=> $_POST["tCuentaBanco"]);



	$answer = bankModel::saveBankModel($dataController, "bancos");


							if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡El registro bancario se ha almacenado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "banks";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;



	 	
						}

				}

	 }

	 # SAVE PAY MOVIL
	 #-------------------------------------------

	  public static function savePayMovilController(){

	  	if (isset($_POST["pMBanco"])&&
	  				$_POST["pMDocI"]&&
	  				$_POST["pMNumt"]) {

	  				$dataController = array("numbank"=>$_POST["pMBanco"],
	  														  "documentid"=>$_POST["pMDocI"],
	  														  "phone"=>$_POST["pMNumt"]);


	  				$answer=bankModel::savePayMovilModel($dataController, "pagomovil");


	  					if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡El registro bancario se ha almacenado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "banks";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;


						}

	  		
	  			}	

	  }





	  #VIEW BANK
	  #----------------------------------

	   public static function viewBankController(){	

	   	$answer = bankModel::viewBankModel("bancos");


	   	foreach ($answer as $row => $item) {
	   		$row = $row+1;
	   				
	   			echo '<thead style="font-family: ubuntu-light; font-size: 12px">
				<tr>
				<th>'.$item["bank"].'</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				</tr>
				</thead>
				<tbody>
			<tr style="font-family: ubuntu-light; font-size: 14px">
				<td>'.$item["possessor"].'</td>
				<td>'.$item["document"].'</td>
				<td>'.$item["countnum"].'</td>
				<td>'.$item["typecount"].'</td>

				<td>
 	 			<a href="#delete'.$row.'"data-toggle="modal">
 	 			<button type="button" class="form-control btn btn-danger fa fa-trash btn-sm"></button></a>

 	 			<div class="modal fade" id="delete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

				<h4>¿Desea borrar el banco?</h4>
				<br>

				
				<form method="post" enctype="multipart/form-data">

					<h6>'.$item["bank"].'</h6>
					<h6>'.$item["possessor"].'</h6>
					<h6>'.$item["countnum"].'</h6>
					<h6>'.$item["typecount"].'</h6>

				<div class="form-group row">
				<div class="col-sm-4">
				<input type="text" class="form-control" value="'.$item["id"].'"    name="deleteIdBank" readonly style="display:none" > 	
				</div>
				</div>


				<div class="row container-fluid">
				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>



				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>
				</div>

				</td>
			</tr>
		</tbody>';	




	   					}

			   	}

	     # VIEW PAY MOVIL
		 #--------------------------------

		 public static function viewPayMovilController(){

		 $answer= bankModel::viewPayMovilModel("pagomovil");


		 foreach ($answer as $row=> $item) {
		 $row = $row+1;


		 	echo '	


				<tbody style="font-family: ubuntu-light; font-size: 14px">
				<tr>
				<td>'.$item["numbank"].'</td>
				<td>'.$item["documentid"].'</td>
				<td>'.$item["phone"].'</td>
				<td>
 	 			<a href="#deletePm'.$row.'"data-toggle="modal">
 	 			<button type="button" class="form-control btn btn-danger fa fa-trash btn-sm"></button></a>

 	 			<div class="modal fade" id="deletePm'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

				<h4>¿Desea borrar Pago Móvil?</h4>
				<br>

				
				<form method="post" enctype="multipart/form-data">
				<div class="form-group row">
				<div class="col-sm-12">

				<h6>Banco'.$item["numbank"].'	  			</h6>
				<h6>Documento '.$item["documentid"].'</h6>
				<h6>Teléfono  '.$item["phone"].'         		 </h6>
				<input type="text" name="deleteIdPm" value="'.$item["id"].'	" style="display:none">
		
				</div>
				</div>


				<div class="row container-fluid">
				<div class="col-sm-6">
				<button type="submit" class="fa fa-check  form-control btn-success" 	aria-label="close"></button>
				</div>
				</form>



				<div class="col-sm-6">
				<button type="button" class="fa fa-close  form-control btn-danger" class="close" data-dismiss="modal" aria-label="close"></button>
				</div>
				</div>
				</div>



				</td>
			</tr>
		</tbody>';		

				 }

		 }

		 #DELETE BANK
		 #--------------------------------------

		  public static function deleteBankController(){

		  	if (isset($_POST["deleteIdBank"])) {

			$dataController = $_POST["deleteIdBank"];

			$answer = bankModel::deleteBankModel($dataController, "bancos");
		  		
							if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡El registro bancario se ha borrado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "banks";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;


						}



		  		}


		  }

		  #DELETE PAY MOVIL
		  #-----------------------------------
		   public static function deletePayMovilController(){


		   			  	if (isset($_POST["deleteIdPm"])) {

			$dataController = $_POST["deleteIdPm"];

			$answer = bankModel::deletePayMovilModel($dataController, "pagomovil");
		  		
							if ($answer == 'ok') {

	 					echo '<script >swal({

								title: "¡OK!",
								text: "¡El registro bancario se ha borrado correctamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {


										window.location = "banks";
									}


															 	});

															 	</script>';


										}
										else {
											echo $answer;


						}




		   }


}
}

