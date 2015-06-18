<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_pedido');
echo form_open(base_url('control/pedidos/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Cliente_id: <?php echo $query->cliente_id; ?></p>
 <p>Created_at: <?php echo $query->created_at; ?></p>
 <p>Fecha: <?php echo $query->fecha; ?></p>
 <p>Status: <?php echo $query->status; ?></p>
 <p>Observaciones: <?php echo $query->observaciones; ?></p>
 <p>Monto_total: <?php echo $query->monto_total; ?></p>

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

<?php echo form_close(); ?>t