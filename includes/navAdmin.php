<?php
// Obtiene el nombre del archivo actual
$current_page = basename($_SERVER['PHP_SELF']);
if (isset($_SESSION['id_user'])) {
    $userID = $_SESSION['id_user'];
    $user = getUserById($userID);
    $nivel = $user[0]['puesto'];
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" target="_blank">
            <img src="Img/logo2.png" alt="Bootstrap" width="100" height="75">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'vistaAdmin.php') ? 'active' : ''; ?>" aria-current="page" href="vistaAdmin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'AdminArboles.php') ? 'active' : ''; ?>" href="AdminArboles.php">Árboles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'users.php') ? 'active' : ''; ?>  <?php echo ($nivel!='ADMIN') ? 'disabled':''; ?>" href="users.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'noticias.php') ? 'active' : ''; ?>" href="noticias.php">Noticias</a>
                </li>
            </ul>
            <form action="php/login.php" method="POST" id="logout"><button type="submit" name="logout" class="btn btn-outline-light">Cerrar sesión</button></form>
        </div>
    </div>
    </nav>