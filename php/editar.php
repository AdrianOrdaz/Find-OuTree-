<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos

require 'functions.php';
session_start();
if(isset($_POST['editar'])) {

    // Obtener los valores enviados por el formulario
    $arbolId = $_POST['id_tree'];
    $nombreArbol = $_POST['tree_name'];
    $nCien = $_POST['tree_sciName'];
    $descripcion = $_POST['tree_description'];
    $images = $_POST['imagenes_extras'];
    $short = $_POST['short_description'];
    $things = $_POST['tree_things'];
    $link = $_POST['mercado_link'];
    $zones = $_POST['zones'];
    $family = $_POST['tree_family'];
    $water = $_POST['water_time'];
    $sun = $_POST['sun_time'];
    $height = $_POST['height'];
    $cover = $_POST['image_cover'];
    $izones = $_POST['image_zones'];
    $extras = $_POST['imagenes_extras'];
    $color = $_POST['tree_color'];
    $id = $_POST['autor'];


    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "UPDATE arboles SET tree_name = '$nombreArbol', tree_sciName = '$nCien', description_tree = '$descripcion', tree_images = '$images', tree_things = '$things', zone_image = '$izones', mercado_link = '$link', zones = '$zones', tree_family = '$family', water_time = '$water', sun_time = '$sun', height = '$height', tree_color = '$color', tree_cover = '$cover', short_description = '$short', id_user = '$id' WHERE arboles.tree_id = '$arbolId'";
    $mysqli = dbConnect();
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "<script>alert('Se ha editado la información con exito'); window.location.href = '../AdminArboles.php'</script>";
    } else {
        echo "<script>alert('Ha sucedido un error, intente de nuevo'); window.location.href = '../editarArbol.php'</script>";
    }

}

if(isset($_POST['editarRegistro'])) {

    // Obtener los valores enviados por el formulario
    $userId = $_POST['id_user'];
    $nombreUser = $_POST['nombre_user'];
    $mailUser = $_POST['correo_user'];
    $password = $_POST['contrasena_user'];
    $puesto = $_POST['puesto_user'];


    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "UPDATE users SET user_name = '$nombreUser', user_mail = '$mailUser', password = '$password', puesto = '$puesto' WHERE users.id_user = '$userId'";
    $mysqli = dbConnect();
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "<script>alert('Se ha editado la información con exito'); window.location.href = '../users.php'</script>";
    } else {
        echo "<script>alert('Ha sucedido un error, intente de nuevo'); window.location.href = '../editarUser.php'</script>";
    }

}

if(isset($_POST['editarNota'])) {

    // Obtener los valores enviados por el formulario
    $idNew = $_POST['idNew'];
    $titulo = $_POST['titulo'];
    $medio = $_POST['medio'];
    $des = $_POST['descripcion'];
    $link = $_POST['link'];
    $img = $_POST['imagen'];


    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "UPDATE noticias SET title_new = '$titulo', network_new = '$medio', text_new = '$des', link_new = '$link',img_new = '$img' WHERE noticias.id_new = '$idNew' ";
    $mysqli = dbConnect();
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "<script>alert('Se ha editado la información con exito'); window.location.href = '../noticias.php'</script>";
    } else {
        echo "<script>alert('Ha sucedido un error, intente de nuevo'); window.location.href = '../editarNota.php'</script>";
    }

}

?>
