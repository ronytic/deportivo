$(document).ready(function(e) {
	$("#ver").click(function(e) {
        var categoria=$("#nombre").val();
		$.post("mostrarEquipos.php",{'Nombre':categoria},respuesta);
    });
	function respuesta(data){
		$("#continuar").html(data);
		
	}
	$(".g1").change(cambio1);
	cambio1();
	cambio2();
	function cambio1(){
		var valor=0;
		$(".g1").each(function(index, element) {
            valor+=parseInt($(this).val());
        });
		$("#r1").val(valor);
	}
	$(".g2").change(cambio2);
	function cambio2(){
		var valor=0;
		$(".g2").each(function(index, element) {
            valor+=parseInt($(this).val());
        });
		$("#r2").val(valor);
	}
});