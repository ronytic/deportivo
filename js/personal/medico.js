$(document).ready(function(e) {
    $("input[name=fechaNac]").datepicker({"changeMonth":true,"changeYear":true,yearRange:"c-100:c+0", maxDate: "-22Y" });
});