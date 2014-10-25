<?php
	session_start();//Inicia sesión
	if(isset($_SESSION['usuario'])){}
	else{
		echo "<script>location.href = '../';</script>";
	}

	include_once('../includes/load.data.php');
	$consulta=consulProducts($sqli);
	$valor_total=valorTotal($sqli);

	if($sqli->connect_errno){//Si la conexión con la bd falla
	    //echo "Fallo al conectar a MySQL: (".$sqli->connect_errno.") ".$sqli->connect_error;
	    $consulta='
			<tr id="sinDatos">
				<td>Ha ocurrido un error al intentar conectar con la base de datos, por favor intente mas tarde</td>
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
        				<li><a href="./users.php">Gestionar usuarios</a></li>
        				<li><a href="./pr.php">Gestionar Proveedores</a></li>
        				<li><a href="#">Cambiar contraseña</a></li>
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
		  					<table class="table table-bordered table-striped table-hover table-condensed">
								<thead>
								    <tr>
								        <th>Codigo</th>
								        <th>Nombre</th>
								        <th>Referencia</th>
								        <th>Cantidad</th>
								        <th>Unidad</th>
								        <th>Precio</th>
								        <th>F caducidad</th>
								        <th>F ingreso</th>
								        <th>Proveedor</th>
								        <th>Repartidor</th>
								    </tr>
								</thead>
								<tbody class="content-table">
								    <!--content of table-->
								    <?php echo $consulta ?>
								</tbody>
							</table>
							<ol class="breadcrumb">
  								<li class="active">Valor total ingresado</li>
  								<li class="valor active"><?php echo $valor_total ?></li>
							</ol>
						</div>
						<!--Responsive-->
					</div>
				</div>
			</article>
			<!--contenedor principal-->
		</section>
		<!--end container-->
		<?php
			include_once'../includes/about.php';
			include_once'../includes/products.modal.php';
		?>
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
			$(document).on('ready', function(){
				//search date
				var pet=$('.filtre form').attr('action');
				var met=$('.filtre form').attr('method');

				$('.filtre form').on('submit', function(e){
					e.preventDefault();
					$.ajax({
						url: pet,
						type: met,
						dataType: "json",
						data: $('.filtre form').serialize(),
						success: function(res){
							//alert(response.contenido);
							$('.content-table').html(res.cont);
						},
						error: function(jqXHR, estado, error){
							console.log(estado);
							console.log(error);
						},
						complete: function(jqXHR, estado){
							console.log(estado);
						},
						timeout: 10000
					});
				});
			});
		</script>
	</body>
</html>