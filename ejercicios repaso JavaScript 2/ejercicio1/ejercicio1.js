function funcionIMC() {

    let peso = document.getElementById("peso").value;
    let altura = document.getElementById("altura").value;
    let noEsnumero=isNaN(altura);
    let noEsnumero2=isNaN(peso);

    if (noEsnumero == true || noEsnumero2 == true){
        document.getElementById("resultado").innerHTML="No ha introducido cifras correctas.";
    }
    else {
        let imc;
        imc = (peso/(altura*altura)) * 10000;

    if (imc < 18.5){
        document.getElementById("resultado").innerHTML = "Su peso es inferior al normal."
    
    }
    else if (imc < 24.9){
        document.getElementById("resultado").innerHTML = "Tiene un peso normal.";
    }
    else if (imc < 29.9){
        document.getElementById("resultado").innerHTML = "Tiene un peso más elevado de lo normal."
    }
    else {
        document.getElementById("resultado").innerHTML = "Tiene obesidad."
    }
    
    }


}