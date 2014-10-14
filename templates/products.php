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
	    				<h3 class="panel-title title-post">Gestionar Productos</h3>
	  				</div>
	  				<div class="panel-body add-date">
	  					<!--Cuerpo donde se muestran los usuarios-->
	  					<div class="center">
	  					<button type="button" data-toggle="modal" href="#Ups" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Products</button></div>
	  					<!--Responsive table-->
	  					<div class="responsive">
		  					<table class="table table-bordered table-hover">
								<thead>
								    <tr>
								        <th>#</th>
								        <th>Nombre</th>
								        <th>Apellido</th>
								        <th>Email</th>
								        <th>Email</th>
								    </tr>
								</thead>
								<tbody>
								    <tr>
								        <td>1</td>
								        <td>Rocky</td>
								        <td>Balboa</td>
								        <td>rockybalboa@mail.com</td>
								        <td>rockybalboa@mail.com</td>
								    </tr>
								    <tr>
								        <td>2</td>
								        <td>Peter</td>
								        <td>Parker</td>
								        <td>peterparker@mail.com</td>
								        <td>peterparker@mail.com</td>
								    </tr>
								    <tr>
								        <td>3</td>
								        <td>John</td>
								        <td>Rambo</td>
								        <td>peterparker@mail.com</td>
								        <td>johnrambo@mail.com</td>
								    </tr>
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




		<!--modal productos-->
		<div id="Ups" class="modal fade">
			<div class="modal-dialog">   
				<div class="modal-content"> 
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>Add New Products</h3>
					</div>
					<div class="modal-body">
						
						<form action="../includes/insert.products.php" method="POST">
							<input name="codigo" type="text" onkeypress="validatenum();" autocomplete="off" maxlength="50" class="form-control salto" placeholder="Codigo del producto" required />

							<input name="producto" type="text" autocomplete="off" maxlength="50" class="form-control salto" placeholder="Producto" required />
							
							<input name="categoria" type="text" onkeypress="validatetext();" autocomplete="off" maxlength="50" class="form-control salto" placeholder="Referencia del producto" required />
							
							<!--<select style=" display: inline-block; width: 150px;" name="tipoP" class="form-control">
								<option value="Mecato">Mecato</option>
								<option value="Gaseosa">Gaseosa</option>
								<option value="Gaseosa">Gaseosa</option>
							</select>-->

							<input style=" display: inline-block; width: 102px;" name="cantidad" type="number" min="1" max="255" onkeypress="validatenum();" autocomplete="off" maxlength="10" class="form-control" placeholder="Cantidad" required />

							<select  style="display: inline-block; width: 152px;" name="medida" class="form-control salto">
								<option value="Unidad">Unidad</option>
								<option value="Kg">Kilogramos</option>
								<option value="Lb">Libras</option>
							</select>
							
							<input style=" display: inline-block; width: 150px;" name="precio" type="number" min="1" max="255" onkeypress="validatenum();" autocomplete="off" maxlength="11" class="form-control" placeholder="Precio" required />

							<label>Fecha de caducidad</label>
							<input name="fVence" type="date" autocomplete="off" class="form-control salto" placeholder="Fecha de vencimiento" required />

							<select name="proveedor" class="form-control salto">
								<option value="Yupi">Yupi</option>
								<option value="Colanta">Suspendido</option>
							</select>

							<input name="reparte" type="text" onkeypress="validatetext();" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Repartidor" required />

							<!--<input type="submit" name="save" value="Save" class="btn btn-default addbtn"/>
							<input type="reset" name="save" value="New" class="btn btn-default addbtn"/>-->
							<input type="submit" name="save" value="Save product" class="btn btn-success"/>
							<input type="reset" name="new" value="New" class="btn btn-warning"/>
						</form>
						<!--Preloader and error-->
						<span class="msg-error hidde"></span>
						<span class="contt loader-wrapper loader hide"></span>
					</div>
	     			<div class="modal-footer">
	     				<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
	    			</div>
				</div>
			</div>
		</div>
		<!--modal delete-->	
	</body>
</html>