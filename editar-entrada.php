<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>
<?php
$entrada_actual = conseguirEntrada($conexiondb, $_GET['id']);
if (!isset($entrada_actual['id'])) {
    header("Location: index.php");
}
?>

<div id="principal">
    <h1>Editar Entradas</h1>
    <p>Edita tu entrada
        <?= $entrada_actual['titulo'] ?>
    </p>
    <br>
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" value="<?= $entrada_actual['titulo'] ?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripcion:</label>
        <input type="textarea" name="descripcion" value="<?= $entrada_actual['descripcion'] ?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>


        <label for="categoria">categoria</label>
        <select name="categoria">
            <?php
            $categorias = conseguirCategorias($conexiondb);
            if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                    <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                        <?= $categoria['nombre'] ?>
                    </option>
                    <?php
                endwhile;
            endif;
            ?>
            <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/pie.php'; ?>