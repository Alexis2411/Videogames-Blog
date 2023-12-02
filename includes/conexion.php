<?php
$server='localhost';
$username = 'root';
$password = '';
$database = 'blog-videojuegos';
$conexiondb = mysqli_connect($server, $username, $password, $database);
mysqli_query($conexiondb, "SET NAMES 'utf8'");