<?php
if (isset($_POST)) {
    require_once 'includes/conexion.php';
    session_start();
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexiondb, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexiondb,$_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexiondb, trim($_POST['email'])): false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexiondb,$_POST['password']):false ;
}

$errores = [];

if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
    $nombre_valido=true;
}else{
    $nombre_valido= false;
    $errores['nombre']="nombre no valido";
}
if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
    $apellido_valido=true;
}else{
    $apellido_valido= false;
    $errores['apellido']="apellido no valido";
}
if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_valido=true;
}else{
    $email_valido= false;
    $errores['email']="email no valido";
}
if (!empty($password)) {
    $password_valido=true;
}else{
    $password_valido= false;
    $errores['password']="email no valido";
}

if (count($errores)==0) {
    $guardar_usuario=true;
    //cifrar contrasena
    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

    $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE());";
    $guardar = mysqli_query($conexiondb, $sql);

    if($guardar){
        $_SESSION['completado']= "El registro es ha completado con exito";
    }else{
        $_SESSION['errores']['general']= "Fallo al guarda el usuario!!";
    }
}else{
    $_SESSION['errores']=$errores;
}
header('Location: index.php');
?>