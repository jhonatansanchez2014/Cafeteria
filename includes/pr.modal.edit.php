<!--modal proveedor-->
<div id="pr-edit" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Actualizar datos del proveedor</h3>
			</div>
			<div class="modal-body">
				<form action="../includes/pr.insert.php" method="POST">
					<div class="input-group salto">
  						<span class="input-group-addon">Nit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<input name="nit" type="text" autocomplete="off" maxlength="12" class="form-control" placeholder="Nit de la empresa" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Empresa&nbsp;</span>
						<input name="empresa" type="text" autocomplete="off" maxlength="60" class="form-control salto" placeholder="Nombre de la empresa" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Telefono&nbsp;</span>
						<input name="telefono" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Dirección</span>
						<input name="direccion" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Dirección" required />
					</div>

					<label>Datos del representante</label>
					
					<div class="input-group salto">
  						<span class="input-group-addon">Nombres</span>
						<input name="repn" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Nombres" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Apellidos</span>
						<input name="repa" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Apellidos" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Telefono</span>
						<input name="reptel" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">E-mail&nbsp;&nbsp;&nbsp;&nbsp;</span>
  						<input name="repmail" type="email" maxlength="50" autocomplete="off" class="form-control" placeholder="E-mail" required>
					</div>

					<input type="submit" name="save" value="Guardar" class="btn btn-success"/>
					<input type="reset" name="new" value="Nuevo" class="btn btn-warning"/>
				</form>
				<!--para mostrar mensajes de error-->
				<div class="mensaje"></div>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
			</div>
		</div>
	</div>
</div>