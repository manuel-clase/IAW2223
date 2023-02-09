<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Pagina principal de las incidencias</title>
  <link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">

  <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #212F3D;
    }
    a {
      color: white;
    }
    p {
      color: white;
    }
  </style>
  <body>
    
<?php

  include "db.php";

  include "admin.php";

  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);

  // Compruebo si la conexión funciona y si hay enlace.
  if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
  else {

    $query = "SELECT usuarios.id, usuarios.username, roles.rol FROM roles, usuarios WHERE usuarios.rol = roles.id_rol;"; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query); // Guardamos la respuesta de la consulta en resultado
    echo '
    <table class="table table-dark" id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">
    <thead>
      <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre de usuario</th>
      <th scope="col">Rol</th>
      <th scope="col" colspan="1" class="text-center">Acciones</th>
      </tr>
    </thead>
  ';
    if ($resultado->num_rows > 0) {
        
        while($fila = $resultado->fetch_assoc())
            echo "<tbody><tr>
  
            <th scope='row'>".$fila["id"]."</th>
        
            <td>".$fila["username"]."</td>
        
            <td>".$fila["rol"]."</td>

            <td class='text-center'>  <a href='borrarusuarios.php?eliminar={$fila["id"]}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>
        

          </tr>";
    }



    echo '</tbody></table> <br> <div class="container text-center mt-5"> <a href="https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaadmin.php" class="btn btn-warning mt-5"> Volver </a> <div>';

  }
    mysqli_close($enlace);
  

?>




</body>
</body>
</html>
</html>