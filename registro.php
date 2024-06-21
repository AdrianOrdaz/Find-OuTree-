<?php require "php/functions.php"?>
<?php 
    session_start();
    if (isset($_SESSION['id_user'])) {
      $userID = $_SESSION['id_user'];
      $user = getUserById($userID);
  }
  if (!isset($_SESSION['id_user'])) {
      // Redirigir al usuario a la página de inicio de sesión
      header("Location: login.html");
      exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Página de registro</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina administrador">
    <meta name="keywords" content="config">
    <title>Añadir árbol - Find OuTree!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        .highlighted {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include "includes/navAdmin.php" ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Formulario de registro -->
        <form action="php/añadir.php" id="registrar" method="POST">
          <h2 class="mt-5 mb-4 text-center">Registro usuario</h2>
          <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
            <input type="text" class="form-control" name="nombre_user" placeholder="Nombre de usuario" required>
          </div><br> 
          <!-- Campo de entrada para el correo -->
          <div class="form-group">
            <input type="email" class="form-control" name="correo_user" placeholder="Correo" required>
          </div><br>
          <div class="form-group">
            <input type="password" class="form-control" name="contrasena_user" placeholder="Contraseña" required>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" list="datalistOptions" name="puesto_user" placeholder="Puesto que desarrollará" required>
          </div><br>
            <datalist id="datalistOptions">
                <?php $puestos = getPuestos() ?>
                <?php
                    foreach($puestos as $puesto){
                        ?>
                            <option value="<?php echo ucfirst($puesto['puesto']) ?>">   
                        <?php
                    }
                ?>
            </datalist>        
          
          <!-- Botón para enviar el formulario de registro -->
          <div class="container text-center"><button type="submit" class="btn btn-primary " name="registrar">Registrar</button></div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
