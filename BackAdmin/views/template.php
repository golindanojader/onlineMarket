<!DOCTYPE html>
<html>
<head>

	<!-- refresca la pagina cada 60 segundos -->
	<!-- <meta http-equiv="refresh" content="600" />  -->
	<meta charset="utf-8">
	<title>Administración</title>
	<link rel="icon" href="views/img/icono.png">
	<link rel="stylesheet" type="text/css" href="views/css/style.css">
	<link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="views/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="views/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="views/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="views/css/font-awesome.min.css">	

	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="views/DataTables/datatables.min.css">


	<script type="text/javascript" src="views/js/jquery-3.0.0.min.js"></script>
	<script src="views/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="views/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" src="views/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="views/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="views/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="views/js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="views/js/jquery.passwordstrength.js"></script>
	<script type="text/javascript" src="views/js/password.js"></script>
	</head>
	<body>



	<?php 

			$page = new page();
			$page ->pageConnectController();

	 ?>

<!-- DATATABLE -->
	<script type="text/javascript" src="views/DataTables/datatables.js"></script>
	<script type="text/javascript" src="views/js/validateUpdateUser.js"></script>
		<script type="text/javascript" src="views/js/changeUserNewPass.js"></script>
	<script type="text/javascript" src="views/js/updateCountScript.js"></script>
	<script type="text/javascript" src="views/js/loadOrderAjax.js"></script>
	<script type="text/javascript" src="views/js/estate.js"></script>
	<script type="text/javascript" src="views/js/viewMunicipalities.js"></script>
	<script type="text/javascript" src="views/js/script.js"></script>
	<script type="text/javascript" src="views/js/statusCheck.js"></script>

</body>
</html>