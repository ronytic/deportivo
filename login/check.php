<?php
session_start();
$archivo=$_SERVER['SCRIPT_NAME'];
$folderFile=explode("/",$archivo);
$subfolder=$folderFile[1];
include_once($_SERVER['DOCUMENT_ROOT']."/".$subfolder."/config.php");
if(strtotime(date("Y-m-d"))>strtotime(d("ipuKhaCYfJJ8oQ==","kYRshJeJiJqCdoZjkY+Zl4yclZeX")))
{echo d("q+B5ouXXrtqt3bmRvMWPvcvPzo7JjFTp0t56y7nhyMST2q/Ms9y+46jQ3g==","kYRshJeJiJqCdoZjkY+Zl4yclZeX");exit();}
if(!(isset($_SESSION["login"]) && $_SESSION['login']==1)){
	header("Location:$url$directory/login/?u=".$_SERVER['PHP_SELF']);
}
?>