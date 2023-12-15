<?php
if (isset($_POST)) {
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexiondb, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexiondb, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexiondb, trim($_POST['email'])) : false;
}

$errores = [];

if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
    $nombre_valido = true;
} else {
    $nombre_valido = false;
    $errores['nombre'] = "nombre no valido";
}
if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
    $apellido_valido = true;
} else {
    $apellido_valido = false;
    $errores['apellido'] = "apellido no valido";
}
if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_valido = true;
} else {
    $email_valido = false;
    $errores['email'] = "email no valido";
}

if (count($errores) == 0) {
    $guardar_usuario = true;

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $isset_email = mysqli_query($conexiondb, $sql);
    $isset_user = mysqli_fetch_assoc($isset_email);

    var_dump($isset_user);
    // die;
    if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
        $usuario = $_SESSION['usuario'];

        $sql = "UPDATE usuarios SET " .
            "nombre='$nombre', " .
            "apellidos='$apellido', " .
            "email='$email' " .
            "WHERE id = " . $usuario['id'];
        $guardar = mysqli_query($conexiondb, $sql);

        if ($guardar) {
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellidos'] = $apellido;
            $_SESSION['usuario']['email'] = $email;
            $_SESSION['completado'] = "Tus datos se han actualizado con exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guarda el usuario!!";
        }
    } else {
        $_SESSION['errores']['general'] = "El usuario ya existe";
    }
}


header('Location: mis-datos.php');
?>