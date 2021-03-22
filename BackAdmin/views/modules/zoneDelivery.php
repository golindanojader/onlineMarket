<?php 


if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>
	<hr>
	<!-- Lash -->
	<ul class="nav nav-pills col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<li class="nav-item">
			<a class="nav-link active"  href="#">Sectores de envíos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="#">Personal de entregas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link "  href="#">Información al cliente</a>
		</li>

	</ul>
	<!-- End Lash -->
	<hr>


 <div class="row container-fluid">

<div class="col-lg-4 col-md-4 col-sm-4  col-xs-4">


	<form method="post" enctype="" name="EstateMun">
<h6>Zonas de envíos</h6>

<select  class="custom-select custom-select-sm" id="estate" name="estate" onchange="cambia_provincia()">
	<option  value="0" selected>Seleccione estado</option>
	<option  id = "1"  value="Amazonas" >Amazonas</option>
	<option id = "2"   value="Anzoátegui" >Anzoátegui</option>
	<option id = "3"   value="Apure" >Apure</option>
	<option id = "4"   value="Aragua">Aragua</option>
	<option id = "5"   value="Barinas" >Barinas</option>
	<option id = "6"   value="Bolívar" >Bolívar</option>
	<option id = "7"   value="Carabobo" >Carabobo</option>
	<option id = "8"   value="Cojedes" >Cojedes</option>
	<option id = "9"   value="Delta Amacuro" >Delta Amacuro</option>
	<option id = "10" value="Distrito Capital">Distrito Capital</option>
	<option id = "11" value="Falcón">Falcón</option>
	<option id = "12" value="Guárico">Guárico</option>
	<option id = "13" value="Lara">Lara</option>
	<option id = "14" value="La Guaira">La Guaira</option>
	<option id = "15" value="Mérida">Mérida</option>
	<option id = "16" value="Miranda">Miranda</option>
	<option id = "17" value="Monagas">Monagas</option>
	<option id = "18" value="Nueva Esparta">Nueva Esparta</option>
	<option id = "19" value="Portuguesa">Portuguesa</option>
	<option id = "20" value="Sucre">Sucre</option>
	<option id = "21" value="Táchira">Táchira</option>
	<option id = "22" value="Trujillo">Trujillo</option>
	<option id = "23" value="Yaracuy">Yaracuy</option>
	<option id = "24" value="Zulia">Zulia</option>
</select>


<hr>

<select  class="custom-select custom-select-sm" name="municipality">
	<option name="mun"value="mun"></option>
</select>

<br>
<br>

		<?php 
 		$saveStateMunicipality = new zoneDeliveryController();
 		$saveStateMunicipality->saveStateMunicipalityController();
 		 ?>

 			<button type="submit" class="form-control btn-primary">Guardar</button>
 		</form>

</div><!-- 38 -->

<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">



<table class="table  table-bordered" id="municipios" style="font-size: 12px">

<label for="municipios" val></label>

	<?php 
		// $viewMunicipality = new zoneDeliveryController();
 	//  	$viewMunicipality ->viewZoneDeliveryMunicipalityController();

 	 	$deleteMunicipalityDelivery = new zoneDeliveryController();
 	 	$deleteMunicipalityDelivery->deleteZoneDeliveryMunicipalityController();
	 ?> 
</table>


	
</div>




</div>
 




 
 	


 	