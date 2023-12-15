<?php
if(isset($_POST)){
    require_once "includes/conexion.php";
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexiondb, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexiondb, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];
    $errores = array();
    
    if(empty($titulo)){
        $errores['titulo'] = "El titulo no es valido";
    }
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = 'La categoria no ha sido seleccionada';
    }
    if(empty($descripcion)){
        $errores['descripcion'] = 'La descripción de la publicación no puede estar vacía';
    }
    
    if(count($errores)==0){
        $sql = "INSERT INTO entradas VALUES (null, '$usuario', '$categoria', '$titulo', '$descripcion', CURDATE());";
        $guardar=mysqli_query($conexiondb, $sql);
        header('Location: index.php');
    }else{
        $_SESSION["errores_entrada"]=$errores;
        header('Location: crear-entradas.php');
    }
}

?>