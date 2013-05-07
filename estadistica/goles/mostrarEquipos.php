<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/club.php");
	include_once("../../class/jugador.php");
	include_once("../../class/planillajugadores.php");
	$categoria=$_POST['CodCategoria'];
	$club=new club;
	$jugador=new jugador;
	$planillajugadores=new planillajugadores;
	$clubes=$club->mostrarClubXCategoria($categoria);
	if(count($clubes)<=0){die("No hay Equipos en esta Categoria");exit();}
	?>
    <tr class="cabecera"><td>Nº</td><td>Nombre de Club</td><td>Estadistica</td></tr>
    
	<?php	
	$i=0;
	$_tgoles=array();
	$_tnombres=array();
	foreach($clubes as $c){$i++;
		?>
        <tr class="contenido">
        	<td><?php echo $i;?></td>
        	<td width="100"><?php echo $c['Nombre'];?></td>
            <td width="650">
            	<div id="cont<?php echo $i;?>"></div>
            	<?php
				//c['CodClub'];
				$jug=array();
                foreach($jugador->mostrarTodo(0," CodClubNuevo=".$c['CodClub']) as $j){
					$jug[cod][]=$j['CodJugador'];
					$jug[nombre][]=$j['Nombres']." ".$j['Paterno'];
					
				}
				$codjugadores=implode(",",$jug['cod']);
				$_goles=array();
				$_nombres=array();
				foreach($planillajugadores->estadisticaGoles($codjugadores) as $pj){
					//print_r($pj);
					$ju=array_shift($jugador->mostrarTodo(0,"CodJugador=".$pj['CodJugador']));
					$_goles[]=$pj['CantidadGoles'];
					$_nombres[]="'".$ju['Nombres']." ".$ju['Paterno']."'";
					//Total
					$_tgoles[]=$pj['CantidadGoles'];
					$_tnombres[]="'".$ju['Nombres']." ".$ju['Paterno']."'";
				}
				$goles=implode(" ,",$_goles);
				$nombres=implode(" ,",$_nombres);
				//echo $nombres;
				//echo $goles;
				?>
                <script language="javascript">
   $(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'cont<?php echo $i?>',
                type: 'column',
                margin: [ 50, 50, 150, 80]
            },
            title: {
                text: 'Estadistica de Goles de <?php echo $c['Nombre'];?>'
            },
            xAxis: {
                categories: [
                    
                    <?php echo $nombres?>
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
                    text: 'Cantidad de Goles'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Anoto:'+ Highcharts.numberFormat(this.y, 0) +
                        ' Goles';
                }
            },
            series: [{
                name: 'Population',
                data: [<?php echo $goles?>],
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
            </td>
            
        </tr>
        <?php
	}
	?><tr>
    	<td colspan="2">
            	General
            </td>
           	<td>
            	<div id="conttotal"></div>
                <?php
				$tgoles=implode(" ,",$_tgoles);
				$tnombres=implode(" ,",$_tnombres);
				?>
                <script language="javascript">
   $(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'conttotal',
                type: 'column',
                margin: [ 50, 50, 150, 80]
            },
            title: {
                text: 'Estadistica General de Goles'
            },
            xAxis: {
                categories: [
                    
                    <?php echo $tnombres?>
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
                    text: 'Cantidad de Goles'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Anoto:'+ Highcharts.numberFormat(this.y, 0) +
                        ' Goles';
                }
            },
            series: [{
                name: 'Population',
                data: [<?php echo $tgoles?>],
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
            </td>
    </tr>
	<?php
}
?>