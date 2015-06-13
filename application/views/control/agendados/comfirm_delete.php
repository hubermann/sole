<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_agendado');
echo form_open(base_url('control/agendados/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Nombre: <?php echo $query->nombre; ?></p>
 <p>Apellido: <?php echo $query->apellido; ?></p>
 <p>Razon_social: <?php echo $query->razon_social; ?></p>
 <p>Direccion: <?php echo $query->direccion; ?></p>
 <p>Telefono: <?php echo $query->telefono; ?></p>
 <p>Movil: <?php echo $query->movil; ?></p>
 <p>Email: <?php echo $query->email; ?></p>
 <p>Email2: <?php echo $query->email2; ?></p>
 <p>Cuit: <?php echo $query->cuit; ?></p>
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