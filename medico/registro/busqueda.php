<?php
include_once("../../login/check.php");
$folder="../";
include_once("../../class/informemedico.php");
include_once("../../class/jugador.php");
$informemedico=new informemedico;
$jugador=new jugador;
$nombre=$_POST['Nombres'];
$paterno=$_POST['Paterno'];
$habil=$_POST['habil'];
$condicion="Nombres LIKE '%$nombre%' and Paterno LIKE '%$paterno%' ";

?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Nombre Jugador</td>
                    <td>Peso</td>
                    <td>Estatura</td>
                    <td>Presion</td>
                    <td>Tipo de Sangre</td>
                    <td>Accidentes</td>
                    <td>Enfermedades</td>
                </tr>
            <?php
			$i=0;
			$j=$jugador->mostrarTodo(0,$condicion);
			if(count($j)>=2){
				$da=array();
				foreach($j as $ju){
					array_push($da,$ju['CodJugador']);
				}
				$cond="CodJugador IN (".implode(",",$da).")";
			}else{
				$j=array_shift($j);
				$cond="CodJugador=".$j['CodJugador'];	
			}
			
            foreach($informemedico->mostrarTodo(0,$cond." and Habil LIKE '%$habil%'") as $al){$i++;
				$j=$jugador->mostrarTodo(0,"CodJugador=".$al['CodJugador']);
				$j=array_shift($j);
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $j['Nombres']." ".$j['Paterno']." ".$j['Materno']?></td>
                    <td><?php echo $al['Peso']?></td>
                    <td><?php echo $al['Estatura']?></td>
                    <td><?php echo $al['Presion']?></td>
                    <td><?php echo $al['TipoSangre']?></td>
                    <td><?php echo $al['Accidentes']?></td>
                    <td><?php echo $al['Enfermedades']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodInformeMedico']?>" class="botonSec corner-all modificar">Modificar</a>
                        <a href="../../reportes/informemedico.php?Cod=<?php echo $al['CodInformeMedico']?>" class="botonSec corner-all">Impre.</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodInformeMedico']?>" class="botonSec corner-all eliminar">Elim.</a>
                    </td>
                </tr>
                <?php	
			}
			
			
			/////////
			/*$cam=pg_query ("select * from in_recidencial order by id_inmueble desc limit 1");
	while($fila=pg_fetch_array($cam)){
$ida = $fila['id'];
}
$num=$ida+1;*/
			?>