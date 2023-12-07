<?php
if (!isset($_SESSION)) {
    session_start();
}
$server='localhost';
$username = 'root';
$password = '';
$database = 'blog-videojuegos';
$conexiondb = mysqli_connect($server, $username, $password, $database);
mysqli_query($conexiondb, "SET NAMES 'utf8'");