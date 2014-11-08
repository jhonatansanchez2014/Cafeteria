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
  						<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span><span class="glyphicon glyphicon-asterisk"></span></span>
						<input name="passold" type="password" autocomplete="off" maxlength="10" class="form-control" placeholder="Contraseña actual" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span><span class="glyphicon glyphicon-asterisk"></span></span>
						<input name="pass" type="password" autocomplete="off" maxlength="10" class="form-control salto" placeholder="Nueva contraseña" required />
					</div>

					<div class="input-group salto">
  						<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span><span class="glyphicon glyphicon-asterisk"></span></span>
						<input name="rpass" type="password" autocomplete="off" maxlength="10" class="form-control salto" placeholder="Repita la contraseña" required />
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