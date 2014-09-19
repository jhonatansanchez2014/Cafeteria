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
        				<li><a href="#">Gestionar Productos</a></li>
        				<li><a href="#">Gestionar Proveedores</a></li>
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
	    				<h3 class="panel-title title-post">Gestionar Usuarios</h3>
	  				</div>
	  				<div class="panel-body add-date">
	  					<!--Cuerpo donde se muestran los usuarios-->
	  					<section class="adduser">
		  					<article class="post-user margin-post">
								<div class="panel panel-default">
		  							<div class="panel-heading">
		    							<a class="title-post" href=""><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Add User</h3></a>
		  							</div>
		  							<div class="panel-body">
		  								<form action="../includes/insert.php" method="POST">
		  									<input name="nombres" type="text" onkeypress="validatetext();" autocomplete="off" maxlength="50" class="form-control" placeholder="Nombres" required />
		  									<br />
		  									<input name="apellidos" type="text" onkeypress="validatetext();" autocomplete="off" maxlength="50" class="form-control" placeholder="Apellidos" required />
		  									<br />
		  									<input name="documento" type="text" onkeypress="validatenum();" autocomplete="off" maxlength="11" class="form-control" placeholder="Documento" required />
		  									<br />
		  									<input name="edad" type="number" autocomplete="off" class="form-control" placeholder="Edad" min="18" max="100" required />
		  									<br />
		  									<select name="estado" class="form-control">
		  										<option value="Activo">Activo</option>
												<option value="Suspendido">Suspendido</option>
		  									</select>
		  									<br />
		  									<input name="celular" type="tel" onkeypress="validatenum();" maxlength="11" autocomplete="off" class="form-control" placeholder="Número de celular" required />
		  									<br />
		  									<input name="user" type="text" maxlength="10" autocomplete="off" class="form-control" placeholder="Nombre de usuario" required />

		  									<input type="submit" name="save" value="Save" class="btn btn-default addbtn"/>
		  									<input type="reset" name="save" value="New" class="btn btn-default addbtn"/>
		  								</form>
		  							</div>
								</div>
							</article>
						</section>
						<section class="add-new">
							<!--Acá se hace toda la brujeria con el metodo Ajax de JQuery xD Buujajaja, no se ve en el código fuente xD-->
						</section>
						<!--End cuerpo donde se muestran los usuarios-->
					</div>
				</div>
			</article>
			<!--contenedor principal-->
		</section>
		<!--end container-->
		<!--modal delete-->
		<div id="delete-modal" class="modal fade">
			<div class="modal-dialog">   
				<div class="modal-content"> 
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>Eliminar usuario</h3>
					</div>
					<div class="modal-body">
						Vas a eliminar el usuario con número de identificación <span class="documento-delete" ></span>, esto se hará de forma permanente en la based e datos.
					</div>
	     			<div class="modal-footer">
	     				<form action="../includes/delete.user.php" method="POST" name="formDelete">
	     					<input name="documento" id="dc" type="hidden" value="">
	     					<input type="submit" name="save" value="Eliminar" class="btn btn-danger addbtn"/>
	     					<button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
	     				</form>
	    			</div>
				</div>
			</div>
		</div>
		<!--modal delete-->	
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




		<!--modal delete-->
		<div id="Ups" class="modal fade">
			<div class="modal-dialog">   
				<div class="modal-content"> 
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>Error</h3>
					</div>
					<div class="modal-body">
						Ups, esta perte del modulo aún no está funcionando. :p xD
					</div>
	     			<div class="modal-footer">
	     				<button type="button" data-dismiss="modal" class="btn btn-success">Cerrar</button>
	    			</div>
				</div>
			</div>
		</div>
		<!--modal delete-->	
	</body>
</html>