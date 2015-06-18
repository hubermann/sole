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
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_articulo');
echo form_open_multipart(base_url('control/articulos/update/'),$attributes);

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
			<label class="control-label">Codigo</label>
			<div class="controls">
			<input value="<?php echo $query->codigo; ?>" type="text" class="form-control" name="codigo" />
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
				$sel="";
				if($query->temporada_id == $value->id){$sel="selected";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
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
			<input value="<?php echo $query->tela; ?>" type="text" class="form-control" name="tela" />
			<?php echo form_error('tela','<p class="error">', '</p>'); ?>
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
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
			<?php  
			echo form_dropdown('status', $this->config->item('status'), $query->status, 'id = status'); 
			echo form_error('status','<p class="error">', '</p>');
			?>
		
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Descripcion</label>
			<div class="controls">
			<textarea name="descripcion" id="descripcion" class="form-control"><?php echo $query->descripcion; ?></textarea>
			<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Observaciones</label>
			<div class="controls">
			<textarea name="observaciones" id="observaciones" class="form-control"><?php echo $query->observaciones; ?></textarea>

			<?php echo form_error('observaciones','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Stock</label>
			<div class="controls">
			<input value="<?php echo $query->stock; ?>" type="text" class="form-control" name="stock" />
			<?php echo form_error('stock','<p class="error">', '</p>'); ?>
			</div>
			</div>

	<!-- Text input-->
<div class="control-group">
	<label class="control-label">Imagen</label>
	<div class="controls">
	<div id="previewImg">
	<?php if($query->filename){
	echo '<p><img src="'.base_url('images-articulos/'.$query->filename).'" width="140" /></p>';
	} ?>

</div>
	<input value="<?php echo set_value('filename'); ?>" type="file" class="form-control" name="filename" onchange="show_preview(this)"/>
	<?php echo form_error('filename','<p class="error">', '</p>'); ?>
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
