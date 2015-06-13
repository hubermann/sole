
<h2><?php echo $title; ?></h2>

<?php 
if(count($query)){
	echo '<table class="table table-striped">';
	foreach ($query as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr>';
echo '<td>'.$row->pedido_id.' </td>';
echo '<td>'.$row->monto.' </td>';
echo '<td>'.$row->porcentaje.' </td>';
echo '<td>'.$row->tipo.' </td>';
echo '<td>'.$row->banco.' </td>';
echo '<td>'.$row->numero_cheque.' </td>';
echo '<td>'.$row->vencimiento.' </td>';
echo '<td>'.$row->fecha.' </td>';
echo '<td>'.$row->created_at.' </td>';
echo '<td>'.$row->observaciones.' </td>';

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" href="'.base_url('control/ingresos/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/ingresos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/ingresos/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
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