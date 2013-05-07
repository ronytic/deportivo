<?php
include_once("../login/check.php");
$folder="../";
$titulo="Modificar Datos Jugador";
include_once("../class/club.php");
include_once("../class/jugador.php");
$cod=$_GET['Cod'];
$club=new club;
$jugador=new jugador;
$j=$jugador->mostrarTodo(0,"CodJugador=".$cod);
$j=array_shift($j);
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/jugador/nuevo.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Modificar Jugador</div>
    	<div class="cuerpo">
    	<form action="guardarjugador.php" method="post" enctype="multipart/form-data"><input type="hidden" value="<?php echo $cod;?>" name="Cod" />
        	<table>
                <tr><td>Nombres:</td><td><input type="text" name="nombres" required value="<?php echo $j['Nombres']?>"/></td></tr>
                <tr><td>Paterno:</td><td><input type="text" name="paterno" required value="<?php echo $j['Paterno']?>"/></td></tr>
                <tr><td>Materno:</td><td><input type="text" name="materno" required value="<?php echo $j['Materno']?>"/></td></tr>
                <tr><td>Fecha Nacimiento:</td><td><input type="text" name="fechaNac" required value="<?php echo $j['FechaNac']?>"/></td></tr>
                <tr><td>C.I.:</td><td><input type="text" name="ci" required value="<?php echo $j['Ci']?>"/></td></tr>
                <tr><td>Dirección Domicilio:</td><td><input type="text" name="direccion" required value="<?php echo $j['Direccion']?>"/></td></tr>
                <tr><td>Club de Procedencia:</td><td><input type="text" name="clubprocedencia" required value="<?php echo $j['ClubProcedencia']?>"/></td></tr>
                <tr>
                  <td>Club Nuevo:</td><td><select name="clubnuevo">
                								<?php
                                                foreach($club->mostrarTodo() as $c){
												?>	
                                                	<option value="<?php echo $c['CodClub'];?>"<?php echo $c['CodClub']==$j['CodClubNuevo']?'selected="selected"':'';?>><?php echo $c['Nombre'];?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td>Tutor:</td><td><input type="text" name="tutor" required value="<?php echo $j['Tutor']?>"/></td></tr>
               	<tr><td>Foto del Jugador:</td><td><input type="file" name="foto" title="Seleccione una Foto" required="required"/></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>