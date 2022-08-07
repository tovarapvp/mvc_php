<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php require 'views/header.php' ?>
  <div id="main">
    <h1 class="center">Detalle</h1>
    <div class="center">
      <?php echo $this->mensaje; ?> 
    </div>
    <form action="<?php echo constant('URL'); ?>consulta/actualizarAlumno" method="post">
    <p><label for="matricula">Matricula</label><br />
      <input type="text" name="matricula" id="" value="<?php echo $this->alumno->matricula; ?>">
    </p>
    <p><label for="nombre">Nombre</label><br />
      <input type="text" name="nombre" id="" value="<?php echo $this->alumno->nombre; ?>" >
    </p>
    <p><label for="Apellido">Apellido</label><br />
      <input type="text" name="apellido" id=""value="<?php echo $this->alumno->apellido; ?>" >
    </p>
    <p><input type="submit" value="actualizar "></p>
  </form>
</div>

  <?php require 'views/footer.php' ?>
</body>

</html>