<div class="backLogin">

<form  method="post" class="formLogin" id="formLogin" onsubmit="return loginValidate()">


	<img src="" alt="">
	<img src="views/img/avatar.jpg"style="margin-left: 0px; width: 120px;  border-radius: 100px;" >
		
	<input class="form-control formLogin" type="email" placeholder="Usuario" name="userLogin" id="userLogin" required>
	<input class="form-control formLogin" type="password" placeholder="Contraseña" name="userPassword" id="userPassword" maxlength="15" required>




				<?php 
					$enterLogin = new enterLogin();
					$enterLogin ->controllerEnterLogin();
					
				 ?>

		 <input class="form-control formLogin btn btn-success btn-sm"  id="inputForm" type="submit" value="Ingresar">

		 <a href="index.php?action=register" title="">
		 <input class="form-control formLogin btn btn-primary btn-sm"  type="button" value="Regístrate"></a>

		<a href="#ModalPass" data-toggle="modal">
		 <p>Olvidé la contraseña</p></a>

	






	</form>


<form  method="post" class="formLogin" onsubmit="return loginValidate()">



<div id="userValidate" style = "display:none">

<br>
<br>
<br>

<input class="form-control formLogin" type="password" placeholder="Clave de validación" name="validatePassword" maxlength="8">
<input class="form-control formLogin btn btn-warning btn-sm"  type="submit" value="Validar">
<input  class="form-control btn-sm btn-primary" type="text" id="labelInfo" name="labelInfo" style="display: none" >


<label for="labelInfo" ></label>





</div>
<?php 
	$accesFirtsTime = new enterLogin();
	$accesFirtsTime-> firstAccessController();
	?>
</form>
</div>


				
				<div class="modal fade" id="ModalPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:14px">
				<div class="modal-header">
				<button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">
				
				<form  method="post"  onsubmit="return userRecover()" enctype="multipart/form-data">
				
				<input class="form-control " type="email" placeholder="Ingresa tu cuenta de correo electrónico" name="userRecover" id="userRecover" required>
				
				<br>



				 <label for="userRecoverInfo" id="userRecoverInfo" style="display: none"></label>
				 <label for="userRecoverInfoValidate" id="userRecoverInfoValidate" style="display: none"></label>
				<input type="button" class=" form-control btn-primary" id="inputUserRecover"  value="Enviar">

		
			</form>
				<br>
				</div>
				</div>
				</div>
				</div>




