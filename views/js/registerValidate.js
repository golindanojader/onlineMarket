/*=====================================================
=            Validate exist user whit AJAX            =
=====================================================*/
var usuarioExistente = false;

$("#userRegister").change(function(){

	// Jquery Sintax
	var usuario = $("#userRegister").val();

	// Ajax object variable
	var datos = new FormData();
	datos.append("validarUsuario", usuario); /*"validarUsuario"--->POST variable= $_POST["validarUsuario"]*/

	// It is better the sentences Jquery to use ajax
$.ajax({ 
	url:"views/modules/ajax.php",
	method:"POST",
	data: datos,
	cache: false,
	contentType: false,
	processData: false,
		success: function(respuesta){


			if (respuesta == 0) {  
				

				$("#viewMessaje").toggle(100);

			       $("label[for='userRegister']").html('<p class="form-control btn btn-sm btn-danger" style=" width: 270px auto;  font-size: 12px; ">Disculpe, el usuario '+usuario+'  ya existe.</p>');

			       usuarioExistente = true;
			
			}else{
				
					$("#viewMessaje").toggle(100);
			

					usuarioExistente = false;
					return false;
			}


		}
	});


});



/*=====  End of Validate Exist user whit AJAX  ======*/


/*=============================================
=            Validate Email            =
=============================================*/

function registerValidate(value){

var expression = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

	if (!expression.test($("#userRegister").val())) {

		
		return false;

	}else if(usuarioExistente){

		 return false;

	}
	else{

		return true;
	}

	
}
/*=====  End of Validate Email  ======*/
