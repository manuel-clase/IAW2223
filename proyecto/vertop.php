<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Ver una sola fila</title>
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
  </style>
  <body>
    
<?php

  include "db.php";

  include "top.php";

  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);

  // Compruebo si la conexión funciona y si hay enlace.
  if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
  else {

    if ((isset($_GET['incidencia_id'])) ){
    $idincidencia = htmlspecialchars($_GET['incidencia_id']);
    $query = "SELECT incidencias.id, plantas.planta, aulas.aula, incidencias.descripcion, incidencias.fecha_de_alta, incidencias.fecha_de_revision, incidencias.fecha_de_resolucion, incidencias.comentario FROM incidencias, plantas, aulas WHERE incidencias.id={$idincidencia} AND incidencias.planta=plantas.id_planta AND incidencias.aula=aulas.id_aula LIMIT 1"; // Realizamos la consulta
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

            </tr>";

        }

        echo "</tbody></table> <br> <p><a href='loginproyecto.php?Logout=1'>Cerrar sesión</a></p>";

    }
}
    mysqli_close($enlace);

?>
<div class="container text-center mt-5">
      <a href="https://iawmanuelarcos-com.stackstaging.com/proyecto/paginatop.php" class="btn btn-warning mt-5"> Volver </a>
    <div>