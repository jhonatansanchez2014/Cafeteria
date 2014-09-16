<?php
	session_start();
	if (isset($_SESSION['usuario'])){
		echo '<script>location.href = "./templates/";</script>';
	}
	else
	{}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="styles/style.css">
		<link type="text/css" href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<script type="text/javascript" src="./js/jquery/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="./styles/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="./js/jquery.ajax.js"></script>
		<title>Cafetería Control de Acceso</title>
	</head>
	<body>
		<header>
			<h1>Cafetería Control de Acceso</h1>
			<!--name of the page-->
		</header>
		<!--end header-->
		<section class="body-page">
			<form action="includes/login.php" method="POST" name="facc">
				<div class="form-group">
					<input type="text" class="form-control"name="user" autocomplete="off" placeholder="Nombre de usuario">
					<input type="password" class="form-control" name="password" autocomplete="off" placeholder="Contraseña">
				</div>
				<input type="submit" name="ingresar" value="Iniciar sesión" class="btn btn-default">
				<span class="loader-wrapper loader hide"></span>
				<span class="msg-error hidde"></span>
			</form>
			<!--end form de acceso-->
		</section>
		<!--end section-->
		<?php include_once'./includes/about.php'; ?>
		<footer id="footer">
        	<div class="container">
            	<p class="text-muted credit">Cafetería &copy; 2014 | <a href="#">Ayuda</a> | <a data-toggle="modal" href="#example">Acerca de</a></p>
        	</div>
    	</footer>
		<!--end footer-->
	</body>
</html>