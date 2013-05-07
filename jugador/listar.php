<?php
include_once("../login/check.php");
$folder="../";
$titulo="Listar Jugadores";
include_once("../class/jugador.php");
include_once("../class/club.php");

$jugador=new jugador;
$club=new club;

?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.form.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de los Jugadores</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombres</label>
			  <input type="text" name="Nombre" id="Nombre" size="10"/>
              <label for="Observacion">Paterno</label>
			  <input type="text" name="Paterno" id="Observacion" size="10"/>
				<label for="ci">C.I.</label>
			  <input type="text" name="Ci" id="ci" size="10"/>
              <label for="club">Club</label>
              <select id="club" name="Club"><option value="">Seleccionar..</option>
				  <?php foreach($club->mostrarTodo(0) as $c){
						?><option value="<?php echo $c['CodClub']?>"><?php echo $c['Nombre']?></option>
                        <?php  
					}?>              
              </select>

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
                    <td>Nombres</td>
                    <td>Paterno</td>
                    <td>Materno</td>
                    <td>C.I.</td>
                    <td>Club de Procedencia</td>
                    <td>Club Actual</td>
                </tr>
            <?php
			$i=0;
            foreach($jugador->mostrarTodo(10) as $al){$i++;
				$c=$club->mostrarTodo(0,"CodClub=".$al['CodClubNuevo']);
				$c=array_shift($c);
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombres']?></td>
                    <td><?php echo $al['Paterno']?></td>
                    <td><?php echo $al['Materno']?></td>
                    <td><?php echo $al['Ci']?></td>
                    <td><?php echo $al['ClubProcedencia']?></td>
                    <td><?php echo $c['Nombre']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodJugador']?>" class="botonSec corner-all modificar">Modificar</a>
                        <a href="../reportes/jugador.php?Cod=<?php echo $al['CodJugador']?>" class="botonSec corner-all">Impresión</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodJugador']?>" class="botonSec corner-all eliminar">Eliminar</a>
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