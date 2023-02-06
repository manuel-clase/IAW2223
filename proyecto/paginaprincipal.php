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

  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);

  // Compruebo si la conexión funciona y si hay enlace.
  if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
  else {

    $query = "SELECT incidencias.id, plantas.planta, aulas.aula, incidencias.descripcion, incidencias.fecha_de_alta, incidencias.fecha_de_revision, incidencias.fecha_de_resolucion, incidencias.comentario FROM incidencias, plantas, aulas WHERE incidencias.planta=plantas.id_planta AND incidencias.aula=aulas.id_aula;"; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query); // Guardamos la respuesta de la consulta en resultado
    echo '
    <table class="table table-dark" id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">
    <thead>
      <tr>
      <th scope="col">ID</th>
      <th scope="col">Planta</th>
      <th scope="col">Aula</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha de alta</th>
      <th scope="col">Fecha de revisión</th>
      <th scope="col">Fecha de resolución</th>
      <th scope="col">Comentario</th>
      <th scope="col" colspan="3" class="text-center">Acciones</th>
      </tr>
    </thead>
  ';
    if ($resultado->num_rows > 0) {
        
        while($fila = $resultado->fetch_assoc())
            echo "<tbody><tr>
  
            <th scope='row'>".$fila["id"]."</th>
        
            <td>".$fila["planta"]."</td>
        
            <td>".$fila["aula"]."</td>
      
            <td>".$fila["descripcion"]."</td>
      
            <td>".$fila["fecha_de_alta"]."</td>
      
            <td>".$fila["fecha_de_revision"]."</td>
      
            <td>".$fila["fecha_de_resolucion"]."</td>
      
            <td>".$fila["comentario"]."</td>

            <td class='text-center'> <a href='ver.php?incidencia_id={$fila["id"]}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>
            <td class='text-center' > <a href='actualizar.php?editar&incidencia_id={$fila["id"]}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>
            <td class='text-center'>  <a href='borrar.php?eliminar={$fila["id"]}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>
        

          </tr>";
    }

    echo "</tbody></table> <br> <p><a href='loginproyecto.php?Logout=1'>Cerrar sesión</a></p>";
    $query = "SELECT COUNT(fecha_de_alta) AS cantidad FROM incidencias;";
      $resultado = mysqli_query($enlace,$query);
      if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($fila = $resultado->fetch_assoc()) {

            $info=($fila["cantidad"]);
            echo "<p>Todas las incidencias: $info</p>";

          }
        }

        $query = "SELECT COUNT(fecha_de_resolucion) AS cantidad FROM incidencias WHERE incidencias.fecha_de_resolucion > 0";
        $resultado = mysqli_query($enlace,$query);
        if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($fila = $resultado->fetch_assoc()) {

            $info2=($fila["cantidad"]);
            echo "<p>Incidencias resueltas: $info2</p>";

        }
    }
          $diferencia = $info - $info2;
         echo "<p>Incidencias faltantes: $diferencia</p>";

  }
    mysqli_close($enlace);
  

?>



<a href="https://iawmanuelarcos-com.stackstaging.com/proyecto/insert.php">Haz click aquí para llegar al menu de insertar filas.</a>



</body>
</body>
</html>
</html>