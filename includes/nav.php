<?php
// Obtiene el nombre del archivo actual
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="Img/logo.png" alt="Bootstrap" width="100" height="94">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'Explorar.php'|| $current_page == 'arboles.php'|| $current_page == 'zones.php'|| $current_page == 'porBusqueda.php') ? 'active' : ''; ?>" href="Explorar.php">Árboles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'viveros.php') ? 'active' : ''; ?>" href="viveros.php">Viveros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'aboutUs.php') ? 'active' : ''; ?>" href="aboutUs.php">Sobre nosotros</a>
                </li>
            </ul>
            <form class="d-flex" id ="buscar" action="php/search.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Qué deseas buscar?" aria-label="Buscar" name="searchInput">
                <button class="btn btn-outline-success" name = "buscar" type="submit">Buscar</button>
            </form>
        </div>
    </div>
    </nav>