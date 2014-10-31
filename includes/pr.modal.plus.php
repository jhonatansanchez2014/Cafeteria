<!--modal proveedor-->
<div id="pr-plus" class="modal fade">
	<div class="modal-dialog">   
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="title-pr">
					
				</h3>
			</div>
			<div class="modal-body">
				<!--Responsive table-->
				<div class="table-responsive">
					<h4>Datos del representante</h4>
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						    <tr>
						        <th>Nombres</th>
						        <th>Apellidos</th>
						        <th>Telefono</th>
						        <th>E-mail</th>
						    </tr>
						</thead>
						<tbody class="pr-rep">
							
						</tbody>
					</table>
				</div>
				<div class="table-responsive">
					<h4>Productos del proveedor</h4>
					<table class="table table-bordered table-hover table-condensed">
						<thead>
						    <tr>
						        <th>Nombre</th>
						        <th>F ingreso</th>
						        <th>Repartidor</th>
						    </tr>
						</thead>
						<tbody class="pr-pro">
							
						</tbody>
					</table>
				</div>
			<!--Responsive-->
				<div class="alert alert-danger" role="alert">Solo de muestran los <strong>últimos 10 productos</strong> ingresados de este proveedor.</div>
			</div>
 			<div class="modal-footer">
 				<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
			</div>
		</div>
	</div>
</div>