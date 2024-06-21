<?php require "php/functions.php"?>
<?php 
    session_start();
    if (isset($_SESSION['id_user'])) {
        $userID = $_SESSION['id_user'];
        $user = getUserById($userID);
        $nivel = $user[0]['puesto'];
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
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <h1>Bienvenido, <?php echo $user[0]['user_name'] ?> </h1>
            </div>
            <div class="col"></div>
        </div><br>
        <div class="row">
            <div class="col"></div>
            <div class="col-12"><br>
                <h3 class="p-3 bg-success bg-opacity-25 ">Árboles registrados</h3>
                <?php $trees = showSomeTrees(5,"arboles.tree_name")?>
                    <table class="table">
                        <thead>
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Nombre cientifico</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Acciones</th>
                            </tr>   
                        </thead>
                        <tbody class="table-group-divider">
                    <?php
                        foreach($trees as $tree){
                            ?>
                            <tr>
                            <th scope="row"><?php echo $tree['tree_id']?></th>
                            <td><a href="arboles.php?tree_id=<?php echo urlencode($tree['tree_id'])?>" target="_blank"><?php echo $tree['tree_name']?></a></td>
                            <td><?php echo $tree['tree_sciName']?></td>
                            <td><?php echo $tree['user_name']?></td>
                            <td><a href="editarArbol.php?tree_id=<?php echo urlencode($tree['tree_id'])?>"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="PHP/eliminar.php?id=<?php echo $tree['tree_id']?>&tabla=<?php echo "arboles" ?>&test=<?php echo "tree_id" ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');"><button type="button" class="btn btn-danger">Eliminar</button></form></td>
                            </tr>          
                            <?php
                        }
                            ?>
                        </tbody>
                    </table>
                    <a href="añadirArbol.php"><button type="button" class="btn btn-success" >Añadir árbol</button>  </a>    
            </div><br>
            <div class="col"></div>
        </div><br>

        <div class="row">
            <div class="col"></div>
            <div class="col-12"><br>
                <h3 class="p-3 bg-success bg-opacity-25 ">Noticias publicadas</h3>
                <?php $news = showSomeNews(5,"rand()")?>
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
            <div class="col"></div>
        </div><br>
        
        <div class="row" style="display: <?php echo ($nivel!='ADMIN') ? 'none':''; ?>">
            <div class="col"></div>
            <div class="col-12"><br>
                <h3 class="p-3 bg-success bg-opacity-25 ">Usuarios registrados</h3>
                <?php $users = showSomeUsers(5,"users.user_name")?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Acciones</th>
                            </tr>   
                        </thead>
                        <tbody class="table-group-divider">
                    <?php
                        foreach($users as $user){
                            ?>
                            <tr>
                            <th scope="row"><?php echo $user['id_user']?></th>
                            <td><?php echo $user['user_name']?></td>
                            <td><?php echo $user['puesto']?></td>
                            <td><a href="editarUser.php?id_user=<?php echo urlencode($user['id_user'])?>"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="PHP/eliminar.php?id=<?php echo $user['id_user']?>&tabla=<?php echo "users" ?>&test=<?php echo "id_user" ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');"><button type="button" class="btn btn-danger">Eliminar</button></form></td>
                            </tr>          
                            <?php
                        }
                            ?>
                        </tbody>
                    </table>
                    <a href="registro.php"><button type="button" class="btn btn-success">Añadir usuario</button></a>   
            </div><br>
            <div class="col"></div>
        </div><br>
        
        
        
        </div><br>
    </div>


</body>
</html>