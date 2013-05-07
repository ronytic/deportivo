<?php
include_once("../login/check.php");
$folder="../";
$titulo="Modificar Datos de  Usuario";
$cod=$_GET['Cod'];
include_once("../class/usuarios.php");
$usuarios=new usuarios;
$u=array_shift($usuarios->mostrarTodo(0,"CodUsuario=".$cod));
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/medico/personal.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="titulo">Modificar Datos de Usuario</div>
    	<div class="cuerpo">
    	<form action="guardarusuario.php" method="post"><input type="hidden" name="Cod" value="<?php echo $cod?>" />
        	<table>
            	<tr><td>Nombres:</td><td><input type="text" name="nombres" required value="<?php echo $u['Nombres'];?>"/></td></tr>
                <tr><td>Apellido Paterno:</td><td><input type="text" name="paterno" required value="<?php echo $u['Paterno'];?>"/></td></tr>
                <tr><td>Apellido Materno:</td><td><input type="text" name="materno" required/ value="<?php echo $u['Materno'];?>"></td></tr>
                <tr><td>Nick(SobreNombre):</td><td><input type="text" name="nick" required value="<?php echo $u['Nick'];?>"/></td></tr>
                <tr><td>Usuario:</td><td><input type="text" name="usuario" required value="<?php echo $u['Usuario'];?>"/></td></tr>
                <tr><td>Nivel:</td><td><select name="nivel">
                							<option value="0" <?php echo $u['Nivel']==0?'selected="selected"':'';?>>Seleccionar Nivel</option>
                                            <option value="1" <?php echo $u['Nivel']==1?'selected="selected"':'';?>>Administrador</option>
                                            <option value="2" <?php echo $u['Nivel']==2?'selected="selected"':'';?>>Presidente</option>
                                            <option value="3" <?php echo $u['Nivel']==3?'selected="selected"':'';?>>Coordinador</option>
                                            <option value="4" <?php echo $u['Nivel']==4?'selected="selected"':'';?>>Medico</option>
                                            <option value="5" <?php echo $u['Nivel']==5?'selected="selected"':'';?>>Presidente Club</option>
                                            <option value="6" <?php echo $u['Nivel']==6?'selected="selected"':'';?>>Comite Técnico</option>
                                            <option value="7" <?php echo $u['Nivel']==7?'selected="selected"':'';?>>Jugador</option>
                                            <option value="8" <?php echo $u['Nivel']==8?'selected="selected"':'';?>>Encargado de Campo</option>
                                       </select></td></tr>
                
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>