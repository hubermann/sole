
<h2><?php echo ucfirst($title); ?></h2>
<div class="row">
<?php 
if(count($query)){
	$counter =0;
	foreach ($query as $row):

	$razonsocial_direccion = "";

	if($row->razon_social || $row->direccion){$razonsocial_direccion='<p >Razon social: '.$row->razon_social.'  Direccion: '.$row->direccion.' </p>';}
	echo '
	<div class="col-md-6 col-dm-6 col-lg-6 col-xs-12">
	<div class="panel panel-info">

	<div class="panel-heading">
	  <h3 class="panel-title">'.$row->nombre.' '.$row->apellido.'</h3>
	</div>

	<div class="panel-body" class="list-group">

		'.$razonsocial_direccion.'
		<p ><i class="fa fa-phone"></i> '.$row->telefono.'   '.$row->movil.'</p>
		<p ><i class="fa fa-envelope"></i> '.$row->email.' '.$row->email2.' </p>
		<p > <small>Tipo: '.$row->categoria_id.' | CUIT: '.$row->cuit.'</small> </p>
		<p > <small>'.$row->observaciones.'</small> </p>

	</div><!-- end panel info -->

	<div class="panel-footer">

		<a type="button" class="btn btn-small btn-default" href="'.base_url('control/agendados/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a type="button" class="btn btn-small btn-default" href="'.base_url('control/agendados/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>

	</div><!-- end panel footer -->

	</div><!-- end panel info -->
	</div>
	';


$counter++;

if($counter==2){$counter=0; echo '</div><div class="row">';}
	endforeach; 


}else{
	echo 'No hay resultados.';
}
?>
</div>


<div>
<ul class="pagination pagination-small pagination-centered">
<?php echo $pagination_links;  ?>
</ul>
</div>
