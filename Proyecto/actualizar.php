<?php 

include("db.php");

if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
      $query="SELECT * FROM incidencias WHERE id = $incidenciaid ";
      $resultado= mysqli_query($enlace,$query);

      while($fila = mysqli_fetch_assoc($resultado))
        {
          $id = $fila['id'];                
          $planta = $fila['planta'];        
          $aula = $fila['aula'];         
          $descripcion = $fila['descripcion'];        
          $fecha_de_alta = $fila['fecha_de_alta'];        
          $fecha_de_revision = $fila['fecha_de_revision'];        
          $fecha_de_resolucion = $fila['fecha_de_resolucion'];        
          $comentario = $fila['comentario'];
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $fecha_de_alta = htmlspecialchars($_POST['fecha_de_alta']);
      $fecha_de_revision = htmlspecialchars($_POST['fecha_de_revision']);
      $fecha_de_resolucion = htmlspecialchars($_POST['fecha_de_resolucion']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_de_alta = '{$fecha_de_alta}', fecha_de_revision = '{$fecha_rev}', fecha_de_resolucion = '{$fecha_de_resolucion}', comentario = '{$comentario}' WHERE id = {$id}";
      $sentencia = mysqli_query($enlace, $query);
      if (!$sentencia)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "La incidencia se ha actualizado correctamente";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
</style>
<body>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Planta</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="planta" value="<?php echo $planta  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Aula</label>
    <input type="text" class="form-control" name="aula" value="<?php echo $aula  ?>" id="exampleInputEmail1" aria-describedby="emailHelp">  
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="descripcion" value="<?php echo $descripcion  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de alta</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha_de_alta" value="<?php echo $fecha_de_alta  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de revisión</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha_de_revision" value="<?php echo $fecha_de_revision  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de resolución</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha_de_resolucion" value="<?php echo $fecha_de_resolucion  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Comentario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="comentario" value="<?php echo $comentario  ?>">
  </div>
  <button type="submit" class="btn btn-primary" value="editar" name="editar">Actualizar</button>
</form>
<div class="container text-center mt-5">
      <a href="https://iawmanuelarcos-com.stackstaging.com/proyecto/paginaprincipal.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

</body>
</html>