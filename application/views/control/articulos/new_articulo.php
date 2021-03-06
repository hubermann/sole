<script>
	function show_preview(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	$('#previewImg').html('<img src="'+e.target.result+'" width="140" />' );
	}
	reader.readAsDataURL(input.files[0]);
	}
}
</script><?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_articulo');
echo form_open_multipart(base_url('control/articulos/create/'),$attributes);

echo form_hidden('articulo[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->


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
			<label class="control-label">Temporada_id</label>
			<div class="controls">
			<select name="temporada_id" id="temporada_id">
		<?php  

		if($temporadas){

			foreach ($temporadas as $value) {
				echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
			}
		}
		
		?>
		</select>
			<?php echo form_error('temporada_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Tela</label>
			<div class="controls">
			<input value="<?php echo set_value('tela'); ?>" class="form-control" type="text" name="tela" />
			<?php echo form_error('tela','<p class="error">', '</p>'); ?>
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

	
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
			
			
			<?php  
			echo form_dropdown('status', $this->config->item('status'), $this->input->post('status'), 'id = status'); 
			echo form_error('status','<p class="error">', '</p>');
			?>

			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Descripcion</label>
			<div class="controls">
			<textarea name="descripcion" id="descripcion" class="form-control"><?php echo set_value('descripcion'); ?></textarea>
			<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Observaciones</label>
			<div class="controls">
			<textarea name="observaciones" id="observaciones" class="form-control"><?php echo set_value('observaciones'); ?></textarea>
			<?php echo form_error('observaciones','<p class="error">', '</p>'); ?>
			</div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Stock</label>
			<div class="controls">
			<input value="<?php echo set_value('stock'); ?>" class="form-control" type="text" name="stock" />
			<?php echo form_error('stock','<p class="error">', '</p>'); ?>
			</div>
			</div>
	<!-- Text input-->
<div class="control-group">
	<label class="control-label">Imagen</label>
	<div class="controls">
	<div id="previewImg"></div>
	<input value="<?php echo set_value('filename'); ?>" type="file" class="form-control" name="filename" onchange="show_preview(this)"/>
	<?php echo form_error('filename','<p class="error">', '</p>'); ?>
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