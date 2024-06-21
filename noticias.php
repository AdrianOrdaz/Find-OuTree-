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
    <title>Admin Find OuTree!</title>
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
    <br>
    <div class="container text-center">
        <br>
        <div class="row">
            <div class="col"></div>
            <div class="col-12"><br>
                <h3 class="p-3 bg-success bg-opacity-25 ">Todos los árboles publicados</h3>
                <?php $news = showNews()?>
                <table class="table">
                        <thead>
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Medio</th>
                                <th scope="col">Acciones</th>
                            </tr>   
                        </thead>
                        <tbody class="table-group-divider">
                    <?php
                        foreach($news as $new){
                            ?>
                            <tr>
                            <th scope="row"><?php echo $new['id_new']?></th>
                            <td><?php echo $new['title_new']?></a></td>
                            <td><?php echo $new['network_new']?></td>
                            <td><a href="editarNota.php?id_new=<?php echo urlencode($new['id_new'])?>"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="PHP/eliminar.php?id=<?php echo $new['id_new']?>&tabla=<?php echo "noticias" ?>&test=<?php echo "id_new" ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');"><button type="button" class="btn btn-danger">Eliminar</button></form></td>
                            </tr>          
                            <?php
                        }
                            ?>
                        </tbody>
                    </table>
                    <a href="añadirNota.php"><button type="button" class="btn btn-success" >Añadir noticia</button>  </a> 
            </div><br>
        </div>
        <div class="col"></div>
        </div><br>
    </div>


</body>
</html>