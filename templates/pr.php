<?php
	session_start();//Inicia sesión
	if(isset($_SESSION['usuario'])){}
	else{
		echo "<script>location.href = '../';</script>";
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<script type="text/javascript" src="../js/jquery/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery.ajax.js"></script>
		<script type="text/javascript" src="../styles/bootstrap/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../styles/style.admin.css" />
		<link href="../styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<title>Admin Cafetería</title>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
  			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
      				<a class="navbar-brand"><?php echo $_SESSION['usuario']; ?></a>
    			</div>

    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        				<li><a href="./">Home</a></li>
        				<li><a href="./products.php">Gestionar Productos</a></li>
        				<li><a href="./users.php">Gestionar Usuarios</a></li>
        				<li><a href="#">Cambiar contraseña</a></li>
        				<li><a href="../includes/logout.php">Salir</a></li>
      				</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<!--end nav menu bar-->
		<!--Preloader and error-->
		<span class="msg-error hidde"></span>
		<span class="contt loader-wrapper loader hide"></span>
		<!--Container-->
		<section class="container">
			<!--contenedor principal-->
			<article class="post-pages margin-post">
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<h3 class="panel-title title-post">Gestionar Proveedores</h3>
	  				</div>
	  				<div class="panel-body">
	  					<!--contenido del cuerpo de la web-->
	  					<div class="center">
	  						<button type="button" data-toggle="modal" href="#Ups" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar proveedor</button>
	  					</div>
					</div>
				</div>
			</article>
			<!--contenedor principal-->
		</section>
		<!--end container-->

		<?php include_once'../includes/about.php'; ?>
		<footer id="footer">
        	<div class="container">
            	<p class="text-muted credit">Cafetería &copy; 2014 | <a href="#">Ayuda</a> | <a data-toggle="modal" href="#example">Acerca de</a></p>
        	</div>
    	</footer>
    	<!--end footer-->
    	<!--script for delete user-->
    	<script type="text/javascript">
			$(document).on("click", ".delete-user", function(){
				var documento=$(this).data('id');
				$(".modal-footer #dc").val(documento);
				$(".documento-delete").html(documento);
			});
		</script>
	</body>
</html>