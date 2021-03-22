<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mercado Online</title>
	
<link rel="stylesheet" type="text/css" href="views/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="views/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="views/css/jquery.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/bootstrap-reboot.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/bootstrap-grid.min.css">
 <link rel="stylesheet" type="text/css" href="views/css/fonts.css">
 <link rel="stylesheet" type="text/css" href="views/css/style.css">
 <link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">
 <link rel="stylesheet" type="text/css" href="views/css/font-awesome.min.css">
 <link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">


<script type="text/javascript" src="views/js/jquery-3.0.0.min.js"></script>
<script src="views/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="views/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" src="views/js/bootstrap.min.js"></script>
<script type="text/javascript" src="views/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="views/js/sweetalert.min.js"></script>
<script type="text/javascript" src="views/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="views/js/jquery.passwordstrength.js"></script>
<script type="text/javascript" src="views/js/password.js"></script>
<script type="text/javascript" src="views/js/passwordRepeat.js"></script>



</head>
<body>

	<header>
		
	<?php 



		include "views/modules/navigation.php";

 	?>
	</header>


	<section>

		<?php 

		$pageController = new connectControllerPage();
		$pageController->connectPage();
		
		 ?>
		
	</section>

	<script src="views/js/loadData.js" type="text/javascript"></script>
	<script src="views/js/validateCantProduct.js" type="text/javascript"></script>
	<script src="views/js/purchases.js" type="text/javascript"></script>


	<script type="text/javascript" src="views/js/updateCountDateAjax.js"></script>
	<script type="text/javascript" src="views/js/validatePass.js"></script>
	<script type="text/javascript" src="views/js/viewMunicipalities.js"></script>
	<script type="text/javascript" src="views/js/productName.js"></script>
	<script type="text/javascript" src="views/js/script.js"></script>
	<script type="text/javascript" src="views/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="views/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="views/js/responsive.bootstrap.min.js"></script>
	<script type="text/javascript" src="views/js/jquery.dataTables.min.js"></script>




</body>


</html>