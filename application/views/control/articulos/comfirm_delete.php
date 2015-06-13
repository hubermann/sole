<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_articulo');
echo form_open(base_url('control/articulos/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Codigo: <?php echo $query->codigo; ?></p>
 <p>Temporada_id: <?php echo $query->temporada_id; ?></p>
 <p>Tela: <?php echo $query->tela; ?></p>
 <p>Valor_unitario: <?php echo $query->valor_unitario; ?></p>
 <p>Status: <?php echo $query->status; ?></p>
 <p>Descripcion: <?php echo $query->descripcion; ?></p>
 <p>Observaciones: <?php echo $query->observaciones; ?></p>
 <p>Filename: <?php echo $query->filename; ?></p>

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