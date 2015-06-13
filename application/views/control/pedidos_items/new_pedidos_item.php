<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_pedidos_item');
echo form_open_multipart(base_url('control/pedidos_items/create/'),$attributes);

echo form_hidden('pedidos_item[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria</label>
	<div class="controls">
		
		<select name="categoria_id" id="categoria_id">
		<?php  
		/*
		$categorias = $this->Categoria->get_records_menu();
		if($categorias){

			foreach ($categorias->result() as $value) {
				echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
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
			<input value="<?php echo set_value('pedido_id'); ?>" class="form-control" type="text" name="pedido_id" />
			<?php echo form_error('pedido_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Codigo</label>
			<div class="controls">
			<input value="<?php echo set_value('codigo'); ?>" class="form-control" type="text" name="codigo" />
			<?php echo form_error('codigo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cantidad</label>
			<div class="controls">
			<input value="<?php echo set_value('cantidad'); ?>" class="form-control" type="text" name="cantidad" />
			<?php echo form_error('cantidad','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Valor_unitario</label>
			<div class="controls">
			<input value="<?php echo set_value('valor_unitario'); ?>" class="form-control" type="text" name="valor_unitario" />
			<?php echo form_error('valor_unitario','<p class="error">', '</p>'); ?>
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