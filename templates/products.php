<?php
	session_start();//Inicia sesión
	if(isset($_SESSION['usuario'])){}
	else{
		header('Location: ../');
	}

	include_once('../includes/load.data.php');
	$consulta = consulProducts($sqli);
	$valor_total = valorTotal($sqli);

	if($sqli->connect_errno){//Si la conexión con la bd falla
	    $consulta='
			<tr>
				<td colspan="7">Ha ocurrido un error al intentar conectar con la base de datos, por favor intente mas tarde</td>
			</tr>
		';
	    exit();
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
        				<li><a href="./">Home</a></li>
        				<?php
        					if($hidden == true){
        						echo '<li><a data-toggle="modal" href="#data-admin">Administrador</a></li>';
        					}
        				?>
        				<li><a data-toggle="modal" href="#change-pass">Cambiar contraseña</a></li>
        				<?php
        					if($hidden == true){
        						echo '<li><a href="./users.php">Usuarios</a></li>';
        					}
        				?>
        				<li><a href="./pr.php">Proveedores</a></li>
        				<li><a href="../includes/logout.php">Salir</a></li>
      				</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<!--end nav menu bar-->
		<!--Container-->
		<section class="container">
			<!--contenedor principal-->
			<article class="post-pages margin-post">
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<h3 class="panel-title title-post">Gestionar Productos</h3>
	  				</div>
	  				<div class="panel-body">
	  					<!--Cuerpo donde se muestran los usuarios-->
	  					<div class="center">
	  						<button type="button" data-toggle="modal" href="#Ups" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar producto</button>
	  						
	  					</div>
	  					<div class="filtre">
	  						<form action="../includes/load.data.php" method="POST">
	  							<div class="date input-group">
  									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> Fecha final</span>
  									<input type="date" name="ffin" class="form-control" required>
  									<span class="input-group-btn">
        								<input class="btn btn-primary" value="Ir" type="submit"/>
      								</span>
								</div>
								<div class="date input-group">
  									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> Fecha inicio</span>
  									<input type="date" name="fini" class="form-control" required>
								</div>
								
	  						</form>
	  						<div class="date-search input-group salto">
  									<span class="input-group-btn">
        								<button onclick="busca(document.getElementById('busqueda').value);" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
      								</span>
  									<input type="text" id="busqueda" name="search" class="form-control" placeholder="Buscar producto">
								</div>
								<button onclick="busca('');" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
	  					</div>
	  					<!--Responsive table-->
	  					<div class="table-responsive">
		  					<table class="table table-bordered table-hover table-condensed">
								<thead>
								    <tr>
								        <th>Codigo</th>
								        <th>Nombre</th>
								        <th>Referencia</th>
								        <th>Cantidad</th>
								        <th>Unidad</th>
								        <th>Precio</th>
								        <th>Caducidad</th>
								        <th>Ingreso</th>
								        <th>Proveedor</th>
								        <th>Repartidor</th>
								        <th>Usuario</th>
								    </tr>
								</thead>
								<tbody class="content-table">
								    <!--content of table-->
								    <?php echo $consulta ?>
								</tbody>
							</table>
						</div>
						<ol class="breadcrumb">
  							<li class="active">Valor total ingresado</li>
  							<li class="valor active"><?php echo $valor_total ?></li>
						</ol>
						<!--Responsive-->
					</div>
				</div>
			</article>
			<!--contenedor principal-->
		</section>
		<!--end container-->
		<?php
			if($hidden == true){
				$admin = consulAdmin($sqli);
				include_once '../includes/admin.modal.php';
			}
			include_once '../includes/about.php';
			include_once '../includes/products.modal.php';
			include_once '../includes/change.modal.php';
		?>
		<footer id="footer">
        	<div class="container">
            	<p class="text-muted credit">Cafetería &copy; 2014 | <a href="./help.php?code=2056320123" target="_blank">Ayuda</a> | <a data-toggle="modal" href="#example">Acerca de</a></p>
        	</div>
    	</footer>
    	<!--end footer-->
    	<script type="text/javascript" src="../js/jquery/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="../js/jquery.ajax.js"></script>
    	<script type="text/javascript" src="../styles/bootstrap/js/bootstrap.js"></script>
	</body>
</html>