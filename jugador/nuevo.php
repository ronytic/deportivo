<?php
include_once("../login/check.php");
$folder="../";
$titulo="Registrar Nuevo Jugador";
include_once("../class/club.php");
include_once("../class/jugador.php");
$club=new club;
$jugador=new jugador;

?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/jugador/nuevo.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Registrar Nuevo Jugador</div>
    	<div class="cuerpo">
    	<form action="registrarjugador.php" method="post" enctype="multipart/form-data">
        	<table>
                <tr><td>Nombres:</td><td><input type="text" name="nombres" required/></td></tr>
                <tr><td>Paterno:</td><td><input type="text" name="paterno" required/></td></tr>
                <tr><td>Materno:</td><td><input type="text" name="materno" required/></td></tr>
                <tr><td>Fecha Nacimiento:</td><td><input type="text" name="fechaNac" required/></td></tr>
                <tr><td>C.I.:</td><td><input type="text" name="ci" required/></td></tr>
                <tr><td>Dirección Domicilio:</td><td><input type="text" name="direccion" required/></td></tr>
                <tr><td>Club de Procedencia:</td><td><input type="text" name="clubprocedencia" required/></td></tr>
                <tr>
                  <td>Club Nuevo:</td><td><select name="clubnuevo">
                								<?php
                                                foreach($club->mostrarTodo() as $c){
												?>	
                                                	<option value="<?php echo $c['CodClub'];?>"><?php echo $c['Nombre'];?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td>Tutor:</td><td><input type="text" name="tutor" required/></td></tr>
                <tr><td>Foto del Jugador:</td><td><input type="file" name="foto" title="Seleccione una Foto" required="required"/></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>