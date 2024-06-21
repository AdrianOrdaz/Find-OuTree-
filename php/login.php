<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos

require 'functions.php';

session_start();
// Validamos que el formulario y que el boton login haya sido presionado
if(isset($_POST['login'])) {

// Obtener los valores enviados por el formulario
$usuario = $_POST['nombre_user'];
$contrasena = $_POST['contrasena_user'];

// Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
$sql = "SELECT * FROM users WHERE user_mail = '$usuario' and password = '$contrasena' and id_user != '0'";
$mysqli = dbConnect();
$resultado = $mysqli->query($sql);


$numero_registros = mysqli_num_rows($resultado);
	if($numero_registros != 0) {
		
		$fila = $resultado->fetch_assoc();
		$_SESSION['id_user'] = $fila['id_user'];
		header("Location: ../vistaAdmin.php");
        exit; // Asegura que el script se detenga después de la redirección
	}else{
		echo "<script>alert('La contraseña y/o el email ingresados son incorrectos.'); window.location.href = '../login.html'</script>";
	}
}

if(isset($_POST['logout'])) {
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	session_cache_expire();
	session_destroy();
	header("Location: ../login.html");
	exit();
}

?>
