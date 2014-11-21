<?php

	$error = '
		<div class="alert alert-warning alert-dismissible mensaje" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	    	<strong>Warning!</strong> Ups, este módulo no existe aún.
		</div>
	';
	$titulo = '
		<h1>Aquí puedes ver todos los módulos de ayuda existentes</h1>
	';


?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<script type="text/javascript" src="../js/jquery/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../styles/bootstrap/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../styles/style.admin.css" />
		<link href="../styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<title>Sistema de ayuda</title>
		<style>
			html, body{
				background: #f7f7f7;
			}
		</style>
	</head>
	<body>
		<section class="container">
			<article class="post-pages margin-post conte">
				<div class="page-header">
  					<h1>Centro de ayuda</h1>
				</div>
				<article class="contenido">
					<?php 
						if(isset($_GET['code']) && !isset($_GET['module'])){
							$code = $_GET['code'];

							switch($code){
								case 2554568910:
							    	include_once './help/proveedor.html';
								break;
							  	case 0424201008:
							    	include_once '';
							    break;
							  	/*case "green":
							    	echo "Your favorite color is green!";
							    break;*/
							  	default:
							    	include_once'./help/include.php';
							}							
						}
						elseif(isset($_GET['code']) && isset($_GET['module'])){
							$code = $_GET['code'];
							$module = $_GET['module'];
							switch($code){
								case 2554568910:
									if($module == 'add'){
										include_once './help/add-pro.html';	
									}
									else{
										include_once './help/include.php';
									}
								break;
							  	case 2404201008:
							    	if($module == 'plus'){
										include_once './help/plus-pro.html';	
									}
									else{
										include_once './help/include.php';
									}
							    break;
							    case 7258307149:
							    	if($module == 'edit'){
										include_once './help/edit-pro.html';	
									}
									else{
										include_once './help/include.php';
									}
							    break;
							  	case 8542136520:
							    	if($module == 'delete'){
										include_once './help/delete-pro.html';	
									}
									else{
										include_once './help/include.php';
									}
							    break;
							  	default:
							    	include_once'./help/include.php';
							}	
						}
						else{
							include_once'./help/proveedor.html';
						}			
					?>
				</article>
			</article>
		</section>
	</body>
</html>