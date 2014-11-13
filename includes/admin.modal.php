<!--modal proveedor-->
<div id="data-admin" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Datos del administrador</h3>
			</div>
			<div class="admin-data modal-body">
				<form action="../includes/change.password.php" method="POST">
					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input value="<?php echo $admin['nombre']; ?>" name="nombre" type="text" autocomplete="off" maxlength="50" class="form-control" placeholder="Nombres" required />
					</div>

					<div class="input-group salto ps">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input value="<?php echo $admin['apellido']; ?>" name="apellido" type="text" autocomplete="off" maxlength="50" class="form-control" placeholder="Apellidos" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-tasks"></span></span>
						<input value="<?php echo $admin['documento']; ?>" name="documento" type="text" autocomplete="off" maxlength="11" class="form-control" placeholder="Documento" required />
						<input value="<?php echo $admin['documento']; ?>" type="hidden" name="documentoHidden">
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-sound-7-1"></span></span>
						<input value="<?php echo $admin['edad']; ?>" name="edad" type="number" autocomplete="off" min="18" max="100" class="form-control" placeholder="Edad" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
						<input value="<?php echo $admin['celular']; ?>" name="celular" type="tel" autocomplete="off" maxlength="11" class="form-control" placeholder="Celular" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input value="<?php echo $admin['user']; ?>" name="user" type="text" autocomplete="off" maxlength="10" class="form-control" placeholder="Nombre de usuario" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
						<input autofocus name="password" type="password" autocomplete="off" maxlength="10" class="form-control" placeholder="Ingresa tu contraseña para guardar los cambios" required />
					</div>

					<input type="submit" name="update" value="Guardar cambios" class="btn btn-success"/>
				</form>
				<!--para mostrar mensajes de error-->
				<div class="mensaje"></div>
				<span class="contt loader-wrapper loader hide"></span>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
			</div>
		</div>
	</div>
</div>