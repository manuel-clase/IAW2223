/* Rellena este fichero */
$(document).ready(function () {
    $("#btn-aumentar").click(function (e) { 
        e.preventDefault();
        $("#encabezado, .pares").css({"font-size": "400%", "color": "red"});
    });
    $("#btn-disminuir").click(function (e) { 
        e.preventDefault();
        $("#encabezado, .pares").css({"font-size": "50%", "color": "blue"});
        
    });
});