
<h2><?php echo ucfirst($title); ?></h2>

<?php 
if(count($query)){

	foreach ($query as $row):
		$aproximado = $row->stock * $row->valor_unitario;
		$nombre_temporada = $this->temporada->traer_nombre($row->temporada_id); 

		//
		$descripcion="";
		if($row->descripcion!=""){$descripcion = '<p>Descripcion:<br>'.$row->descripcion.'</p>';}

		//
		$observaciones="";
		if($row->observaciones!=""){$observaciones = '<p>Observaciones:<br>'.$row->observaciones.'</p>';}

		//imagen
		if($row->filename){
		$imagen =  '<img src="'.base_url('images-articulos/'.$row->filename).'" class="img-responsive" />';
		}else{
		$imagen="";
		}

		if($row->status=="Disponible"){$tipo_panel = "panel-success";}
		elseif($row->status=="En desarrollo"){$tipo_panel = "panel-warning";}
		else{$tipo_panel = "";}
		echo '
		
		<div class="panel '.$tipo_panel.'">

		<div class="panel-heading">
		<h3 class="panel-title">'.$row->codigo.' - '.$nombre_temporada.' - '.$row->status.'</h3>
		</div>

		<div class="panel-body" class="list-group">
		
		<div class="col-md-2">
		'.$imagen.'
		</div>
		<div class="col-md-10">
		<p > <strong>$ </strong>'.$row->valor_unitario.'  | Stock: '.$row->stock.' <small>( Capital aprox. $'.$aproximado.' )</small>  </p>
		'.$descripcion.'
		'.$observaciones.'
		</div>

		</div><!-- end panel info -->

		<div class="panel-footer">

		<a class="btn btn-small" href="'.base_url('control/articulos/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/articulos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
		</div><!-- end panel footer -->

		</div><!-- end panel info -->
	
		';
		$aproximado = 0;
		/*
		

		echo '<tr>';
		echo '<td>'.$row->codigo.' </td>';
		echo '<td>'.$nombre_temporada.' </td>';
		echo '<td>'.$row->tela.' </td>';
		echo '<td>'.$row->valor_unitario.' </td>';
		echo '<td>'.$row->status.' </td>';
		echo '<td>'.$row->descripcion.' </td>';
		echo '<td>'.$row->observaciones.' </td>';
		echo '<td>'.$row->filename.' </td>';

		if($row->filename){
		echo '<td><img src="'.base_url('images-articulos/'.$row->filename).'" width="100" /></td>';
		}else{
			echo "<td></td>";
		}

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" href="'.base_url('control/articulos/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/articulos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/articulos/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
		</div>
		</td>

		</tr>';
		*/


	endforeach; 

}else{
	echo 'No hay resultados.';
}
?>


<div>
<ul class="pagination pagination-small pagination-centered">
<?php echo $pagination_links;  ?>
</ul>
</div>