<?php 


class clientController{

	#CLIENT LIST
	#----------------------------------------------
	 public static function viewClientController(){

	 	$answer =  clientModel::viewClientModel("clientes");

	 	foreach ($answer as $row => $item) {
			   $row = $row + 1;
			   echo '		
 		<tr>
 		<td>'.$row.'</td>
		<td>'.$item["user"].'</td>
 	

 		<td>
		<a href="#address'.$row.'"  data-toggle="modal">
		<button  class="form-control btn-info fa fa-eye btn-sm"  type="button">
		</button></a>



		<div class="modal fade" id="address'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
		<div class="modal-dialog" role="document"  modal-lg>
		<div class="modal-content" style="font-size:14px">
		<div class="modal-header  ">


		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span> </button>
		</div>
		<div class="modal-body"  style="text-align: left; margin: 0%;">
		

		<table class="table">
	<thead>
		<tr>
			<th>Documento</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Teléfono</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>'.$item["identification"].'</td>
			<td>'.$item["name"].'</td>
			<td>'.$item["lastname"].'</td>
			<td>'.$item["phone"].'</td>
		</tr>
	</tbody>
</table>



<table class="table">
	<thead>
		<tr>
			<th>Dirección</th>
			<th>Sector</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>'.$item["address"].'</td>
			<td>'.$item["municipality"].'.  '.$item["estate"].'</td>
		</tr>
	</tbody>
</table>

	

		</td>


 					<td>
 					<a href="#enable'.$row.'"  data-toggle="modal">
 					<button  class="form-control btn-dark fa fa-user btn-sm"  type="button">
 					</button></a>


 				<div class="modal fade" id="enable'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:12px">
				<div class="modal-header  ">


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">

				<h4>¿Inhabilitar Cliente?</h4>
				<p style="font-size:12px">Estimado usuario si inhabilita este cliente, el mismo no podrá ingresar al sistema de compras.</p>

					<p style="font-size:12px">Identificación:  '.$item["identification"].'</p> 
					<p style="font-size:12px">Cliente:  '.$item["name"].'  '.$item["lastname"].'</p> 
				

				<div class="row container-fluid">
					
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<form method="post" enctype="multipart/form-data">

				<input type="text" class="form-control form-control-sm"  name="clientId" value="'.$item["iduser"].'" style="display:none" >

			

				<input type="submit"  class="form-control btn-primary " name="" value="Sí, inhabilitar este cliente" placeholder="">


				</form>

				</div>
				</div>

 					</td>
 					
 				</tr>';
	 		

	 				}


			 }

			  public static function updateStatusClientController(){

			  

			  	if (isset($_POST["clientId"])) {
			  		
					$dataController = array("id"=>$_POST["clientId"], "status"=>1);	

					$answer = clientModel::updateStatusClientModel($dataController, "usuarios");

							if ($answer == 1) {

	 					echo '<script >swal({

								title: "Cliente Bloqueado",
								text: "El cliente ha sido bloqueado temporalmente",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {

										window.location = "clients";
									}


															 	});

															 	</script>';


										}


		

										else {
											echo "No se ha podido actualizar el estadosss";

	 	
								}

					  	}elseif (isset($_POST["clientIdDisable"])) {
					  			$dataController = array("id"=>$_POST["clientIdDisable"], "status"=>0);	

					$answer = clientModel::updateStatusClientModel($dataController, "usuarios");

							if ($answer == 1) {

	 					echo '<script >swal({

								title: "Cliente desbloqueado",
								text: "El cliente ha sido desbloqueado correctamente",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								},

								function(isConfirm){

									if (isConfirm) {

										window.location = "clients";
									}


															 	});

															 	</script>';


										}

										else {
											echo "No se ha podido actualizar el estadosss";

	 	
								}
					  	}


			  }


	#CLIENT ENABLE LIST
	#----------------------------------------------
	 public static function viewClientEnableController(){

	 	$answer =  clientModel::viewClientEnableModel("clientes");

	 	foreach ($answer as $row => $item) {
			   $row = $row + 1;
			   echo '		
 		<tr>
 		<td>'.$row.'</td>
		<td>'.$item["user"].'</td>
 	

 		<td>
		<a href="#address'.$row.'"  data-toggle="modal">
		<button  class="form-control btn-info fa fa-eye btn-sm"  type="button">
		</button></a>



		<div class="modal fade" id="address'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
		<div class="modal-dialog" role="document"  modal-lg>
		<div class="modal-content" style="font-size:14px">
		<div class="modal-header  ">


		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span> </button>
		</div>
		<div class="modal-body"  style="text-align: left; margin: 0%;">
		

		<table class="table">
	<thead>
		<tr>
			<th>Documento</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Teléfono</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>'.$item["identification"].'</td>
			<td>'.$item["name"].'</td>
			<td>'.$item["lastname"].'</td>
			<td>'.$item["phone"].'</td>
		</tr>
	</tbody>
</table>



<table class="table">
	<thead>
		<tr>
			<th>Dirección</th>
			<th>Sector</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>'.$item["address"].'</td>
			<td>'.$item["municipality"].'.  '.$item["estate"].'</td>
		</tr>
	</tbody>
</table>

	

		</td>


 					<td>
 					<a href="#enable'.$row.'"  data-toggle="modal">
 					<button  class="form-control btn-dark fa fa-user btn-sm"  type="button">
 					</button></a>


 				<div class="modal fade" id="enable'.$row.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:12px">
				<div class="modal-header  ">


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">

				<h4>¿Desbloquear Cliente?</h4>
				<p style="font-size:12px">Estimado usuario si habilita este cliente, el mismo  podrá ingresar nuevamente al sistema de compras.</p>

					<p style="font-size:12px">Identificación:  '.$item["identification"].'</p> 
					<p style="font-size:12px">Cliente:  '.$item["name"].'  '.$item["lastname"].'</p> 
				

				<div class="row container-fluid">
					
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<form method="post" enctype="multipart/form-data">

				<input type="text" class="form-control form-control-sm"  name="clientIdDisable" value="'.$item["iduser"].'" style="display:none" >

			

				<input type="submit"  class="form-control btn-primary "  value="Sí, habilitar este cliente" placeholder="">


				</form>

				</div>
				</div>

 					</td>
 					
 				</tr>';
	 		

	 				}


			 }

	public static function saveTermsCondController(){
	
	if(isset($_POST["BodyterminosC"])){
		
		$dataController = array("id" => 1,
								"header"=>$_POST["headerTerminosC"],
								"information" => $_POST["BodyterminosC"]);
		$table="terminos_condiciones";
		
		$answer = clientModel::saveTermsCondModel($dataController, $table);
		
			if ($answer == 1) {

				echo '<script >swal({

						title: "Términos y condiciones",
						text: "Los Términos y Condiciones se han agregado correctamente",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if (isConfirm) {

								window.location = "clientsInformation";
							}


								});

								</script>';


								}
		
							}

						}
	public static function viewTermsCondController(){
			
			$table = "terminos_condiciones";
			$answer = clientModel::viewTermsCondModel($table);




			
			echo '<h3>'.$answer["header"].'</h3>
			<hr>
			<div class="row container-fluid" style="text-align:justify">
		
			<p style="text-align:justify; ">'.$answer["information"].'</p>	';			
							
				
									
		
							}										
			
					}

