<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_ingreso');
echo form_open_multipart(base_url('control/ingresos/create/'),$attributes);

echo form_hidden('ingreso[id]');

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
			<label class="control-label">Monto</label>
			<div class="controls">
			<input value="<?php echo set_value('monto'); ?>" class="form-control" type="text" name="monto" />
			<?php echo form_error('monto','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Porcentaje</label>
			<div class="controls">
			<input value="<?php echo set_value('porcentaje'); ?>" class="form-control" type="text" name="porcentaje" />
			<?php echo form_error('porcentaje','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Tipo</label>
			<div class="controls">
			<input value="<?php echo set_value('tipo'); ?>" class="form-control" type="text" name="tipo" />
			<?php echo form_error('tipo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Banco</label>
			<div class="controls">
			<input value="<?php echo set_value('banco'); ?>" class="form-control" type="text" name="banco" />
			<?php echo form_error('banco','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Numero_cheque</label>
			<div class="controls">
			<input value="<?php echo set_value('numero_cheque'); ?>" class="form-control" type="text" name="numero_cheque" />
			<?php echo form_error('numero_cheque','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Vencimiento</label>
			<div class="controls">
			<input value="<?php echo set_value('vencimiento'); ?>" class="form-control" type="text" name="vencimiento" />
			<?php echo form_error('vencimiento','<p class="error">', '</p>'); ?>
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
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Observaciones</label>
			<div class="controls">
			<input value="<?php echo set_value('observaciones'); ?>" class="form-control" type="text" name="observaciones" />
			<?php echo form_error('observaciones','<p class="error">', '</p>'); ?>
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