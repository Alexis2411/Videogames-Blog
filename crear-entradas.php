<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<div id="principal">
    <h1>Crear Categorias</h1>
    <p>Anade nuevas caategorias al blog para que los usuarios puedan leerlas y ver el contenido</p>
    <br>
    <form action="guardar-entrada.php" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'titulo') : '';?>

        <label for="descripcion">Descripcion:</label>
        <input type="textarea" name="descripcion">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : '';?>


        <label for="categoria">categoria</label>
        <select name="categoria">
            <?php
            $categorias = conseguirCategorias($conexiondb);
            if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nombre'] ?>
                    </option>
                    <?php
                endwhile;
            endif;
            ?>
            <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores();?>
</div>

<?php require_once 'includes/pie.php'; ?>