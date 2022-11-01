function EuroDolar() {

    var dinero1 = document.getElementById("dinero").value;
    var dinero2;

    if(dinero1<0) {
        document.getElementById("resultado").innerHTML="El número que ha introducido es negativo"
    }
        else {
            dinero2 = dinero1*0.99;
            document.getElementById("resultado").innerHTML=" "+dinero2+" $"
        }
}