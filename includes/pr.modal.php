<!--modal proveedor-->
<div id="pr" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Agregar nuevo proveedor</h3>
			</div>
			<div class="modal-body">
				
				<form action="../includes/pr.insert.php" method="POST">
					<input name="nit" type="text" autocomplete="off" maxlength="12" class="form-control salto" placeholder="Nit de la empresa" required />
					<input name="empresa" type="text" autocomplete="off" maxlength="60" class="form-control salto" placeholder="Nombre de la empresa" required />
					<input name="telefono" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					<input name="direccion" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Dirección" required />
					
					<label>Datos del representante</label>

					<input name="repn" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Nombres" required />
					<input name="repa" type="text" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Apellidos" required />
					<input name="reptel" type="tel" autocomplete="off" maxlength="11" class="form-control salto" placeholder="Telefono" required />
					<div class="input-group salto">
  						<span class="input-group-addon">@</span>
  						<input name="repmail" type="email" maxlength="50" autocomplete="off" class="form-control" placeholder="E-mail" required>
					</div>

					<!--<input type="submit" name="save" value="Save" class="btn btn-default addbtn"/>
					<input type="reset" name="save" value="New" class="btn btn-default addbtn"/>-->
					<input type="submit" name="save" value="Guardar" class="btn btn-success"/>
					<input type="reset" name="new" value="Nuevo" class="btn btn-warning"/>
				</form>
				<!--Preloader and error-->
				<span class="msg-error hidde"></span>
				<span class="contt loader-wrapper loader hide"></span>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
			</div>
		</div>
	</div>
</div>