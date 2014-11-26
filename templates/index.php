<?php
	session_start();//Inicia sesión
	include_once('../includes/load.data.php');
	include_once'../includes/n.count.php';

	if(isset($_SESSION['usuario']) && isset($_SESSION['rol'])){}
	else{
		header('Location: ../');
	}	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<link href="../styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../styles/style.admin.css" />
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
        				<li class="active"><a href="#home">Home</a></li>
        				<?php
        					if($hidden == true){
        						echo '<li><a data-toggle="modal" href="#data-admin">Administrador</a></li>';
        					}
        				?>
        				<li><a data-toggle="modal" href="#change-pass">Cambiar contraseña</a></li>
        				<li><a href="../includes/logout.php">Salir</a></li>
      				</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<!--end nav menu bar-->
		<section class="container">
			<article class="post">
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<a class="title-post" href="./products.php"><h3 class="panel-title">Gestionar Productos</h3></a>
	  				</div>
	  				<div class="panel-body">
	    				Gestionar productos. Puedes ingresar productos, ver el historial de todos los productos ingresados, realizar búsquedas de estos, ya sea por fecha o algún nombre en específico, no podrás hacer modificaciones es estos una vez sea ingresado, y ningún producto podrá ser eliminado.
	    				<ul class="nav nav-pills nav-stacked">
  							<li class="active">
    							<a href="./products.php">
      								<span class="badge pull-right"><?php echo $nprod; ?></span>Productos registrados
    							</a>
  							</li>
						</ul>
	  				</div>
				</div>
			</article>
			<!--end post-->
			<?php
				if($hidden == true){
					echo '<article class="post margin-post">
							<div class="panel panel-default">
	  							<div class="panel-heading">
	    				<a class="title-post" href="./users.php"><h3 class="panel-title">Gestionar Usuarios</h3></a>
	  				</div>
	  				<div class="panel-body">
	    				Puedes ingresar, actualizar y eliminar usuarios, 
	    				ten en cuenta que si eliminas un usuario, este se borrara de forma permanente de la base de datos.
	    				El usuario administrador no se mostrara en esta parte de la aplicación, se podrá visualizar los datos en la opción de administrador, localizada en el menú superior.
	    				<ul class="nav nav-pills nav-stacked">
  							<li class="active">
    							<a href="./users.php">
      								<span class="badge pull-right">'; echo $nuser; echo'</span>Usuarios registrados
    							</a>
  							</li>
						</ul>
	  				</div>
				</div>
			</article>
			<!--end post-->
			';
			}
			?>
			
			
			<article class="post margin-post">
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<a class="title-post" href="./pr.php"><h3 class="panel-title">Gestionar Proveedores</h3></a>
	  				</div>
	  				<div class="panel-body">
	    				Puedes ingresar, actualizar y eliminar proveedores, 
	    				ten en cuenta que si eliminas un proveedor, este se borrara de forma permanente de la base de datos.
	    				A demás en esta opción podrás visualizar los últimos 10 productos que se han ingresado de cada proveedor, y los datos del representante.
	    				<ul class="nav nav-pills nav-stacked">
  							<li class="active">
    							<a href="./pr.php">
      								<span class="badge pull-right"><?php echo $nprov; ?></span>Proveedores registrados
    							</a>
  							</li>
						</ul>
	  				</div>
				</div>
			</article>
			<!--end post-->
		</section>
		<!--end container-->
		<?php
			include_once '../includes/change.modal.php';
			if($hidden == true){
				$admin = consulAdmin($sqli);
				include_once '../includes/admin.modal.php';
			}
			include_once '../includes/about.php';
		?>
		<!--end modal dialog-->
		<footer id="footer">
        	<div class="container">
            	<p class="text-muted credit">Cafetería &copy; 2014 | <a target="_blank" href="./help.php?code=8542136021">Ayuda</a> | <a data-toggle="modal" href="#example">Acerca de</a></p>
        	</div>
    	</footer>
    	<script type="text/javascript" src="../js/jquery/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="../js/jquery.ajax.js"></script>
    	<script type="text/javascript" src="../styles/bootstrap/js/bootstrap.js"></script>
	</body>
</html>