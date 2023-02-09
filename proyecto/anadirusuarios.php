<?php

    include "top.php";

    header("Content-type:text/html;charset=utf-8");
    if (array_key_exists('username',$_POST) OR
    array_key_exists('password',$_POST)) {

        $servidor = "shareddb-y.hosting.stackcp.net";
        $bd = "proyectoManuel-313539e15e";
        $usuario = "pacomaestre";
        $password = "Usuario1/";
    
        $enlace = mysqli_connect($servidor, $usuario, $password, $bd); 
        if (mysqli_connect_error()) {
            die("Error en la conexión");
        }
        if ($_POST['username']=='') {
            echo "<p> El campo usuario es obligatorio </p>";
        }
        else if ($_POST['password']=='') {
            echo "<p> El campo password es obligatorio </p>";
        }
        else {
            $query = "SELECT username FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."'";
            $result = mysqli_query($enlace,$query);
            if (mysqli_num_rows($result)>0) {
                echo "<p> El nombre de usuario que ha elegido ya existe, eliga otro </p>";
            }
            else {
                $usuario = htmlspecialchars($_POST['username']);
                $pass = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);
                $rol = htmlspecialchars($_POST['rol']);
                $rolmayus = strtoupper($rol);
                //Añadimos al usuario
                //Ciframos la contrasena
                $contra = $pass;
                $cifrada = md5($contra);
                $query="INSERT INTO usuarios (username, password, rol, email) VALUES('{$usuario}','".$cifrada."', (SELECT id_rol FROM roles WHERE UPPER(roles.rol)='{$rolmayus}'), '{$email}')";
                if (mysqli_query($enlace,$query)){
                    echo "<p> El usuario ha sido añadido con éxito</p>";
                }

                else {
                    echo "<p> El usuario no se ha creado correctamente </p>";
                }
        }   
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir usuarios</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
        body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
        }

        #profile-img {
            height:180px;
    }
        .h-80 {
             height: 80% !important;
        }
</style>
<body>

<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form  class="form-signin" method="post">
                
                <input type="text" name="username" id="inputPassword" class="form-control form-group" placeholder="Usuario" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="Contraseña" required autofocus>
                <input type="email" name="email" id="inputPassword" class="form-control form-group" placeholder="Email" required autofocus>
                <select name="rol" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Direccion">Dirección</option>
                    <option value="Profesor">Profesor</option>
                </select>
                <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="crearCuenta()" type="submit">Añadir usuario</button>
                <div class="container text-center mt-5">
                <a href="https://iawmanuelarcos-com.stackstaging.com/proyecto/paginatop.php" class="btn btn-warning mt-5"> Volver </a>
                <div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>