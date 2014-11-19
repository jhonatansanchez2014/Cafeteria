<!--modal proveedor-->
<div id="user-edit" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Actualizar datos del proveedor</h3>
			</div>
			<div class="edit-user modal-body">
				<form action="../includes/user.edit.php" method="POST">
					<div class="input-group salto">
  						<span class="input-group-addon">Nombres&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<input name="nombres" id="nombres" type="text" autocomplete="off" maxlength="12" class="form-control" placeholder="Nombres" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Apellidos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
						<input name="apellidos" id="apellidos" type="text" autocomplete="off" maxlength="60" class="form-control salto" placeholder="Apellidos" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Documento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<input name="documentoHidden" id="documentoH" type="hidden" value="" />
						<input name="documento" id="doc" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Documento" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<input name="edad" id="edad" type="number" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Edad" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Estado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<div id="estado">
							
						</div>
					</div>
					
					<div class="input-group salto">
  						<span class="input-group-addon">Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<input name="celular" id="celular" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Celular" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Nombre de usuario</span>
						<input name="userHidden" id="userH" type="hidden" value="" />
						<input name="user" id="u" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="User" required />
					</div>

					<input type="submit" name="actualizar" value="Guardar cambios" class="btn btn-success"/>
				</form>
				<!--para mostrar mensajes de error-->
				<div class="mensaje"></div>
				<span class="contt loader-wrapper loader hide">Carcando datos.</span>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
			</div>
		</div>
	</div>
</div>