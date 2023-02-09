<?php 
    include "db.php";


    if (mysqli_connect_error()) {
        die("Error en la conexión");
    }
    else {
        if(isset($_POST['insertar'])){
                $planta = htmlspecialchars($_POST['cogerPlanta']);
                $aula = htmlspecialchars($_POST['cogerAula']);
                $descripcion = htmlspecialchars($_POST['cogerDescripcion']);
                $comentario = htmlspecialchars($_POST['cogerComentario']);
                $fecha_de_alta = htmlspecialchars($_POST['cogerFecha_de_alta']);
                $fecha_de_revision = htmlspecialchars($_POST['cogerFecha_de_revision']);
                $fecha_de_solucion = htmlspecialchars($_POST['cogerFecha_de_resolucion']);

                $plantamayus =  strtoupper($planta);
                $aulamayus =  strtoupper($aula);

                $id = $_COOKIE['id'];


                /*INSERT INTO incidencias (id, planta, aula, descripcion, fecha_de_alta, fecha_de_revision, fecha_de_resolucion, comentario) 
                VALUES (null, (SELECT id_planta FROM plantas WHERE UPPER(planta)='PRIMERA'), 
                (SELECT id_aula FROM aulas WHERE UPPER(aula)='1B'), 
                'aksdnkas', 
                '2023-02-15', 
                '2023-02-15', 
                '2023-02-15', 
                'holita');*/


                $query="INSERT INTO incidencias(planta, aula, descripcion, fecha_de_alta, fecha_de_revision, fecha_de_resolucion, comentario, id_usuario) 
                VALUES(
                (SELECT id_planta FROM plantas WHERE UPPER(planta)='{$plantamayus}'),
                (SELECT id_aula FROM aulas WHERE UPPER(aula)='{$aulamayus}'),
                '{$descripcion}',
                '{$fecha_de_alta}',
                '{$fecha_de_revision}',
                '{$fecha_de_solucion}',
                '{$comentario}',
                '{$id}');";
                
                $sentencia = mysqli_query($enlace,$query);

                if (!$sentencia){
                    echo "<p> No se ha insertado correctamente la fila ". mysqli_error($enlace)."</p>";  
                }

                else {
                    echo "<p>La fila ha sido insertada</p>";
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
    <title>Insertar incidencias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #212F3D;
    }
    label {
        color: white;
    }
    p {
        color: white;
    }
</style>
<body>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Planta</label>
    <input type="text" class="form-control" placeholder="Planta" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerPlanta" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Aula</label>
    <input type="text" class="form-control" placeholder="Aula" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerAula" required>  
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripción</label>
    <input type="text" class="form-control" placeholder="Descripción" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerDescripcion" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de alta</label>
    <input type="date" class="form-control" placeholder="Fecha de alta" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_de_alta" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de revisión</label>
    <input type="date" class="form-control" placeholder="Fecha de revisión" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_de_revision" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de resolución</label>
    <input type="date" class="form-control" placeholder="Fecha de resolución" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_de_resolucion">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Comentario</label>
    <input type="text" class="form-control" placeholder="Comentario" id="exampleInputEmail1" name="cogerComentario">
  </div>
  <button type="submit" class="btn btn-primary" value="insertar" name="insertar">Insertar</button>
</form>
<div class="container text-center mt-5">
      <a href="https://iawmanuelarcos-com.stackstaging.com/proyecto/paginatop.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

</body>
</html>