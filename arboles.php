<?php require "php/functions.php"?>
<?php 
    if(isset($_GET['tree_id'])){
        $id = urldecode($_GET['tree_id']);
        $tree = showTreeById($id);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $tree[0]['tree_name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        .highlighted {
            background-color: yellow;
            font-weight: bold;
        }
    </style>

</head>

<body id="explorar">

    <?php include "includes/nav.php"?>

    <div class="container text-center">
        <h1 class="mt-5"><?php echo $tree[0]['tree_name'] ?></h1>
        <h5 style="color: gray"><?php echo $tree[0]['tree_sciName'] ?></h5>
    </div>

    <div class="container text-center"><br>
        <div class="row">
            <div class="col-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <?php 
                        $pattern = "/(?<=\.jpg|\.jpeg|\.png|.jfif)/";
                        $til = preg_split($pattern, $tree[0]['tree_images'], -1, PREG_SPLIT_NO_EMPTY);
                        foreach($til as $index => $image){?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $index; ?>" <?php if ($index === 0) echo 'class="active" aria-current="true"'; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
                            <?php
                        }?>
                    </div>
                    <div class="carousel-inner">
                    <?php 
                        $pattern = "/(?<=\.jpg|\.jpeg|\.png|.jfif)/";
                        $til = preg_split($pattern, $tree[0]['tree_images'], -1, PREG_SPLIT_NO_EMPTY);
                        foreach($til as $index => $image){
                    ?>
                            <div class="carousel-item <?php if ($index === 0) echo 'active'; ?>" data-bs-interval="3000" >
                                <img src="Img/<?php echo $image; ?>" class="d-block w-100" alt="Slide <?php echo $index + 1; ?>">
                            </div>
                            <?php
                        }?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-6">
                <h4 style="text-align: left">Descripción</h4>
                <p style="text-align: justify"><?php echo $tree[0]['description_tree']?></p>
                <h4 style="text-align: left">Caracteristicas</h4>
                <ul style="text-align: left">
                <?php 
                    $til = explode('.', $tree[0]['tree_things']);

                    for($i = 0;$i<count($til)-1;++$i){ ?>
                        <li> <?php echo $til[$i] ?></li><?php
                    }
                    
                ?>
                </ul><br>
                <figure>
                    <img src="Img/<?php echo $tree[0]['zone_image']?>" style="width: 492px;height: 339px;">
                    <figcaption class="text-center mt-2">Zonas aptas del <?php echo $tree[0]['tree_sciName'] ?></figcaption>
                </figure>

            </div>
            <div class="col-3">
                <div class="list-group">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg><?php echo $tree[0]['tree_family'] ?></li>
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 131.9C64 112.1 80.1 96 99.9 96c9.5 0 18.6 3.8 25.4 10.5l16.2 16.2c-21 38.9-17.4 87.5 10.9 123L151 247c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0L345 121c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-1.3 1.3c-35.5-28.3-84.2-31.9-123-10.9L170.5 61.3C151.8 42.5 126.4 32 99.9 32C44.7 32 0 76.7 0 131.9V448c0 17.7 14.3 32 32 32s32-14.3 32-32V131.9zM256 352a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm32-32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                        <?php echo $tree[0]['water_time'] ?></li>
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                        <?php echo $tree[0]['sun_time'] ?></li>
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h50.7L9.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L256 109.3V160c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H160zM576 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM448 208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM400 384a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm128 0a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM272 384a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM144 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM576 336a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm-48-80a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>
                        <?php echo $tree[0]['height'] ?></li>
                        <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z"/></svg>
                        <?php echo $tree[0]['tree_color'] ?></li>
                    </ul>
                </div><br>
                <a href="<?php echo $tree[0]['mercado_link'] ?>" class="btn btn-outline-success">Ver precios</a>
            </div>
        </div><br>
    </div>
    <script>
        function searchContent(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario
            var searchTerm = document.getElementById("searchInput").value.toLowerCase();
            var elementsToSearch = document.querySelectorAll("p, h2, a, li a, h1, h4,h5,li.list-group-item"); // Buscar dentro de <p>, <h2>, <a>, <li><a>, y <h1>
    
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