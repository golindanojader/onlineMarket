
function sendValidate(){
var expression =  /^[0-9]+$/;

 	var value = $("#sendPurchase").val();

// VALIDA SI EL CAMPO VIENE VACIO
// ---------------------------------------------
 if (value =="") {

 		swal({

								title: "¡Campo vacío!",
								text: "¡Disculpe, no ha ingresado el número de referencia!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

								},

								function(isConfirm){

									if (isConfirm) {

										window.location = "paymentForm";
									}

												});
 		
 		return false;

 		// VALIDA SI EL CAMPO TRAE LETRAS O CARACTERES ESPECIALES
 		// ----------------------------------------------------------

 		}else if((!expression.test($("#sendPurchase").val()))){

 		swal({

								title: "¡Error!",
								text: "¡Disculpe, no se admiten letras ni caracteres especiales!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

								},

								function(isConfirm){

									if (isConfirm) {

										window.location = "paymentForm";
									}

												});



 			return false;




 		}


 			// VALIDA SI EL CAMPO TIENE MAS DE 30 CARACATERES NUMERICOS
 			// ------------------------------------------

 			else if(value.length > 20){
			
 					swal({

								title: "¡Error!",
								text: "¡Disculpe, ha sobrepasado el número de caracteres!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

								},

								function(isConfirm){

									if (isConfirm) {

										window.location = "paymentForm";
									}

												});



 			return false;
		

 			}




 		else{
 		
 	
 			return true;
 		}

}