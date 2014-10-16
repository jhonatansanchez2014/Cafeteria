<!--modal productos-->
		<div id="Ups" class="modal fade">
			<div class="modal-dialog">   
				<div class="modal-content"> 
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>Add New Products</h3>
					</div>
					<div class="modal-body">
						
						<form action="../includes/insert.products.php" method="POST">
							<input name="codigo" type="text" onkeypress="validatenum();" autocomplete="off" maxlength="15" class="form-control salto" placeholder="Codigo del producto" required />

							<input name="producto" type="text" autocomplete="off" maxlength="50" class="form-control salto" placeholder="Producto" required />
							
							<input name="categoria" type="text" autocomplete="off" maxlength="50" class="form-control salto" placeholder="Referencia del producto" required />
							
							<!--<select style=" display: inline-block; width: 150px;" name="tipoP" class="form-control">
								<option value="Mecato">Mecato</option>
								<option value="Gaseosa">Gaseosa</option>
								<option value="Gaseosa">Gaseosa</option>
							</select>-->

							<input style=" display: inline-block; width: 158px;" name="cantidad" type="number" min="1" max="255" onkeypress="validatenum();" autocomplete="off" maxlength="10" class="form-control" placeholder="Cantidad" required />

							<select  style="display: inline-block; width: 200px;" name="medida" class="form-control salto">
								<option value="Unidad">Unidad</option>
								<option value="Kg">Kilogramos</option>
								<option value="Lb">Libras</option>
							</select>
							
							<input style=" display: inline-block; width: 200px;" name="precio" type="text" onkeyup="decimales(this,this.value.charAt(this.value.length-1))" autocomplete="off" class="form-control salto" placeholder="Precio total" required />

							<label class="salto">Fecha de caducidad</label>
							<input name="fVence" type="date" autocomplete="off" class="form-control salto" placeholder="Fecha de vencimiento" required />

							<select name="proveedor" class="form-control salto">
								<option value="Yupi">Yupi</option>
								<option value="Colanta">Suspendido</option>
							</select>

							<input name="reparte" type="text" onkeypress="validatetext();" maxlength="50" autocomplete="off" class="form-control salto" placeholder="Repartidor" required />

							<!--<input type="submit" name="save" value="Save" class="btn btn-default addbtn"/>
							<input type="reset" name="save" value="New" class="btn btn-default addbtn"/>-->
							<input type="submit" name="save" value="Save product" class="btn btn-success"/>
							<input type="reset" name="new" value="New" class="btn btn-warning"/>
						</form>
						<!--Preloader and error-->
						<span class="msg-error hidde"></span>
						<span class="contt loader-wrapper loader hide"></span>
					</div>
	     			<div class="modal-footer">
	     				<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
	    			</div>
				</div>
			</div>
		</div>
		<!--modal delete-->