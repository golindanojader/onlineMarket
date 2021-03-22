function loginValidate(){

	var expression = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;


	if (!expression.test($("#userLogin").val())) {
		return false;
	}
	return true;
		

}
