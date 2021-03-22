
	
	$("#userLogin").change(function(){

		var userLogin = $("#userLogin").val();
		var datos = new FormData();

		var userInfo= userLogin;
		var labelInfo = $("#labelInfo").val(userInfo);

		datos.append('validateAccess', userLogin);

		$.ajax({
			url:"views/modules/ajax/validateAccessAjax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(success){

				var valida = success;


			if (valida =="") {
				

	

			 }else if(valida==0){

			 	$("label[for='labelInfo']").html('<label for="labelInfo"  style="font-family:  Pavanam-Regular; font-size:15px" >Ingrese la clave de validación para usuario: '+userLogin+'</label>');
			 		
		$("#formLogin").toggle(100);
		$("#userLogin").toggle(100);
		$("#inputForm").toggle(100);
		$("#userValidate").toggle(100);
		$("#userPassword").toggle(100);


					}


			}


		});


});



