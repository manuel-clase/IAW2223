<?php 

    include "db.php";


    if (mysqli_connect_error()) {
        die("Error en la conexión");
    }
    else {

        if(isset($_GET['eliminar'])) {
        
            if (array_key_exists("administrador",$_COOKIE)) {
                $_SESSION['administrador'] = $_COOKIE['administrador'];
            }

            if (array_key_exists("top",$_COOKIE)) {
                $_SESSION['top'] = $_COOKIE['top'];
            }

            if (array_key_exists("direccion",$_COOKIE)) {
                $_SESSION['direccion'] = $_COOKIE['direccion'];
            }
    
            if (!array_key_exists("administrador",$_SESSION) && !array_key_exists("top",$_SESSION) && !array_key_exists("direccion",$_SESSION)) {
                echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaprincipal.php';</script>";
            }
            else {
                $id= htmlspecialchars($_GET['eliminar']);
                $query = "DELETE FROM incidencias WHERE id = {$id}"; 
                $resultado= mysqli_query($enlace, $query);
                echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginatop.php';</script>";
            }
        }
    }
?>