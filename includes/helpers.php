<?php
function mostrarErrores($errores, $campo){
    $alerta='';
    if(isset($errores[$campo]) && !empty($errores[$campo])){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
    $borrado = true;
    if (isset($_SESSION['errores'])){
        $_SESSION['errores']=null;
        $borrado=true;
    }
    if (isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada']=null;
        $borrado=true;
    }
    if (isset($_SESSION['completado'])){
        $_SESSION['completado']=null;
        $borrado=true;
    }
    return $borrado;

}

function conseguirCategorias($conexiondb){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias=mysqli_query($conexiondb, $sql);
    if ($categorias && mysqli_num_rows($categorias)>=1){
        $result=$categorias;
    }
    return $result;
}

function conseguirCategoria($conexiondb, $id,){
    $sql = "SELECT * FROM categorias WHERE id = '$id';";
    $categoria=mysqli_query($conexiondb, $sql);
    $result=array();
    if ($categoria && mysqli_num_rows($categoria)>=1){
        $result=mysqli_fetch_assoc($categoria);
    }
    return $result;
}

function conseguirEntradas($conexiondb, $limit = null, $categoria=null, $busqueda=null){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e "."INNER JOIN categorias c ON e.categoria_id=c.id ";
    if(!empty($categoria)){
        $sql.="WHERE e.categoria_id = '$categoria' ";
    }
    if (!empty($busqueda)) {
        $sql .= "WHERE e.titulo LIKE '%$busqueda%'";
    }

    $sql.="ORDER BY e.id desc ";

    if($limit){
        $sql.="LIMIT 4";
    }
    $result=array();
    $entradas=mysqli_query($conexiondb, $sql);
    if ($entradas && mysqli_num_rows($entradas)>=1){
        $result=$entradas;
    }
    return $result;
}

function conseguirEntrada($conexiondb, $id){
    $sql = "SELECT e.*, c.nombre AS categoria , CONCAT (u.nombre, ' ', u.apellidos) AS usuario FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id  INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id =$id ";
    $entrada = mysqli_query($conexiondb, $sql);

    $resultado = array();

    if($entrada && mysqli_num_rows($entrada)>=1){
        $resultado = mysqli_fetch_assoc($entrada);

    }
    return $resultado;
}