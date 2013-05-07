$(document).ready(function(e) {
    $("input[name=fechaNac]").datepicker({"changeMonth":true,"changeYear":true,yearRange:"c-100:c+0"});
	$("input[name=ci]").change(function(e) {
        var ci=$(this).val();
		$.post("ci.php",{'ci':ci},function(data){
			if(data!=""){
				alert(data);
			}
		});
    });
});