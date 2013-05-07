<?php
include_once("../login/check.php");
$folder="../";
$titulo="Modificar Contraseña";
$cod=$_SESSION['CodUsuarioLog'];
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
    	<div class="titulo">Datos del Nuevo Usuario</div>
    	<div class="cuerpo">
    	<form action="guardarpass.php" method="post"><input type="hidden" name="Cod" value="<?php echo $cod?>" />
        	<table>
            	<tr><td>Nombres:</td><td><?php echo $u['Nombres'];?> <?php echo $u['Paterno'];?> <?php echo $u['Materno'];?></td></tr>
				<tr><td>Nueva Contraseña</td><td><input type="text" name="pass"/></td></tr>
                
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>