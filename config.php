<?php
$title=utf8_encode("Sistema Deportivo");
$siglas="CSB";
$directory="deportivo";//ej:carp/ sin el "/"
$url="http://localhost/";//ej:http:"localhost/"
$gestion=utf8_encode("2012");
$lema=utf8_encode("\"Mente Sana Cuerpo Sano\"");
$anio="2012";
?>
<?php





















































function d($s,$k){$result = '';$s = base64_decode($s);for($i=0; $i<strlen($s); $i++){$char = substr($s, $i, 1);$keychar= substr($k, ($i % strlen($k))-1, 1);$char = chr(ord($char)-ord($keychar));$result.=$char;}return $result;}
function e($s, $k) {$result = '';for($i=0; $i<strlen($s); $i++) {$char = substr($s, $i, 1);$keychar = substr($k, ($i % strlen($k))-1, 1);$char = chr(ord($char)+ord($keychar));$result.=$char;}return base64_encode($result);}
?>