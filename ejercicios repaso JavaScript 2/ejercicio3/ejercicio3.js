function crearCuenta() {  

    let i = 0;
    let entradas = document.getElementsByTagName("input");

    let pin = document.getElementById("pin").value;
    let pinRepetido = document.getElementById("pinRepetido").value;
    let pinLongitud = pin.length;
    let requeridos = document.querySelectorAll("[required]");
    let algunoFalta=false;
    for (i=0; i < requeridos.length; i++) {
        let requerido = requeridos[i];
        console.log(requerido.id);
        let contenido = requerido.value;
        if (contenido == "") {
            alert("Este es un campo obligatorio = "+ requerido.id);
            algunoFalta=true;
        }
    }
    if (!algunoFalta){
            if (pin != pinRepetido) {
                alert("El pin no coincide con el repetido.")
             }
            else if (pinLongitud != 8) {
                alert("El pin debe ser de 8 carácteres")
            }
            else {                
                var numeros = document.getElementById("dni").value;
                numerosDNI = numeros.substr(0, 8)
                var longitud = numeros.length;
    
                if (longitud != 9) {
                    alert("Debe añadir 8 números y la letra");
                    }
                        else{
                            var letra;
                            var resultado = numerosDNI % 23;
                            let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
                            letra = letras[resultado];
                            let dniCompleto = numerosDNI.concat(letra)
                            if (numeros != dniCompleto) {
                                alert("El dni que ha introducido no es correcto.")
                            }
                            else {
                                telefono = document.getElementById("telefono").value;
                                telefonoLongitud = telefono.length;
                                if (telefonoLongitud != 9) {
                                    alert("El número de telefono que ha introducido no es correcto.");
                                }
                                else{
                                    arroba = document.getElementById("correo").value;
                                    if (arroba.includes("@") == false) {
                                        alert("El correo que ha introducido no es correcto.");
                                    }
                                    else {
                                        alert("La cuenta se ha creado correctamente.")
                                    }
                                }
                                
                            }
        }
    }

        
    

            }
        

    
        }
