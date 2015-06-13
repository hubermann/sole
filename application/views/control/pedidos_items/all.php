
<h2><?php echo $title; ?></h2>

<?php 
if(count($query)){
	echo '<table class="table table-striped">';
	foreach ($query as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr>';
echo '<td>'.$row->pedido_id.' </td>';
echo '<td>'.$row->codigo.' </td>';
echo '<td>'.$row->cantidad.' </td>';
echo '<td>'.$row->valor_unitario.' </td>';

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" href="'.base_url('control/pedidos_items/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/pedidos_items/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/pedidos_items/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
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