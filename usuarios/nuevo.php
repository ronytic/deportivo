<?php
include_once("../login/check.php");
$folder="../";
$titulo="Registrar Nuevo Usuario";
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/medico/personal.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="titulo">Datos del Nuevo Usuario</div>
    	<div class="cuerpo">
    	<form action="registrarusuario.php" method="post">
        	<table>
            	<tr><td>Nombres:</td><td><input type="text" name="nombres" required/></td></tr>
                <tr><td>Apellido Paterno:</td><td><input type="text" name="paterno" required/></td></tr>
                <tr><td>Apellido Materno:</td><td><input type="text" name="materno" required/></td></tr>
                <tr><td>Nick(SobreNombre):</td><td><input type="text" name="nick" required/></td></tr>
                <tr><td>Usuario:</td><td><input type="text" name="usuario" required/></td></tr>
                <tr><td>Contraseña:</td><td><input type="text" name="contrasena" required/></td></tr>
                <tr><td>Nivel:</td><td><select name="nivel">
                							<option value="0">Seleccionar Nivel</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Presidente</option>
                                            <option value="3">Coordinador</option>
                                            <option value="4">Medico</option>
                                            <option value="5">Presidente Club</option>
                                            <option value="6">Comite Técnico</option>
                                            <option value="7">Jugador</option>
                                            <option value="8">Encargado de Campo</option>
                                       </select></td></tr>
                
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>