<?php require "php/functions.php"?>
<?php 
    if(isset($_GET['results'])){
        $decode = json_decode(urldecode($_GET['results']), true);
        $cat = ''; // Inicializar la cadena
        foreach ($decode as $item) {
            if (isset($item['tree_id'])) {
                $cat .= $item['tree_id'] . ','; // Concatenar el valor de 'tree_id' seguido de una coma
            }
        }
        // Eliminar la última coma
        $cat = rtrim($cat, ',');
        }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Find OuTree!</title>
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
    <?php include "includes/nav.php"?>

    <div class="card text-bg-dark">
        <img src="Img/sunset.jpg" style="height: 200px" class="card-img" alt="...">
        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
            <h1 class="card-title">Árboles</h1>
            <p class="card-text">¡Explora la variedad de árboles y encuentra el tuyo!</p>
        </div>
    </div>
    <div class="container text-center"><br>
        <div class="row" style="align-content: start">
            <div class="col-2">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Filtros
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="firstRadio" checked>
                                    <label class="form-check-label" for="firstRadio">Todos</label>
                                </li>   
                                <?php $zones = getZones() ?>
                                <?php
                                    foreach($zones as $zone){
                                        ?>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="SecondRadio" onclick="window.location.href='zones.php?zones=<?php echo urlencode($zone['zones']) ?>'";>
                                                <label class="form-check-label" for="SecondRadio"><?php echo ucfirst($zone['zones']) ?> </label>
                                            </li>    
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php $arboles = showTreesById($cat)?>
                    <?php
                        foreach($arboles as $arbol){
                    ?>

                            <div class="col">
                                <div class="card" id="alamo-sicomoro-card">
                                    <img width="341" height="341" src="<?php echo "Img/{$arbol['tree_cover']}" ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="arboles.php?tree_id=<?php echo urlencode($arbol['tree_id'])?>"><h5 class="card-title">
                                            <?php echo $arbol['tree_name']?></h5></a>
                                    </div>
                                </div>
                            </div>

                            <?php

                        }
                            ?>
                </div>
            </div>
            <div class="col-1"></div>
        </div><br>
    </div>

</body>
</html>