<?php 


if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}
 
include "views/modules/navegation.php";
 ?>

 <section>
 	
 <hr>
<!-- Lash -->
	<ul class="nav nav-pills col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<li class="nav-item">
			<a class="nav-link active"  href="index.php?action=banks">Bancos</a>
		</li>
		
		
		
	</ul>
	<!-- End Lash -->
	

 

<br>
<form method="post"  enctype="multipart/form-data">
<!-- Bank Name -->
<div class="row container-fluid">
<div class="col-lg-3 col-md-3 col-sm-3  col-xs-3"style="background: #F0EEEC" >
	<br>
<label  class="label-info" for=""><h5>Depósitos o transferencias</h5></label>
<!-- possessor of the bill -->
<div class="form-group">
<label  class="label-info" for="">Titular</label>
<input type="text" class="form-control form-control-sm"  name="titularBanco">
</div>

<!-- possessor of the bill -->
<div class="form-group">
<label  class="label-info" for="">Doc. Identidad</label>
<input type="text" class="form-control form-control-sm" name="DocBanco">
</div>


<div class="form-group" >
<label  class="label-info" for="">Banco</label>
<select class="custom-select " name="selectBanco">
	<option value="Banco de Venezuela">Banco de Venezuela</option>	
	<option value="Banesco">Banesco</option>	
	<option value="Bicentenario Banco Universal">Bicentenario Banco Universal</option>	
	<option value="Banco Occidental de Descuento BOD">Banco Occidental de Descuento BOD</option>	
	<option value="Banco Caroní">Banco Caroní</option>	
	<option value="Banco Exterior">Banco Exterior</option>	
	<option value="FondoComun">FondoComun</option>	
	<option value="Banco Mercantil">Banco Mercantil</option>	
	<option value="BBVA Provincial">BBVA Provincial</option>	
	<option value="Banco del Tesoro">Banco del Tesoro</option>	
	<option value="Bancaribe">Bancaribe</option>	
	<option value="Venezolano de Crédito">Venezolano de Crédito </option>
	<option value="Banco Nacional de Crédito BNC">Banco Nacional de Crédito BNC</option>	
	<option value="Banplus">Banplus</option>	
	<option value="Banfanb">Banfanb</option>	
	<option value="100% Banco">100% Banco </option>	
	<option value="Del Sur">Del Sur</option>	
	<option value="Banco Activo">Banco Activo</option>	
	<option value="Banco Sofitasa">Banco Sofitasa</option>	
	<option value="Banco Agrícola de Venezuela">Banco Agrícola de Venezuela</option>	
	<option value="Citibank">Citibank</option>		



</select>
</div>

<!-- possessor of the bill -->
<div class="form-group">
<label  class="label-info " for="">Cta Num.</label>
<input type="text" class="form-control form-control-sm" name="cuentaBanco">
</div>


<!-- Count type -->
<div class="form-group ">
<label  class="label-info" for="">Tipo de cuenta</label>
<select class="custom-select " name="tCuentaBanco">
<option value="Ahorro">Ahorro</option>
<option value="Corriente">Corriente</option>
</select>
</div>

<hr>





<button type="submit" class="form-control btn-primary ">Enviar</button>

<?php 
$saveBank = new  bankController();
$saveBank -> saveBankController();

 ?> 


</div>

</form>






<!-- TABLE OF BANKS -->

<div class="col-lg-6 col-md-6 col-sm-6  col-xs-6">

	<table class="table table-striped table-responsive">	


<?php 

$viewBank = new bankController();
$viewBank -> viewBankController();

$deleteBank = new bankController();
$deleteBank ->deleteBankController();
 ?>
		
		
	</table>






</div>






</div>





	</section>








	


