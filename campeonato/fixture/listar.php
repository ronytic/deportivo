<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listar de los Fixture";
include_once("../../class/club.php");
include_once("../../class/fixture.php");

$fixture=new fixture;
$club=new club;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de los Fixture</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombre de Fixture</label>
			  <input type="text" name="Nombre" id="Nombre" size="10"/>

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
                    <td>Nombre Fixture</td>
                    <td>Cantidad de Fechas</td>
                </tr>
            <?php
			$i=0;
            foreach($fixture->mostrarFixture() as $al){$i++;
				
				//$c1=array_shift($club->mostrarTodo(0,"CodClub=".$al['CodEquipo1']));
				//$c2=array_shift($club->mostrarTodo(0,"CodClub=".$al['CodEquipo2']));
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombre']?></td>
                    <td class="der"><?php echo $al['Cantidad']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodClub']?>">Modificar</a>
                        <a href="../../reportes/fixture.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all" rel="<?php echo $al['CodClub']?>">Impresión</a>
                        <a href="eliminar.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodClub']?>">Eliminar</a>
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
<?php include_once("../../pie.php");?>