<?php
function mostrarErrores($errores, $campo){
    $alerta='';
    if(isset($errores[$campo]) && !empty($errores[$campo])){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
    $_SESSION['errores']=null;
    unset($_SESSION['errores']);
}