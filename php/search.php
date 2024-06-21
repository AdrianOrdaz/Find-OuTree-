<?php
require "functions.php";


    // Obtener los valores enviados por el formulario
    $titulo = trim($_POST['searchInput']);
    
    $mysqli = dbConnect();
    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query

    $stmt = $mysqli->prepare("SELECT tree_id FROM arboles WHERE tree_name LIKE ?");
    $titulo_like = "%" . $titulo . "%"; // Utilizar LIKE para búsqueda parcial
    $stmt->bind_param("s", $titulo_like);
    $stmt->execute();
    $resultado = $stmt->get_result();
    

    if ($resultado && $resultado->num_rows > 0) {
        // Mostrar los resultados
        while ($fila = $resultado->fetch_assoc()) {
            $results[] = $fila;
            //echo "<script>window.location.href = '../porBusqueda.php?tree_id=" . $fila['tree_id'] . "';</script>";
        }
    } else {
        echo "<script>alert('No se han encontrado resultados');window.location.href = '../Explorar.php'</script>";
    }
    if (!empty($results)) {
        // Convertir el array $resultados a formato JSON para pasarlo a través de la URL
        $resultados_json = urlencode(json_encode($results));
        header("Location: ../porBusqueda.php?results=$resultados_json");
        exit(); // Importante para detener la ejecución del script actual
    }
?>
