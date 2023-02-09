<?php

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
            if(isset($_POST['iniciar'])){
            $contra = $_POST['password'];
            $cifrada = md5($contra);
            $query = "SELECT id, username password FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."' LIMIT 1";
            $result = mysqli_query($enlace,$query);
            if ($result) {
                $fila = mysqli_fetch_array($result); //Permite seleccionar una fila
                $id = $fila['id'];
            }  
            if (mysqli_num_rows($result)>0){
                setcookie("id",$id,time()+60*60*24*365);
                $query = "SELECT usuarios.id, usuarios.username, usuarios.password, roles.rol FROM usuarios, roles WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."' AND usuarios.rol = '2' LIMIT 1";
                $result = mysqli_query($enlace,$query);
                if (mysqli_num_rows($result)>0) {
                    setcookie("administrador",mysqli_insert_id($enlace),time()+60*60*24*365);
                    echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaadmin.php';</script>";
                }
                $query = "SELECT usuarios.id, usuarios.username, usuarios.password, roles.rol FROM usuarios, roles WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."' AND usuarios.rol = '5' LIMIT 1";
                $result = mysqli_query($enlace,$query);
                if (mysqli_num_rows($result)>0) {
                    setcookie("top",mysqli_insert_id($enlace),time()+60*60*24*365);
                    echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginatop.php';</script>";
                }
                $query = "SELECT usuarios.username, usuarios.password, roles.rol FROM usuarios, roles WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."' AND usuarios.rol = '3' LIMIT 1";
                $result = mysqli_query($enlace,$query);
                if (mysqli_num_rows($result)>0) {
                    setcookie("direccion",mysqli_insert_id($enlace),time()+60*60*24*365);
                    echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginadireccion.php';</script>";
                }    
                echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaprincipal.php';</script>";
            }
            else {
                echo "<p> El usuario o contraseña que ha introducido no existe </p>";
            }
            
        }   
    }
}
    if (!empty($_GET['Logout']==1)){
        setcookie("id",$id,time()-60*60*24*365);
        setcookie("administrador",mysqli_insert_id($enlace),time()-60*60*24*365);
        setcookie("direccion",mysqli_insert_id($enlace),time()-60*60*24*365);
        setcookie("top",mysqli_insert_id($enlace),time()-60*60*24*365);
        session_destroy();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
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
        p {
            color: red;
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
                <button name="iniciar" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar sesión</button>
                <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="crearCuenta()" type="submit">Crear cuenta</button>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>

<script>
    function crearCuenta() {
        window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/registroproyecto.php';
    }
</script>