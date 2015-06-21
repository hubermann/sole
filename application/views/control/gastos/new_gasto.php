<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_gasto');
echo form_open_multipart(base_url('control/gastos/create/'),$attributes);

echo form_hidden('gasto[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

	<!-- Text input-->

	<div class="control-group">
	<label class="control-label">Categoria</label>
		<div class="controls">
			
			<select name="categoria_id" id="categoria_id">
			<?php  
			
			$categorias = $this->categorias_gasto->get_records_menu();
			if($categorias){

				foreach ($categorias as $value) {
					echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
				}
			}
			
			?>
			</select>

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
	<textarea name="detalle" id="detalle" class="form-control"><?php echo set_value('detalle'); ?></textarea>
	
	<?php echo form_error('detalle','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fecha <small> (mes-dia-a&ntilde;o) </small></label>
	<div class="controls">
	<div id="fechacontainer">
	<input value="<?php echo set_value('fecha'); ?>" class="form-control" type="text" name="fecha" id="fecha"/>
	</div>
	<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
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