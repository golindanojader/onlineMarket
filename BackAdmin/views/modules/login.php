
<div id="backLogin">




<form  method="post" class="formLogin" onsubmit="return loginValidate()">
<br>	
	<img src="views/img/avatar.png"style="margin-left: 90px; width: 120px; border-radius: 100px;  " alt="">
	<h4 class="titleLoginForm">Administración</h4>
		
	<input class="form-control formLogin form-control-sm" type="email" placeholder="Usuario" name="adminUserLogin" id="adminUserLogin" required maxlength="40">
	<input class="form-control formLogin form-control-sm" type="password" placeholder="Contraseña" name="adminUserPassword" id="adminUserPassword" required maxlength="40">

	<hr>
	<?php 
	$login = new loginController();
	$login -> adminLoginController();


	 ?>




	<input class="form-control formLogin btn btn-success btn-sm" style="margin: 20px"  type="submit" value="Ingresar">
		 

		
	

	</form>

	
</div>

