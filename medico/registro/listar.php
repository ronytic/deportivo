<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listar Informes Médico";
include_once("../../class/informemedico.php");
include_once("../../class/jugador.php");
$informemedico=new informemedico;
$jugador=new jugador;
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de los Registros Médicos</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
          		Datos del Jugador:
			  <label for="Nombre">Nombres</label>
			  <input type="text" name="Nombres" id="Nombre" size="10"/>
              <label for="Observacion">Paterno</label>
			  <input type="text" name="Paterno" id="Observacion" size="10"/>
              <label for="Observacion">Habil</label>
			  <select name="habil"><option value="">Seleccionar</option><option value="1">Si</option><option value="0">No</option></select>
              
				<hr />
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
            foreach($informemedico->mostrarTodo(10) as $al){$i++;
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
                        <a href="eliminar.php?Cod=<?php echo $al['CodInformeMedico']?>" class="botonSec corner-all eliminar">Eliminar</a>
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