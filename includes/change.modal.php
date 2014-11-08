<!--modal proveedor-->
<div id="change-pass" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Cambiar contraseña</h3>
			</div>
			<div class="edit-pr modal-body">
				<form action="../includes/pr.edit.php" method="POST">
					<div class="input-group salto">
  						<span class="input-group-addon">Contraseña acual</span>
						<input name="nit_up" id="nit_up" type="text" autocomplete="off" maxlength="12" class="form-control" placeholder="Nit de la empresa" required />
						<input name="nit_up_oc" id="nit_up_oc" type="hidden" value="" />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Nueva contraseña</span>
						<input name="empresa_up" id="empresa_up" type="text" autocomplete="off" maxlength="60" class="form-control salto" placeholder="Nombre de la empresa" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon">Repita la contraseña&nbsp;</span>
						<input name="telefono_up" id="telefono_up" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					</div>

					<input type="submit" name="passwordch" value="Cambiar" class="btn btn-success"/>
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