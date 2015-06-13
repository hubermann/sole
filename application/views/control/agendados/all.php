
<h2><?php echo $title; ?></h2>

<?php 
if(count($query)){
	echo '<table class="table table-striped">';
	foreach ($query as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr>';
echo '<td>'.$row->nombre.' </td>';
echo '<td>'.$row->apellido.' </td>';
echo '<td>'.$row->razon_social.' </td>';
echo '<td>'.$row->direccion.' </td>';
echo '<td>'.$row->telefono.' </td>';
echo '<td>'.$row->movil.' </td>';
echo '<td>'.$row->email.' </td>';
echo '<td>'.$row->email2.' </td>';
echo '<td>'.$row->cuit.' </td>';
echo '<td>'.$row->observaciones.' </td>';

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" href="'.base_url('control/agendados/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/agendados/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/agendados/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
		</div>
		</td>';


		echo '</tr>';

	endforeach; 
	echo '</table>';
}else{
	echo 'No hay resultados.';
}
?>
<div>
<ul class="pagination pagination-small pagination-centered">
<?php echo $pagination_links;  ?>
</ul>
</div>