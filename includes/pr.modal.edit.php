<!--modal proveedor-->
<div id="pr-edit" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Actualizar datos del proveedor</h3>
			</div>
			<div class="modal-body">
				<form action="../includes/pr.edit.php" method="POST">
					<div class="input-group salto">
  						<span class="input-group-addon">Nit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<input name="nit_up" id="nit_up" type="text" autocomplete="off" maxlength="12" class="form-control" placeholder="Nit de la empresa" required />
						<input name="nit_up_oc" id="nit_up_oc" type="hidden" />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Empresa&nbsp;</span>
						<input name="empresa_up" id="empresa_up" type="text" autocomplete="off" maxlength="60" class="form-control salto" placeholder="Nombre de la empresa" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Telefono&nbsp;</span>
						<input name="telefono_up" id="telefono_up" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Dirección</span>
						<input name="direccion_up" id="direccion_up" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Dirección" required />
					</div>

					<label>Datos del representante</label>
					
					<div class="input-group salto">
  						<span class="input-group-addon">Nombres</span>
						<input name="repn_up" id="repa_up" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Nombres" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Apellidos</span>
						<input name="repa_up" id="repap_up" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Apellidos" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Telefono</span>
						<input name="reptel_up" id="reptel_up" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">E-mail&nbsp;&nbsp;&nbsp;&nbsp;</span>
  						<input name="repmail_up" id="repmail_up" type="email" maxlength="50" autocomplete="off" class="form-control" placeholder="E-mail" required>
					</div>

					<input type="submit" name="actualizar" value="Actualizar" class="btn btn-success"/>
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