<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_ingreso');
echo form_open_multipart(base_url('control/ingresos/update/'),$attributes);

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
			<label class="control-label">Monto</label>
			<div class="controls">
			<input value="<?php echo $query->monto; ?>" type="text" class="form-control" name="monto" />
			<?php echo form_error('monto','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Porcentaje</label>
			<div class="controls">
			<input value="<?php echo $query->porcentaje; ?>" type="text" class="form-control" name="porcentaje" />
			<?php echo form_error('porcentaje','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Tipo</label>
			<div class="controls">
			<input value="<?php echo $query->tipo; ?>" type="text" class="form-control" name="tipo" />
			<?php echo form_error('tipo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Banco</label>
			<div class="controls">
			<input value="<?php echo $query->banco; ?>" type="text" class="form-control" name="banco" />
			<?php echo form_error('banco','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Numero_cheque</label>
			<div class="controls">
			<input value="<?php echo $query->numero_cheque; ?>" type="text" class="form-control" name="numero_cheque" />
			<?php echo form_error('numero_cheque','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Vencimiento</label>
			<div class="controls">
			<input value="<?php echo $query->vencimiento; ?>" type="text" class="form-control" name="vencimiento" />
			<?php echo form_error('vencimiento','<p class="error">', '</p>'); ?>
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
			<label class="control-label">Created_at</label>
			<div class="controls">
			<input value="<?php echo $query->created_at; ?>" type="text" class="form-control" name="created_at" />
			<?php echo form_error('created_at','<p class="error">', '</p>'); ?>
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
