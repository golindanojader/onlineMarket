function userRecover(){

	var expression = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;


	if (!expression.test($("#userRecover").val())) {
		return false;
	}
	return true;
		

}

	$("#inputUserRecover").click(function(){


		var userRecover = $("#userRecover").val();
		var datos = new FormData();
		
		datos.append("validateExistEmail",userRecover);

		$.ajax({
		url:"views/modules/ajax/userRecoverAjax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(answer){


			var user = answer;
			
			if (user==0) {


				$("#userRecoverInfo").toggle(100);
				
				$("label[for='userRecoverInfo']").html('<label for="userRecoverInfo"  style="font-family:  Pavanam-Regular; color:red ;font-size:15px; text-align:center" >Disculpe, este usuario no se encuentra registrado.</label>');

				return false;
				
					}else{
					var userEmail =  $("#userRecover").val();

				//SI EL USUARIO UXISTE SE ENVIA LA CLAVE AL CORREO
				//------------------------------------------------------------- 
				$("#inputUserRecover").toggle(100);
				$("#userRecoverInfo").toggle(100);
				$("label[for='userRecoverInfoValidate']").html('<label for="userRecoverInfoValidate"  style="font-family:  Pavanam-Regular; color:green ;font-size:15px; " >Su clave ha sido enviada a su correo</label>');



							$("#userRecoverInfoValidate").toggle(100);

							var datos = new FormData();
							datos.append("sendPass",userEmail);
							$.ajax({
							url:"views/modules/ajax/userRecoverAjax.php",
							method:"POST",
							data: datos,
							cache: false,
							contentType: false,
							processData: false,
							success:function(answer){


									}
									});

						

					}


			}


		});



});



$("#closeModal").click(function(){

	window.location.reload();
});

