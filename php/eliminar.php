<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos

require 'functions.php';

    // Obtener los valores enviados por el formulario
    
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $registro = $_GET['test'];

    $mysqli = dbConnect(); 
    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    if($tabla == 'users'){
        $sql = "UPDATE arboles SET id_user = '0' WHERE arboles.id_user = '$id'";
        $mysqli->query($sql);
        $sql2 = "DELETE FROM $tabla WHERE $tabla.$registro =  '$id'"; 
        $mysqli->query($sql2);
        header("Location: ../vistaAdmin.php");
    }else{
       $sql = "DELETE FROM $tabla WHERE $tabla.$registro =  '$id'";
        $mysqli->query($sql);
        header("Location: ../vistaAdmin.php"); 
    }
    
?>