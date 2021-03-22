	$("#passwordRegister").change(function(){


		var  passwordRegister = $("#passwordRegister").val();

		console.log(passwordRegister);


		$("#repeatPasswordRegister").change(function(){


		var  repeatPasswordRegister = $("#repeatPasswordRegister").val();

	
		if (repeatPasswordRegister!=passwordRegister) {

			$("#messagePass").toggle(1);
			$("label[for='messagePass']").html('<p class="form-control btn btn-sm btn-danger" style=" width: 270px auto;  font-size: 15px; ">Las contraseñas no coinciden</p>');

					return false;

		}

			else if (passwordRegister != repeatPasswordRegister) {

			$("#messagePass").toggle(1);
			$("label[for='messagePass']").html('<p class="form-control btn btn-sm btn-danger" style=" width: 270px auto;  font-size: 15px; ">Las contraseñas no coinciden</p>');

			return false;
		}


});

});
	