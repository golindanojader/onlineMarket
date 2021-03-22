	
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="icon" href="views/img/icono.png">
 <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/bootstrap-reboot.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/bootstrap-grid.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/fonts.css">
 <link rel="stylesheet" type="text/css" href="views/css/style.css">
 <link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">
 <link rel="stylesheet" type="text/css" href="views/css/font-awesome.min.css">

 <script type="text/javascript" src="views/js/sweetalert.min.js"></script>
 <script type="text/javascript" src="views/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="views/js/bootstrap.min.js"></script>
<script type="text/javascript" src="views/js/bootstrap.bundle.min.js"></script>

<script src="views/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="views/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
	
	<script type="text/javascript" src="views/js/jquery.passwordstrength.js"></script>
	<script type="text/javascript" src="views/js/password.js"></script>







<title>Mercado Online</title>
</head>
<body>

		<?php 
		include "views/modules/navegation.php";
		 ?>


		<?php 

		$mvc = new  mvcController();
		$mvc ->controllerConnectPage();

		 ?>

</body>



<?php 
include "views/modules/footer.php";
 ?>
 	 <script type="text/javascript" src="views/js/userRecover.js"></script>	
 	<script type="text/javascript" src="views/js/validateAccess.js"></script>	
 	<script type="text/javascript" src="views/js/validatePass.js"></script>	
	<script type="text/javascript" src="views/js/productName.js"></script>	
	<script type="text/javascript" src="views/js/loginValidate.js"></script>
	<script type="text/javascript" src="views/js/registerValidate.js"></script>
	


</html>