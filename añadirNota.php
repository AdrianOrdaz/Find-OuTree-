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
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina administrador">
    <meta name="keywords" content="config">
    <title>Añadir nota - Find OuTree!</title>
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
        <form action="php/añadir.php" id="añadirNota" method="POST">
          <h2 class="mt-5 mb-4 text-center">Añadir nota</h2>
          <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
            <input type="text" class="form-control" name="titulo" placeholder="Titulo de la nota" required>
          </div><br> 
          <!-- Campo de entrada para el correo -->
          <div class="form-group">
            <input type="text" class="form-control" name="medio" placeholder="Medio que lo publica" required>
          </div><br>
          <div class="mb-3">
            <label for="exampleFormControlTextarea2" class="form-label">Descripcion</label>
            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea2" rows="3"></textarea>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control"  name="link" placeholder="Link a la nota" required>
          </div><br>
          <div class="mb-3">
            <label for="formFile" class="form-label">Imagen de portada</label>
            <input class="form-control" type="file" onchange="showname('formFile','test')" id="formFile">
            <input type="hidden" class="form-control" id="test" name = "imagen" value="" readonly>
            <script>
                function showname(elID,elOtro) {
                    var name = document.getElementById(elID); 
                    document.getElementById(elOtro).value = name.files.item(0).name;
                };

            </script>
            
            </div>      
          
          <!-- Botón para enviar el formulario de registro -->
          <div class="container text-center"><button type="submit" class="btn btn-primary " name="añadirNota">Añadir</button></div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
