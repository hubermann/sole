<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_pedidos_item');
echo form_open_multipart(base_url('control/pedidos_items/update/'),$attributes);

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
			<label class="control-label">Pedido_id</label>
			<div class="controls">
			<input value="<?php echo $query->pedido_id; ?>" type="text" class="form-control" name="pedido_id" />
			<?php echo form_error('pedido_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Codigo</label>
			<div class="controls">
			<input value="<?php echo $query->codigo; ?>" type="text" class="form-control" name="codigo" />
			<?php echo form_error('codigo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cantidad</label>
			<div class="controls">
			<input value="<?php echo $query->cantidad; ?>" type="text" class="form-control" name="cantidad" />
			<?php echo form_error('cantidad','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Valor_unitario</label>
			<div class="controls">
			<input value="<?php echo $query->valor_unitario; ?>" type="text" class="form-control" name="valor_unitario" />
			<?php echo form_error('valor_unitario','<p class="error">', '</p>'); ?>
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
