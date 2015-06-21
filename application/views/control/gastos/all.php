
<h2><?php echo $title; ?></h2>

<?php 
if(count($query)){
	echo '<table class="table table-striped" id="tablagastos">
	<thead>
		<tr>
		<th>Categoria</th>
		<th>Importe</th>
		<th>Detalle</th>
		<th>Fecha</th>
		<th>Opciones</th>
		</tr>
</thead>
<tbody>
	<tr>
		
	</tr>
	';

	foreach ($query as $row):

		$nombre_categoria = $this->categorias_gasto->traer_nombre($row->categoria_id);

		echo '<tr>';
echo '<td>'.$nombre_categoria.' </td>';
echo '<td>'.$row->importe.' </td>';
echo '<td>'.$row->detalle.' </td>';

echo '<td><a data-toggle="tooltip" data-placement="top" title="Fue creado: '.$row->created_at.'">'.$row->fecha.' </a></td>';

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" href="'.base_url('control/gastos/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/gastos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/gastos/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
		</div>
		</td>';


		echo '</tr>';

	endforeach; 
	echo '</tbody></table>';
}else{
	echo 'No hay resultados.';
}
?>
<div>
<ul class="pagination pagination-small pagination-centered">
<?php echo $pagination_links;  ?>
</ul>
</div>

<script src="<?php echo base_url('public_folder/js/tablesorter.js'); ?>"></script>

<script type="text/javascript">
			$(document).ready(function() 
    { 
        $("#tablagastos").tablesorter(); 
    } 
); 
            

</script>


<?php 
/*$gastos = $this->gasto->gastos_mes_actual(); 
echo '<pre>';
var_dump($gastos);
echo '</pre>';
*/
?>