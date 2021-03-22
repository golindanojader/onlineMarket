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
<a class="nav-link active"  href="index.php?action=products">Tasa $</a>
</li>


</ul>
<!-- End Lash -->
<hr>

<div class="row container-fluid">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">




		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<label class="label-info" style="font-size: 25px">Tasa del día  <?php 
		$viewConvertion = new  convertionController();
		$viewConvertion ->viewConvertionController();
		?> Bs</label>
		</div>

		<form  method="post"  onsubmit="return convertionValidate()">

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

<input type="text" class="form-control" placeholder="Nuevo valor Bs" name="updateConvertion" id="updateConvertion" required maxlength="25" >
</div>

<br>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

<button type="submit"class="form-control btn-primary ">Actualizar</button>
			
<?php 
$updateConvertion = new convertionController();
$updateConvertion ->updateConvertionController();

 ?>



			</div>
		</form>

</div>

</div>