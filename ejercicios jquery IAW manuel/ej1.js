/* Rellena este fichero */
$(document).ready(function () {
    $("#btn-ocultar").click(function (e) { 
        e.preventDefault();
        $("p").hide();
        $("h1").hide();
    });
    $("#btn-mostrar").click(function (e) { 
        e.preventDefault();
        $("p").show();
        $("h1").show();
    });
});