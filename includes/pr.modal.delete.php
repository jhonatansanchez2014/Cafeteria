<!--modal delete-->
<div id="pr-delete" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Eliminar proveedor</h3>
			</div>
			<div class="delete-nit modal-body">
				<p>Estas por eliminar el proveedor con nit <strong class="nit-delete" ></strong>, esto se hará de forma permanente en la base de datos.</p>
				<form action="../includes/pr.delete.php" method="POST">
 					<input name="nit" id="nit_pr" type="hidden" value="" />
 					<input type="submit" name="save" value="Eliminar" class="btn btn-danger" />
					<button type="button" data-dismiss="modal" value="" class="btn btn-success">Cancelar</button/>
 				</form>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-success">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!--modal delete-->	