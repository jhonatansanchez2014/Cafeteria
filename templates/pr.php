<?php
	session_start();//Inicia sesión
	include_once'../includes/n.count.php';
	if(isset($_SESSION['usuario']) && isset($_SESSION['rol'])){}
	else{
		header('Location: ../');
	}
	if($_SESSION['rol'] == 'Trabajador'){
		$hidden = false;
	}
	else{
		$hidden = true;
	}

	include_once('../includes/load.data.php');
	$pro = consulProveedor($sqli);

	if($sqli->connect_errno){//Si la conexión con la bd falla
	    $pro='
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
        				<li><a href="./products.php">Productos</a></li>
        				<?php
        					if($hidden == true){
        						echo '<li><a href="./users.php">Usuarios</a></li>';
        					}
        				?>
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
				<!--para mostrar mensajes de error-->
				<div class="mensaje"></div>

				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<h3 class="panel-title title-post">Gestionar Proveedores</h3>
	  				</div>
	  				<div class="panel-body">
	  					<!--contenido del cuerpo de la web-->
	  					<?php
        					if($hidden == true){
        						echo '<div class="center">
	  									<button type="button" data-toggle="modal" href="#pr" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar proveedor</button>
	  								</div>
	  							';
        					}
        				?>
	  					
	  					<!--Responsive table-->
	  					<div class="table-responsive">
		  					<table class="table table-bordered table-striped table-hover table-condensed">
								<thead>
								    <tr>
								        <th>Nit</th>
								        <th>Empresa</th>
								        <th>Telefono</th>
								        <th>Dirección</th>
								        <th></th>
								        <?php
        									if($hidden == true){
        										echo '<th></th>
								        			<th></th>
	  											';
        									}
        								?>
								    </tr>
								</thead>
								<tbody class="content-table">
									<?php echo $pro ?>
								</tbody>
							</table>
						</div>
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
			include_once '../includes/pr.modal.php';
			include_once '../includes/pr.modal.plus.php';
			include_once '../includes/pr.modal.delete.php';
			include_once '../includes/pr.modal.edit.php';
			include_once '../includes/change.modal.php';
		?>
		<footer id="footer">
        	<div class="container">
            	<p class="text-muted credit">Cafetería &copy; 2014 | <a href="./help.php?code=2554568910" target="_blank">Ayuda</a> | <a data-toggle="modal" href="#example">Acerca de</a></p>
        	</div>
    	</footer>
    	<!--end footer-->
		<script type="text/javascript" src="../js/jquery/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="../js/jquery.ajax.js"></script>
    	<script type="text/javascript" src="../styles/bootstrap/js/bootstrap.js"></script>
	</body>
</html>