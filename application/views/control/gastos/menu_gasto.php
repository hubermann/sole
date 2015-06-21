
<div class="well sidebar-nav">
<ul class="nav nav-list">
<li class="nav-header">Opciones</li>
<li><a href="<?php echo base_url('control/gastos/');?>">Ver Gastos</a></li>
<li><a href="<?php echo base_url('control/gastos/form_new'); ?>">Nuevo Gasto</a></li>
</ul>



<div id="chartgastos" style="width: 100%; margin: 3em auto"></div>

<?php 
$gastos_mes = $this->gasto->gastos_mes_actual(); 



?>


<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<?php  

echo '

<script>
$(document).ready(function () {

	// Build the chart
	$("#chartgastos").highcharts({
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false
	    },
	    title: {
	        text: "Gastos del mes actual al dia de hoy."
	    },
	    tooltip: {
	        pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: "pointer",
	            dataLabels: {
	                enabled: false
	            },
	            showInLegend: true
	        }
	    },
	    series: [{
	        type: "pie",
	        name: "Gastos",
	        data: [
	            
	            ';
	foreach ($gastos_mes as $value) {

	$nombre_categoria = $this->categorias_gasto->traer_nombre($value->categoria_id);

	echo '["'.$nombre_categoria.' '.$value->total.'", '.$value->total.'],';
	}

echo '
	            

	        ]
	    }]
	});


});
</script>

';

?>

</div><!--/.well -->