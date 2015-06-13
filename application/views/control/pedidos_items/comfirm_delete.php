<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_pedidos_item');
echo form_open(base_url('control/pedidos_items/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Pedido_id: <?php echo $query->pedido_id; ?></p>
 <p>Codigo: <?php echo $query->codigo; ?></p>
 <p>Cantidad: <?php echo $query->cantidad; ?></p>
 <p>Valor_unitario: <?php echo $query->valor_unitario; ?></p>

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