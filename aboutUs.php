<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sobre nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        .highlighted {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body id="about">
    
    <?php include "includes/nav.php" ?>

    <section class="container my-5">
        <h1 class="text-center">Sobre Nosotros</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <img src="Img/congrats.png" alt="Imagen Sobre Nosotros" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>¿Qué es Find OuTree!?</h2>
                <p style="text-align: justify">Es una página web diseñada para informar al mundo sobre una
                    extensa variedad de árboles, los cuales nos sirven para regular el medio ambiente
                    en el cual vivimos. Esta página servirá para aquellas personas que tengan el
                    interés por plantar un árbol en su casa, parque, terreno, etc, pero que no sepan
                    que tipo de árbol es el adecuado para plantarse en la zona, proporcionándole así,
                    no solo los tipos, sino también información relevante sobre cada árbol y links de compra con su respectivo precio en
                    diversos sitios. Al igual, una persona puede buscar un árbol en específico y
                    averiguar si es adecuado para su región, así mismo la información relevante de
                    dicho árbol se le será proporcionada.</p>
                <h2>Nuestros objetivos</h2>
                <ul>
                    <li>Incentivar a la población a la forestación y cuidado de la flora, por medio de difusión de información.</li>
                    <li>Apoyar al usuario en el cuidado diario de su flora.</li>
                    <li>Facilitar al usuario la búsqueda para adquirir un árbol, por medio de tiendas en línea y/o viveros cercanos a su ubicación.</li>
                    <li>Realizar un diseño intuitivo, llamativo y fácil de usar para el usuario.</li>
                    <li>Promocionar un estilo de vida más sustentable para nuestro planeta.</li>
                    <li>Realizar una página web funcional y de calidad.</li>
                </ul>

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Justificación</h2>
                <p style="text-align: justify">Sufrir por el calor y/o sol tan fuerte en nuestro país, estado, etc, es una de las
                    grandes y terribles consecuencias del calentamiento global, cuando uno piensa
                    en las ‘soluciones’ o prevenciones para frenar este fenómeno, rápido pensamos
                    en la forestación de árboles, cómo sabemos, los árboles absorben el CO2 que
                    producimos y que además, forma parte de los gases de efecto invernadero, pero
                    que sobre todo, nos da el resultado visible de la sombra para no exponernos
                    mucho tiempo a los rayos del sol y si lo vemos de cierta manera es una forma
                    natural muy bella de adornar nuestros jardines, calles, parques, etc. Pero si plantar
                    árboles es una buena idea para combatir el calentamiento global, ¿Por qué no
                    simplemente todos plantamos arboles en nuestras casas? Una de entre tantas
                    respuestas a esta pregunta sería la poca información que la población tiene
                    respecto a esto, por lo que hemos pensado en crear Find ouTree!</p>
                <h2>Actores</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Matricula</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Adrián Ordaz Ruiz</td>
                        <td>1908005</td>
                    </tr>
                    <tr>
                        <td>Mariana Lizbeth Alvarado Deyta</td>
                        <td>1922719</td>
                    </tr>
                    <tr>
                        <td>Ángel Armando Hernández Davila</td>
                        <td>1902084</td>
                    </tr>
                    <tr>
                        <td>Armando de Jesús Gallegos Orozco</td>
                        <td>1736781</td>
                    </tr>
                    <tr>
                        <td>Raúl Aldair Aguilar Martínez</td>
                        <td>1897842</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
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