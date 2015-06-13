<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_gasto');
echo form_open_multipart(base_url('control/gastos/create/'),$attributes);

echo form_hidden('gasto[id]');

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
			<label class="control-label">Categoria_id</label>
			<div class="controls">
			<input value="<?php echo set_value('categoria_id'); ?>" class="form-control" type="text" name="categoria_id" />
			<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Importe</label>
			<div class="controls">
			<input value="<?php echo set_value('importe'); ?>" class="form-control" type="text" name="importe" />
			<?php echo form_error('importe','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Detalle</label>
			<div class="controls">
			<input value="<?php echo set_value('detalle'); ?>" class="form-control" type="text" name="detalle" />
			<?php echo form_error('detalle','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha</label>
			<div class="controls">
			<input value="<?php echo set_value('fecha'); ?>" class="form-control" type="text" name="fecha" />
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Created_at</label>
			<div class="controls">
			<input value="<?php echo set_value('created_at'); ?>" class="form-control" type="text" name="created_at" />
			<?php echo form_error('created_at','<p class="error">', '</p>'); ?>
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