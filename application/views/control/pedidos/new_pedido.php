<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_pedido');
echo form_open_multipart(base_url('control/pedidos/create/'),$attributes);

echo form_hidden('pedido[id]');

?>

<style>
	.row_individual{ padding-bottom: .5em; }
	.control-label small{font-weight: 300; color: #ccc}
	.teveo{background: red;}
</style>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


			<div class="control-group">
			<label class="control-label">Cliente</label>
				<div class="controls">
					
					<select name="cliente_id" id="cliente_id">
					<?php  
				
					$clientes = $this->agendado->get_records_menu();
					if($clientes){

						foreach ($clientes as $cliente) {
							echo '<option value="'.$cliente->id.'">'.$cliente->nombre.' '.$cliente->apellido.' | Razon Social:'.$cliente->razon_social.' | Cuit: '.$cliente->cuit.'</option>';
						}
					}
				
					?>
					</select>

					<?php echo form_error('cliente_id','<p class="error">', '</p>'); ?>
				</div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha <small>(mes-dia-a&ntilde;o)</small></label>
			<div class="controls">
			<div id="fechacontainer">
			<input value="<?php echo set_value('fecha'); ?>" class="form-control" type="text" name="fecha" id="fecha" />
			</div>
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">status</label>
			<div class="controls">
			<?php echo form_dropdown('status', $this->config->item('status_pedidos'), $this->input->post('status')); echo form_error('status','<p class="error">', '</p>'); ?>
			
			<?php echo form_error('status','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- ITEMS -->
			<hr>
			<div class="control-group">
			<div class="controls">
			<p><a class="btn btn-xs btn-info" onclick="agregar_campo();">Agregar items <i class="fa fa-plus-circle"></i></a></p>
			</div>
			</div>
			<div id="items_pedido">
				
			<!-- Text input-->
			<div class="control-group">
			
			<div id="rows_items">

				<div class="row row_individual0">
					
					<div class="col-md-3">
						<label class="control-label">Art. Codigo <small id="helper_codigo0"></small></label>
						<input type="text" name="codigo[0]" id="codigo0" class="form-control" onchange="verificarInfo('0', this.value);">
					</div>
					<div class="col-md-3">
						<label class="control-label">Cantidad <small id="helper_cantidad0"></small></label>
						<input type="text" name="cantidad[0]" id="cantidad0" class="form-control" onchange="calcularSubtotal('0');">
					</div>
					<div class="col-md-3">
						<label class="control-label">Precio unidad. <small id="helper_punitario0"></small></label>
						<input type="text" name="valor_unitario[0]" id="valor_unitario0" class="form-control" onchange="calcularSubtotal('0');">
					</div>
					<div class="col-md-3">
						<label class="control-label">Subtotal</label>
						<input type="text" name="subtotal_unitario[0]" id="subtotal_unitario0" class="form-control subtotal">
					</div>
				</div>

			</div>

			


			<hr>
			</div> <!-- fin items pedidos -->

			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Observaciones</label>
			<div class="controls">
			<textarea name="observaciones" id="observaciones" rows="6" class="form-control"><?php echo set_value('observaciones'); ?></textarea>
			<?php echo form_error('observaciones','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Monto_total</label>
			<div class="controls">
			<input value="<?php echo set_value('monto_total'); ?>" class="form-control" type="text" name="monto_total" id="monto_total" />
			<?php echo form_error('monto_total','<p class="error">', '</p>'); ?>
			</div>
			</div>


<div class="control-group">
<label class="control-label"></label>
	<div class="controls">
		<button class="btn" type="submit">Crear</button>
	</div>
</div>



</fieldset>

<?php echo form_close(); ?>

</div>

<hr>

<!-- HELPER ARTICULOS 	 -->
<div class="row">
	<div class="col-md-12">
		<p>Buscar informacion de codigo</p>

			<input type="text" name="codigo_helper" id="codigohelper" >
			<a class="btn btn-default btn-xs" onclick="helperArticulo();">Buscar</a>
	
		<!-- info recibida -->
		<div id="datos_articulo">
			
		</div>
	</div>
</div>

<script type="text/javascript">
	var valinput = 0;
	function agregar_campo(){
		valinput++;

		variable = "<div class=\"row row_individual"+valinput+"\"><div class=\"col-md-3\"> <label class=\"control-label\">Art. Codigo <small id=\"helper_codigo"+valinput+"\"></small></label> <input type=\"text\" name=\"codigo["+valinput+"]\" id=\"codigo"+valinput+"\" class=\"form-control\" onchange=\"verificarInfo('"+valinput+"', this.value);\"> </div> <div class=\"col-md-3\"> <label class=\"control-label\">Cantidad <small id=\"helper_cantidad"+valinput+"\"></small></label> <input type=\"text\" name=\"cantidad["+valinput+"]\" id=\"cantidad"+valinput+"\" class=\"form-control\" onchange=\"calcularSubtotal('"+valinput+"');\"> </div> <div class=\"col-md-3\"> <label class=\"control-label\">Precio unitario. <small id=\"helper_punitario"+valinput+"\"></small></label> <input type=\"text\" name=\"valor_unitario["+valinput+"]\" id=\"valor_unitario"+valinput+"\" class=\"form-control\" onchange=\"calcularSubtotal('"+valinput+"');\"> </div> <div class=\"col-md-3\"> <label class=\"control-label\">Subtotal</label> <input type=\"text\" name=\"subtotal_unitario["+valinput+"]\" id=\"subtotal_unitario"+valinput+"\" class=\"form-control subtotal\"> </div> </div>";
		$('#rows_items').append(variable);
	}

 function verificarInfo(inputSeleccionado, valor){
 	if(navigator.onLine){

 	var idsolicitado = $("#codigo"+inputSeleccionado).val();

 	$.post( "<?php echo base_url('control/articulos/info_articulo'); ?>",{ idarticulo: idsolicitado }, function( data ) {
 		if(data.estado== 1){

 			$( "#valor_unitario"+inputSeleccionado ).val( data.valor_unitario );
 			$( "#helper_punitario"+inputSeleccionado ).text( '$'+ data.valor_unitario);
 			$( "#helper_codigo"+inputSeleccionado ).html( '<i class="fa fa-check"></i>' );
 			$( "#helper_cantidad"+inputSeleccionado ).text( ' Stock: '+data.stock );
 		}else{

 			$( "#helper_codigo"+inputSeleccionado ).html( '<i class="fa fa-times"></i>' );
 			$( "#helper_cantidad"+inputSeleccionado ).text( "" );
 			$( "#helper_punitario"+inputSeleccionado ).text( "");
 		}
	  	
	});
	

	} else {
	  alert('No hay conexion a internet');
	}

 }


//function para calcular el subtotal por articulo
function calcularSubtotal(row){
	if($('#cantidad'+row).val() && $('#valor_unitario'+row).val()){
		valor = $('#cantidad'+row).val() * $('#valor_unitario'+row).val();
		$('#subtotal_unitario'+row).val(valor)
	}
	calcularTotal();
}

//function para calcular el subtotal por articulo
function calcularTotal(){
	
	var sumaTotal = [],TotalGeneral=0;

	$("#rows_items .subtotal").each(function (index){   
        sumaTotal.push($(this).val());    
    });
	
	for (var i = 0; i < sumaTotal.length; i++) {
	    TotalGeneral += sumaTotal[i] << 0;
	}

	$('#monto_total').val(TotalGeneral);
	
}


 function helperArticulo(){
 	
 	var idbuscado = $("#codigohelper").val();

 	$.post( "<?php echo base_url('control/articulos/info_articulo_full'); ?>",{ idarticulo: idbuscado }, function( data ) {

		if(data.estado== 1){
			if(data.imagen.length < 3){
				var imagen_articulo = "";
			}else{
				var imagen_articulo = '<li class="list-group-item"><img src="<?php echo base_url("images-articulos/'+data.imagen+'"); ?>" width="120" ></li>';
			}
 			$('#datos_articulo').html( '<ul class="list-group"><li class="list-group-item">Temporada: '+data.temporada+'  | Stock: '+data.stock+'  | Precio unidad: $'+data.valor_unitario+' </li><li class="list-group-item">Status:'+data.art_status+' | Tela: '+data.tela+'</li><li class="list-group-item">Descripcion:'+data.descripcion+'</li><li class="list-group-item">Observaciones:'+data.observaciones+'</li>'+imagen_articulo+'</ul>' );

 		}else{
 			
 			$('#datos_articulo').html( '<i class="fa fa-times"></i> No encontrado!' );
 		}
	  	
	});

 }
</script>