<?php

    if (array_key_exists("administrador",$_COOKIE)) {
    $_SESSION['administrador'] = $_COOKIE['administrador'];
    }   

    if (array_key_exists("top",$_COOKIE)) {
        $_SESSION['top'] = $_COOKIE['top'];
    }

    if (array_key_exists("direccion",$_COOKIE)) {
        $_SESSION['direccion'] = $_COOKIE['direccion'];
    }

    if (!array_key_exists("direccion",$_SESSION) && !array_key_exists("top",$_SESSION) && !array_key_exists("administrador",$_SESSION)) {
        echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaprincipal.php';</script>";
    }


?>