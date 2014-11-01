<!--modal delete-->
<div id="pr-delete" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Eliminar proveedor</h3>
			</div>
			<div class="modal-body">
				<p>Estas por eliminar el proveedor con nit <strong class="nit-delete" ></strong>, esto se hará de forma permanente en la base de datos.</p>
				<input name="nit_dl" id="nit_pr" type="hidden" value="" />
				<button onclick="delete_pr(document.getElementById('nit_pr').value);" data-dismiss="modal" type="button" class="btn btn-danger">Eliminar</button/>
				<button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button/>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-success">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!--modal delete-->	