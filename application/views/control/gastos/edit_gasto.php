<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_gasto');
echo form_open_multipart(base_url('control/gastos/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

 


<!-- Text input-->

<div class="control-group">
<label class="control-label">Categoria id</label>
	<div class="controls">
	<select name="categoria_id" id="categoria_id">
		<?php 
	
		$categorias = $this->categorias_gasto->get_records_menu();
		if($categorias){

			foreach ($categorias as $value) {
				if($query->categoria_id == $value->id){$sel= "selected";}else{$sel="";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
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
			<input value="<?php echo $query->importe; ?>" type="text" class="form-control" name="importe" />
			<?php echo form_error('importe','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Detalle</label>
			<div class="controls">
			<input value="<?php echo $query->detalle; ?>" type="text" class="form-control" name="detalle" />
			<?php echo form_error('detalle','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<?php  
			list($anio,$mes,$dia) = explode('-', $query->fecha);
			$fecha_formateda = "$mes-$dia-$anio";
			?>
			<div class="control-group">
			<label class="control-label">Fecha <small> (mes-dia-a&ntilde;o) </small></label>
			<div class="controls">
			<div id="fechacontainer">
			<input value="<?php echo $fecha_formateda; ?>" type="text" class="form-control" name="fecha" />
			</div>
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
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
