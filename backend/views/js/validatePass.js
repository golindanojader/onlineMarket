
// ESTA FUNCION SE EJECUTA EN updateCount PARA VALIDAR DINAMICAMENTE LA CONTRASEÑA 
	$("#passAjax").change(function() {


		var passAjax = $("#passAjax").val();

		var data =new  FormData();

		data.append('validatePass', passAjax);

		$.ajax({

			url: "views/modules/ajax/validatePassAJax.php",
			method:"POST",
			data: data,
			cache:false,
			contentType:false,
			processData:false,
			success: function(answer){

			var passAjax = answer;
		
			console.log(passAjax);

			 $("label[for='passAjax']").html(passAjax);

	

						}

			})


		});



