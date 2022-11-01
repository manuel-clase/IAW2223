function calcularDNI() {

    var numeros = document.getElementById("inputDNI").value;
    var numerosAceptados = /^[0-9]+$/
    var longitud = numeros.length;

    if (longitud != 8) {
        document.getElementById("resultado").innerHTML = "Debe añadir 8 carácteres";
    }
    else if (numeros.match(numerosAceptados)) {
        var letra;
        var resultado = numeros % 23;
        let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        letra = letras[resultado];
        document.getElementById("resultado").innerHTML = letra;
    }

}