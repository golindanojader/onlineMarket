$(document).ready(function(){

	$("#productName").keypress(function() {

		var productName = $("#productName").val();
		var data =new  FormData();

		data.append('validateProductName', productName);

$.ajax({

url: "views/modules/ajax/ProductNameAjax.php",
method:"POST",
data: data,
cache:false,
contentType:false,
processData:false,
	success: function(answer){


		var productName = answer;
		
			$("label[for='productName']").html(productName);

			console.log(productName);

						}

			})

		});



	});


