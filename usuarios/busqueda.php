<?php
include_once("../login/check.php");
$folder="../";
include_once("../class/usuarios.php");
$nombres=$_POST['Nombres'];
$paterno=$_POST['Paterno'];
$materno=$_POST['Materno'];
$nick=$_POST['Nick'];
$usuario=$_POST['Usuario'];

$condicion="Nombres LIKE '%$nombres%' and Paterno LIKE '%$paterno%' and Materno LIKE '%$materno%' and Nick LIKE '%$nick%' and Usuario LIKE '%$usuario%'";
$usuarios=new usuarios;

?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Nombre</td>
                    <td>Paterno</td>
                    <td>Materno</td>
                    <td>Nick</td>
                    <td>Usuario</td>
                    <td>Nivel</td>
                </tr>
            <?php
			$i=0;
            foreach($usuarios->mostrarTodo(0,$condicion) as $al){$i++;
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombres']?></td>
                    <td><?php echo $al['Paterno']?></td>
                    <td><?php echo $al['Materno']?></td>
                    <td><?php echo $al['Nick']?></td>
                    <td><?php echo $al['Usuario']?></td>
                    <td><?php switch($al['Nivel']){
							case 1:{echo "Administrador";}break;
							case 2:{echo "Presidente";}break;
							case 3:{echo "Coordinador";}break;
							case 4:{echo "Médico";}break;
							case 5:{echo "Presidente Club";}break;
							case 6:{echo "Comite Técnico";}break;
							case 7:{echo "Jugador";}break;
							case 8:{echo "Encargado de Campo";}break;
							}?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodUsuario']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Modificar</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodUsuario']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>