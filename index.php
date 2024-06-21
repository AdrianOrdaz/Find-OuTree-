<?php require "php/functions.php"?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina para encontrar el arbol perfecto para tu ubicacion">
    <meta name="keywords" content="fresno, ebano, encino">
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
    
    <?php include "includes/nav.php" ?>

    <div class="container text-center">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="Img/tree1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h2 class="card-title">Bienvenido a Find OuTree!</h2><br>
                                <p class="card-text" style="text-align: justify">La plataforma web que te ayuda a descubrir la información completa sobre árboles. Si deseas plantar un árbol pero no sabes cuál es el adecuado para tu zona, estás en el lugar indicado. Aquí encontrarás una amplia variedad de árboles con detalles como necesidades de riego, altura, color de hojas y más. Además, te proporcionamos enlaces de compra con precios actualizados. ¡Únete a nosotros y crea un entorno más verde y sostenible!</p>
                                <a href="Explorar.php" class="btn btn-success">Explora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div><br>
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <h3>Árboles más buscados</h3>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card-group">
                <?php $someTrees = showSomeTrees(3,"rand()")?>
                    <?php
                        foreach($someTrees as $someTree){
                            ?>
                        <div class="card">
                            <img src="<?php echo "Img/{$someTree['tree_cover']}" ?>" class="card-img-top" alt="..." style="height: 200px">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $someTree['tree_name'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">[<?php echo $someTree['tree_sciName'] ?>]</h6>
                            <p class="card-text"> <?php echo $someTree['short_description'] ?> </p>
                            <a href="arboles.php?tree_id=<?php echo urlencode($someTree['tree_id'])?>" class="btn btn-link">Ver más</a>
                            </div>
                        </div>
                    <?php
                    }
                ?></div>
            </div>
            <div class="col"></div>
        </div><br>
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <h3>Noticias</h3>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card-group">
                <?php $someNews = showSomeNews(3,"rand()")?>
                <?php
                        foreach($someNews as $new){
                            ?>
                    <div class="card">
                        <img src="<?php echo "Img/{$new['img_new']}" ?>" class="card-img-top" alt="..." style="height: 200px">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $new['title_new'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $new['network_new'] ?></h6>
                            <p class="card-text" style="text-align: justify"><?php echo $new['text_new'] ?></p>
                            <a href="<?php echo $new['link_new']?>" class="btn btn-link">Ver más</a>
                        </div>
                    </div>
                    <?php
                    }
                ?></div>
            </div>
            <div class="col"></div>
        </div>
    <script>
        function searchContent(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario
            var searchTerm = document.getElementById("searchInput").value.toLowerCase();
            var elementsToSearch = document.querySelectorAll("p, h2, a, li a, h1"); // Buscar dentro de <p>, <h2>, <a>, <li><a>, y <h1>
    
            elementsToSearch.forEach(function(element) {
                var content = element.textContent;
                var searchRegex = new RegExp(escapeRegExp(searchTerm), "gi");
                var highlightedContent = content.replace(searchRegex, function(match) {
                    return '<span class="highlighted">' + match + '</span>';
                });
    
                element.innerHTML = highlightedContent;
            });
        }
    
        // Función para escapar caracteres especiales en una cadena para usar en una expresión regular
        function escapeRegExp(string) {
            return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }
    </script>


</body>
</html>