
<div class="backRegister">

	<form  class="formRegister" method="post" onsubmit="return registerValidate()">
		
		<img src="" alt="">

		<h1 class="titleRegisterForm">Registro</h1>
 	
	
		<input  class="form-control formRegister "  type="email" placeholder="Ingresa tu correo" name="userRegister" id="userRegister" required>


		<label for="userRegister" id="viewMessaje" style="display: none"></label>

		
		<input class="form-control formRegister " type="password" placeholder="Ingresa tu contraseña"  name="passwordRegister" id="passwordRegister" maxlength="15"  required>

		<input class="form-control formRegister " type="password" placeholder="Repite tu contraseña"  name="repeatPasswordRegister" id="repeatPasswordRegister" maxlength="15" required>
		<label for="messagePass" id="messagePass" style="display: none"></label>

  		<?php 

		$enter = new enterRegister();
		$enter ->controllerEnterRegister();

		 ?> 

		
	  <input class="form-control formRegister btn btn-primary" type="submit" value="Enviar">
		
		<div class="form-group">
			<div	 class="form-check">
			<label	class="form-check-label">
			<input	class="form-check-input" type="checkbox" required><a href="#termC" data-toggle="modal"> Acepto términos y condiciones</a>
			</label>
			</div>
			</div>



	</form>



				<div class="modal fade" id="termC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
				<div class="modal-dialog" role="document"  modal-lg>
				<div class="modal-content" style="font-size:14px">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body"  style="text-align: left; margin: 0%;">

					<?php 
					$viewTermsCondController = new enterRegister();
					$viewTermsCondController-> viewTermsCondController();




					 ?>
				</div>
				<div  class="col-lg-12 col-md-12 col-sm12 col-xs-12">
				<button type="button" class=" form-control btn-primary "  data-dismiss="modal"  aria-label="Close">Entendido</button>
				<br>
				</div>
				</div>
				</div>
				</div>

	
</div>
</div>


