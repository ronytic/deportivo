<?php
include_once("../login/check.php");
$folder="../";
$titulo="Listar Usuarios";
include_once("../class/usuarios.php");

$usuarios=new usuarios;

?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.form.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de los Usuarios</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombres</label>
			  <input type="text" name="Nombres" id="Nombre" size="10"/>
              <label for="p">Paterno</label>
			  <input type="text" name="Paterno" id="p" size="10"/>
              <label for="m">Materno</label>
			  <input type="text" name="Materno" id="m" size="10"/><hr />
              <label for="n">Nick</label>
			  <input type="text" name="Nick" id="n" size="10"/>
              <label for="u">Usuario</label>
			  <input type="text" name="Usuario" id="u" size="10"/>
			
              <input type="submit" value="Buscar" class="corner-all"/><input type="reset" value="Borrar Busqueda" class="corner-all"/>
		  </form>
      </div>
    </div>
    <div class="clear"></div>
	<div class="prefix_1 grid_10 suffix_1">
    	<div class="cuerpo" id="">
    		<table class="tabla" id="resultado">
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
            foreach($usuarios->mostrarTodo(10) as $al){$i++;
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
                        <a href="modificarpass.php?Cod=<?php echo $al['CodUsuario']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Cambiar Clave</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodUsuario']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>