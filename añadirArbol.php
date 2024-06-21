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
<html lang="es">
<head>
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
        <form action="php/añadir.php" id="añadir" method="POST">
          <h2 class="mt-5 mb-4 text-center">Añadir árbol</h2>
          <div class="form-group">
            <input type="text" class="form-control" name="tree_name" placeholder="Nombre del árbol" required>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" name="tree_sciName" placeholder="Nombre científico" required>
          </div><br>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
            <textarea class="form-control" name="tree_description" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="short_description" placeholder="Descripción corta" required>
          </div><br>
          <div class="mb-3">
            <label for="exampleFormControlTextarea2" class="form-label">Caracteristicas</label>
            <textarea class="form-control" name="tree_things" id="exampleFormControlTextarea2" rows="3"></textarea>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="mercado_link" placeholder="Enlace compra mercadolibre" required>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" list="datalistOptions" name="zones" placeholder="Zona/Zonas aptas" required>
            <datalist id="datalistOptions">
                <?php $zones = getZones() ?>
                <?php
                    foreach($zones as $zone){
                        ?>
                            <option value="<?php echo ucfirst($zone['zones']) ?>">   
                        <?php
                    }
                ?>
            </datalist>        
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" list="options" name="tree_family" placeholder="Familia perteneciente" required>
          </div><br>
          <datalist id="options">
          <?php $families = getFamilies() ?>
            <?php
                foreach($families as $family){
                    ?>
                        <option value="<?php echo ucfirst($family['tree_family']) ?>">   
                    <?php
                }
            ?>       
        </datalist>
          <div class="form-group">
            <input type="text" class="form-control" name="water_time" placeholder="Necesidad de riego" required>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" name="sun_time" placeholder="Necesidad de sol" required>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" name="tree_color" placeholder="Color de la hoja" required>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" name="height" placeholder="Altura" required>
          </div><br>
          <div class="mb-3">
            <label for="formFile" class="form-label">Imagen de portada</label>
            <input class="form-control" type="file" onchange="showname('formFile','test')" id="formFile">
            <input type="hidden" class="form-control" id="test" name = "image_cover" value="" readonly>
            <script>
                function shownames(elID,elOtro) {
                    var name = document.getElementById(elID);
                    var concatenatedNames = '';
                    Array.prototype.forEach.call(name.files, function(file) { concatenatedNames += file.name; });
                    document.getElementById(elOtro).value = concatenatedNames;
                };
                function showname(elID,elOtro) {
                    var name = document.getElementById(elID); 
                    document.getElementById(elOtro).value = name.files.item(0).name;
                };

            </script>
            
            </div>
            <div class="mb-3">
            <div class="mb-3">
              <label for="formFile1" class="form-label">Imagen de zonas aptas</label>
              <input class="form-control" type="file" onchange="showname('formFile1','test1')" id="formFile1">
              <input type="hidden" class="form-control" id="test1" name = "image_zones" value="" readonly>
            </div>
              <label for="formFileMultiple" class="form-label">Imagenes extras</label>
              <input class="form-control"  type="file" multiple onchange="shownames('formFileMultiple','test2')" id="formFileMultiple">
              <input type="hidden" class="form-control" id="test2" name = "imagenes_extras" value="" readonly>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="autor" readonly  value="<?php echo $user[0]['id_user'] ?>">
            </div>

          <!-- Botón para enviar el formulario de registro -->
          <div class="container text-center"><button type="submit" class="btn btn-primary " name="añadir">Añadir</button></div>
        </form><br>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
