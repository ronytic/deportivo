<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/ayudante.php");
$paterno=$_POST['Paterno'];
$materno=$_POST['Materno'];
$nombres=$_POST['Nombres'];
$ci=$_POST['Ci'];
$especialidad=$_POST['Especialidad'];
$condicion="Nombres LIKE '%$nombres%' and Paterno LIKE '%$paterno%' and Materno LIKE '%$materno%' and Ci LIKE '%$ci%' and Cargo LIKE '%$especialidad%'";
$ayudante=new ayudante;

?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Paterno</td>
                    <td>Materno</td>
                    <td>Nombres</td>
                    <td>C.I.</td>
                    <td>Cargo</td>
                </tr>
            <?php
			$i=0;
            foreach($ayudante->mostrarTodo(0,$condicion) as $al){$i++;
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Paterno']?></td>
                    <td><?php echo $al['Materno']?></td>
                    <td><?php echo $al['Nombres']?></td>
                    <td><?php echo $al['Ci']?></td>
                    <td><?php echo $al['Cargo']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodAyudante']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Modificar</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodAyudante']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>