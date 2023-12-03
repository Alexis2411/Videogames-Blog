<?php
session_start();
if (isset($_POST)) {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $email = isset($_POST['email']) ? $_POST['email']: false;
    $password = isset($_POST['password']) ? $_POST['password']:false ;
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
}else{
    $_SESSION['errores']=$errores;
    header('Location: index.php');
}
?>