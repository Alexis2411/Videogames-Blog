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
        if(isset($_GET['editar'])){
            $entrada_id=$_GET['editar'];
            $usuario_id=$_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id='$categoria' ".
            "WHERE id = $entrada_id AND usuario_id = $usuario_id";
        }else{
            $sql = "INSERT INTO entradas VALUES (null, '$usuario', '$categoria', '$titulo', '$descripcion', CURDATE());";
        }
        $guardar=mysqli_query($conexiondb, $sql);
        header('Location: index.php');
    }else{
        $_SESSION["errores_entrada"]=$errores;
        if(isset($_GET['editar'])){
            header("Location: editar-entrada.php?id=".$_GET['editar']);
        }else{
            header('Location: crear-entradas.php');
        }
    }
}

?>