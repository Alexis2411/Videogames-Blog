<body>
    <?php include_once 'includes/cabecera.php';
    include_once 'includes/lateral.php';?>
    <div id="principal">
        <h1>Todas las entradas</h1>
        <?php
            $entradas = conseguirEntradas($conexiondb);
            if (!empty($entradas)):
                while ($entrada = mysqli_fetch_assoc($entradas)):
        ?>
                    <article class="entrada">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                            <h2><?=$entrada['titulo']?></h2>
                            <span class="fecha"><?=$entrada['categoria']." | ".$entrada['fecha'] ?></span>
                            <p>
                                <?=substr($entrada['descripcion'], 0,180). "..." ?>
                            </p>
                        </a>
                    </article>
        <?php
                endwhile;
            endif;
        ?>
        
        <div class="clearfix"></div>
    </div>
    </div>

</body>

</html>