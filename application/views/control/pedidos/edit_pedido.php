<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_pedido');
echo form_open_multipart(base_url('control/pedidos/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

 


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria id</label>
	<div class="controls">
	<select name="categoria_id" id="categoria_id">
		<?php 
		/* 
		$categorias = $this->categoria->get_records_menu();
		if($categorias){

			foreach ($categorias as $value) {
				if($query->categoria_id == $value->id){$sel= "selected";}else{$sel="";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
			}
		}
		*/
		?>
		</select>
		
		<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
	</div>
</div>
-->

			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cliente_id</label>
			<div class="controls">
			<input value="<?php echo $query->cliente_id; ?>" type="text" class="form-control" name="cliente_id" />
			<?php echo form_error('cliente_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Created_at</label>
			<div class="controls">
			<input value="<?php echo $query->created_at; ?>" type="text" class="form-control" name="created_at" />
			<?php echo form_error('created_at','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha</label>
			<div class="controls">
			<input value="<?php echo $query->fecha; ?>" type="text" class="form-control" name="fecha" />
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Estatus</label>
			<div class="controls">
			<input value="<?php echo $query->estatus; ?>" type="text" class="form-control" name="estatus" />
			<?php echo form_error('estatus','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Observaciones</label>
			<div class="controls">
			<input value="<?php echo $query->observaciones; ?>" type="text" class="form-control" name="observaciones" />
			<?php echo form_error('observaciones','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Monto_total</label>
			<div class="controls">
			<input value="<?php echo $query->monto_total; ?>" type="text" class="form-control" name="monto_total" />
			<?php echo form_error('monto_total','<p class="error">', '</p>'); ?>
			</div>
			</div>

<div class="control-group">
<label class="control-label"></label>
	<div class="controls">
		<button class="btn" type="submit">Actualizar</button>
	</div>
</div>

</fieldset>

<?php echo form_close(); ?>

</div>
