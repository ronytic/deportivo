<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/club.php");
	include_once("../../class/puntaje.php");
	$categoria=$_POST['CodCategoria'];
	$club=new club;
	$puntaje=new puntaje;
	$puntajes=$puntaje->estadisticaPuntaje($categoria);
	if(count($puntajes)<=0){die("No hay Equipos en esta Categoria");exit();}
	$_PTS=array();
	$_equipos=array();
	foreach($puntajes as $p){
		$_PTS[]=$p['PTS'];
		$c=array_shift($club->mostrarTodo(0,"CodClub=".$p['CodClub']));
		$_equipos[]="'".$c['Nombre']."'";
	}
	$pts=implode(",",$_PTS);
	$equipos=implode(",",$_equipos);
	?>
    <tr class="cabecera"><td width="700">Estadistica</td></tr>
	<?php	
		?>
        <tr class="contenido">
        	<td>
				<div id="estadistica"></div>            
            </td>
        	<script language="javascript">
   $(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'estadistica',
                type: 'column',
                margin: [ 50, 50, 150, 80]
            },
            title: {
                text: 'Estadistica de Puntajes'
            },
            xAxis: {
                categories: [
                    
                    <?php echo $equipos?>
                ],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Puntos'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Total:'+ Highcharts.numberFormat(this.y, 0) +
                        ' Puntos';
                }
            },
            series: [{
                name: 'Population',
                data: [<?php echo $pts?>],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
    
});

                </script>
        </tr>
        <?php
	
	?>
	<?php
}
?>