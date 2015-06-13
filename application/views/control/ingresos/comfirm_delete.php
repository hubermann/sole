<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_ingreso');
echo form_open(base_url('control/ingresos/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Pedido_id: <?php echo $query->pedido_id; ?></p>
 <p>Monto: <?php echo $query->monto; ?></p>
 <p>Porcentaje: <?php echo $query->porcentaje; ?></p>
 <p>Tipo: <?php echo $query->tipo; ?></p>
 <p>Banco: <?php echo $query->banco; ?></p>
 <p>Numero_cheque: <?php echo $query->numero_cheque; ?></p>
 <p>Vencimiento: <?php echo $query->vencimiento; ?></p>
 <p>Fecha: <?php echo $query->fecha; ?></p>
 <p>Created_at: <?php echo $query->created_at; ?></p>
 <p>Observaciones: <?php echo $query->observaciones; ?></p>

<!--  -->
<div class="control-group">

<label class="checkbox inline">

<input type="checkbox" name="comfirm" id="comfirm" />
<p>Confirma eliminar?</p>
<?php echo form_error('comfirm','<p class="error">', '</p>'); ?>
 </label>
</div>
<!--  -->
<div class="control-group">
<button class="btn btn-danger" type="submit"><i class="icon-trash icon-large"></i> Eliminar</button>
</div>


</fieldset>

<?php echo form_close(); ?>