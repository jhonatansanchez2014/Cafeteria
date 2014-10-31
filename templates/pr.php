<?php
	session_start();//Inicia sesión
	if(isset($_SESSION['usuario'])){}
	else{
		header('Location: ../');
	}
	include_once('../includes/load.data.php');
	$pro=consulProveedor($sqli);

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
		<script type="text/javascript" src="../js/jquery/jquery-2.1.1.min.js"></script>
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
	  						<button type="button" data-toggle="modal" href="#pr" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar proveedor</button>
	  					</div>
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
								        <th></th>
								        <th></th>
								    </tr>
								</thead>
								<tbody class="content-table">
									<?php echo $pro ?>
								</tbody>
							</table>
							<ol class="breadcrumb">
  								<li class="active">Valor total ingresado</li>
  								<li class="valor active"><!--<?php //echo $valor_total ?>--></li>
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
			include_once'../includes/pr.modal.php';
			include_once'../includes/pr.modal.plus.php';
			include_once'../includes/pr.modal.delete.php';
		?>
		<footer id="footer">
        	<div class="container">
            	<p class="text-muted credit">Cafetería &copy; 2014 | <a href="#">Ayuda</a> | <a data-toggle="modal" href="#example">Acerca de</a></p>
        	</div>
    	</footer>
    	<!--end footer-->
    	<!--script for delete user-->
    	<script type="text/javascript">
    		//Para tomar valor que del nit de un enlace
			$(document).on("click", ".nit-em", function(){
				var dl = $(this).data('id');
				$(".delete-nit #nit_pr").val(dl);
				$(".nit-delete").html(dl);
			});
    		//Para tomar valor que del nit de un enlace
			$(document).on("click", ".nit-em", function(){
				var nit=$(this).data('id');
				//$(".modal-footer #dc").val(documento);
				//$(".pr-rem-data").html(nit);
				$.ajax({
					beforeSend: function(){
						//preloader
					},
					url: '../includes/load.data.php',
					type: 'post',
					dataType: "json",
					data: "nit="+nit,
					success: function(response){
						$('.pr-rep').html(response.tableCon);
						$('.pr-pro').html(response.producto);
						$('.title-pr').html(response.nombre);
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
			//Para tooltip, titulos hover
			$(function(){
				$("[data-toggle='tooltip']").tooltip();
			});
			//Ajax para isertar
			$(document).on('ready', function(){
				//Para insertar nuevos productos
				var pet=$('.modal-body form').attr('action');
				var met=$('.modal-body form').attr('method');

				$('.modal-body form').on('submit', function(e){
					e.preventDefault();
					$.ajax({
						beforeSend: function(){
							//preloader
						},
						url: pet,
						type: met,
						dataType: "json",
						data: $('.modal-body form').serialize(),
						success: function(response){
							if(response.estado == true){
								$('.content-table').append(response.table);
							}
							else{
								$('.content-table').html(response.table);
							}
							$('.msg-error').html(response.mensaje).show();
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