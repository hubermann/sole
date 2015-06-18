<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_agendado');
echo form_open_multipart(base_url('control/agendados/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

 


<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Categoria</label>
			<div class="controls">

			<?php echo form_dropdown('categoria_id', $this->config->item('opciones_agendados'), $query->categoria_id , 'id = categoria_id'); echo form_error('categoria_id','<p class="error">', '</p>'); ?>
			</div>
			</div>




			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Nombre</label>
			<div class="controls">
			<input value="<?php echo $query->nombre; ?>" type="text" class="form-control" name="nombre" />
			<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Apellido</label>
			<div class="controls">
			<input value="<?php echo $query->apellido; ?>" type="text" class="form-control" name="apellido" />
			<?php echo form_error('apellido','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Razon_social</label>
			<div class="controls">
			<input value="<?php echo $query->razon_social; ?>" type="text" class="form-control" name="razon_social" />
			<?php echo form_error('razon_social','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Direccion</label>
			<div class="controls">
			<input value="<?php echo $query->direccion; ?>" type="text" class="form-control" name="direccion" />
			<?php echo form_error('direccion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Telefono</label>
			<div class="controls">
			<input value="<?php echo $query->telefono; ?>" type="text" class="form-control" name="telefono" />
			<?php echo form_error('telefono','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Movil</label>
			<div class="controls">
			<input value="<?php echo $query->movil; ?>" type="text" class="form-control" name="movil" />
			<?php echo form_error('movil','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Email</label>
			<div class="controls">
			<input value="<?php echo $query->email; ?>" type="text" class="form-control" name="email" />
			<?php echo form_error('email','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Email2</label>
			<div class="controls">
			<input value="<?php echo $query->email2; ?>" type="text" class="form-control" name="email2" />
			<?php echo form_error('email2','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cuit</label>
			<div class="controls">
			<input value="<?php echo $query->cuit; ?>" type="text" class="form-control" name="cuit" />
			<?php echo form_error('cuit','<p class="error">', '</p>'); ?>
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

<div class="control-group">
<label class="control-label"></label>
	<div class="controls">
		<button class="btn" type="submit">Actualizar</button>
	</div>
</div>

</fieldset>

<?php echo form_close(); ?>

</div>
