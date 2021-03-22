<?php 


class branchController{


 public static function saveBranchController(){

 		if (isset($_POST["brachAddress"])) {
 			
		$brachAddress = $_POST["brachAddress"];

		$answer = branchModel::saveBranchModel($brachAddress, "sucursales");



					if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡Dirección almacenada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {

								window.location = "branch	";
							}


								});

								</script>';
				
										}

										else
										{
											echo "error";
										}


 						}

 			}

 	 public static function viewBranchController(){


 	 	$answer = branchModel::viewBranchModel("sucursales");

 	 	foreach ($answer as $row=> $item) {
 	 		$row = $row + 1;

 	 		echo '	<tbody>
					<tr>
					<td>'.utf8_decode($item["branch"]).'</td>
					<td><a href="#delete'.$row.'"  data-toggle="modal">
					<button type="button" class="form-control form-control-sm btn-danger  btn-sm fa fa-trash"></button></a>


				<div class="modal fade" id="delete'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document" style="">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: center; margin: 0%;">

				<h5>¿Desea borrar esta dirección?</h5>
				<br>
				<p>'.$item["branch"].'</p>
				
				
				<form method="post" enctype="multipart/form-data">
				<input type="text" class="form-control" value="'.$item["branch"].'"   name="addressName" readonly style="display:none">

				<div class="form-group row">
	

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

 	  public static function deleteAddressController(){

			if (isset($_POST["addressName"])) {
	
					
			$addressName = $_POST["addressName"];


			$answer = branchModel::deleteAddressModel($addressName, "sucursales");


				if ($answer == "ok") {

				echo '<script >swal({

						title: "¡OK!",
						text: "¡Dirección borrada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {

								window.location = "branch	";
							}


								});

								</script>';
				
										}

										else
										{
											echo "error";
										}



					}


 	  	}


}