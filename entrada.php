<?php
require_once 'includes/conexion.php';
require_once 'includes/helpers.php';
?>
<?php $entrada_actual = conseguirEntrada($conexiondb, $_GET['id']);
if (!isset($entrada_actual['id'])) {
    header('Location: index.php');
}
?>

<body>
    <?php include_once 'includes/cabecera.php';
    include_once 'includes/lateral.php'; ?>
    <div id="principal">
        <h1>Entradas de
            <?= $entrada_actual['titulo'] ?>
        </h1>
        <a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
            <h2>
                <?= $entrada_actual['categoria'] ?>
            </h2>
        </a>
        <h3>
            <?= $entrada_actual['fecha'] ?> |
            <?= $entrada_actual['usuario'] ?>
        </h3>
        <p>
            <?= $entrada_actual['descripcion'] ?>
        </p>
        <?php if (isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>
            <br>
            <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde"> Editar Entradas </a>
            <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton"> Borrar entrada </a>
        <?php endif;?>
        <div class="clearfix"></div>
    </div>

</body>

</html>