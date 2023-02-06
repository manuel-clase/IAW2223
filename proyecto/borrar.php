<?php 

    include "db.php";

    if (mysqli_connect_error()) {
        die("Error en la conexión");
    }
    else {

    if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencias WHERE id = {$id}"; 
         $resultado= mysqli_query($enlace, $query);
         echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaprincipal.php';</script>";
     }
    }
?>