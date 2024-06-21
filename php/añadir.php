<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos

require 'functions.php';
session_start();
if(isset($_POST['añadir'])) {

    // Obtener los valores enviados por el formulario
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
    $sql = "INSERT INTO arboles (tree_id,tree_name,tree_sciName,description_tree,tree_images,tree_things,zone_image,mercado_link,zones,tree_family,water_time,sun_time,height,tree_color,tree_cover,short_description,id_user) VALUES  (null, '$nombreArbol', '$nCien', '$descripcion', '$images', '$things', '$izones', '$link', '$zones', '$family', '$water', '$sun', '$height', '$color', '$cover', '$short', '$id')";
    $mysqli = dbConnect();
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "<script>alert('Se ha cargado la información con exito'); window.location.href = '../AdminArboles.php'</script>";
    } else {
        echo "<script>alert('Ha sucedido un error, intente de nuevo'); window.location.href = '../añadirArbol.php'</script>";
    }

}

if(isset($_POST['registrar'])) {

    // Obtener los valores enviados por el formulario
    $nombreUser = $_POST['nombre_user'];
    $mailUser = $_POST['correo_user'];
    $password = $_POST['contrasena_user'];
    $puesto = $_POST['puesto_user'];

    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "INSERT INTO users (id_user,user_name,user_mail,password,puesto) VALUES  (null, '$nombreUser', '$mailUser', '$password', '$puesto')";
    $mysqli = dbConnect();
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "<script>alert('Se ha cargado la información con exito'); window.location.href = '../users.php'</script>";
    } else {
        echo "<script>alert('Ha sucedido un error, intente de nuevo'); window.location.href = '../registro.php'</script>";
    }

}

if(isset($_POST['añadirNota'])) {

    // Obtener los valores enviados por el formulario
    $titulo = $_POST['titulo'];
    $medio = $_POST['medio'];
    $des = $_POST['descripcion'];
    $link = $_POST['link'];
    $img = $_POST['imagen'];

    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "INSERT INTO noticias (id_new,title_new,network_new,text_new,img_new,link_new) VALUES  (null, '$titulo', '$medio', '$des', '$img' ,'$link')";
    $mysqli = dbConnect();
    $resultado = $mysqli->query($sql);

    if ($resultado === TRUE) {
        echo "<script>alert('Se ha cargado la información con exito'); window.location.href = '../noticias.php'</script>";
    } else {
        echo "<script>alert('Ha sucedido un error, intente de nuevo'); window.location.href = '../añadirNota.php'</script>";
    }

}


?>