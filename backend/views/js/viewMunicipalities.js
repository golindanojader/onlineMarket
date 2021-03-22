
/*=====================================================
=            Validar Municipios(Zonas de envíos)        =
=====================================================*/


$("#estate").change(function(){


	// Jquery Sintax
	var estate = $("#estate").val();

	// Ajax object variable
	var datos = new FormData();
	datos.append("validarMunicipio", estate); /*"validarUsuario"--->POST variable= $_POST["validarUsuario"]*/

	// It is better the sentences Jquery to use ajax
	// NOTA: EN ESTA PARTE SE ENVIA AL CONTROLADOR EL ID DEL MUNICIPIO PARA QUE RETORNE EL NOMBRE
$.ajax({ 
	url:"views/modules/ajax/MunAjax.php",
	// url:"views/modules/ajaxBorrar.php",
	method:"POST",
	data: datos,
	cache: false,
	contentType: false,
	processData: false,
		success: function(respuesta){
		

								var idData = respuesta;
								var data = new FormData;
								data.append('respuestaMun', idData);
								// EN ESTA PARTE SE ENVIA EL NOMBRE PARA QUE RETORNO COMO PRODUCTO FINAL EN LA VISTA
								$.ajax({ 
								url:"views/modules/ajax/MunAjax.php",
								// url:"views/modules/ajaxBorrar.php",
								method:"POST",
								data: data,
								cache: false,
								contentType: false,
								processData: false,
									    success: function(respuestaMun){		

									    					
													$("label[for='municipios']").html(respuestaMun);

										}	
							
								});


						}


				});


		});


$("#estateSave").change(function(){


	// Jquery Sintax
	var estate = $("#estateSave").val();

	// Ajax object variable
	var datos = new FormData();
	datos.append("validarMunicipio", estate); /*"validarUsuario"--->POST variable= $_POST["validarUsuario"]*/

	// It is better the sentences Jquery to use ajax
	// NOTA: EN ESTA PARTE SE ENVIA AL CONTROLADOR EL ID DEL MUNICIPIO PARA QUE RETORNE EL NOMBRE
$.ajax({ 
	url:"views/modules/ajax/MunAjaxSaveAddress.php",
	method:"POST",
	data: datos,
	cache: false,
	contentType: false,
	processData: false,
		success: function(respuesta){
		

								var idData = respuesta;
								var data = new FormData;
								data.append('respuestaMun', idData);
								// EN ESTA PARTE SE ENVIA EL NOMBRE PARA QUE RETORNO COMO PRODUCTO FINAL EN LA VISTA
								$.ajax({ 
								url:"views/modules/ajax/MunAjaxSaveAddress.php",
								// url:"views/modules/ajaxBorrar.php",
								method:"POST",
								data: data,
								cache: false,
								contentType: false,
								processData: false,
									    success: function(respuestaMun){		
									    	
									    					
													$("label[for='municipiosSave']").html(respuestaMun);

										}	
							
								});


						}


				});


		});


