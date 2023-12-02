<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog de videojuegos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header id = "cabecera">
        <div id = "logo">
            <a href="index.php">
                Blog de videojuegos
            </a>
        </div>
        <nav id = "menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="index.php">Categoria 1</a>
                </li>
                <li>
                    <a href="index.php">Categoria 2</a>
                </li>
                <li>
                    <a href="index.php">Categoria 3</a>
                </li>
                <li>
                    <a href="index.php">Sobre Mi</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class = "clearfix"></div>
    </header>
    <div id="contenedor">
        <aside id="sidebar">
            <div id="login" class="bloque">
                <h3>Identificate</h3>
                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="entrar">
                </form>
            </div>
            <div id="register" class="bloque">
                <h3>Registrate</h3>
                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido">

                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="entrar">
                </form>
            </div>
        </aside>

        <div id="principal">
            <h1>Ultimas entradas</h1>
            <article class="entrada">
                <h2>Titulo de mi entrada</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Itaque tenetur, dicta animi aut cum explicabo temporibus quisquam 
                    deserunt dolores, saepe, totam reprehenderit minima repellendus beatae? 
                    Deserunt cupiditate modi illum dolore?
                </p>
            </article>
        </div>
    </div>

    <footer id="pie">
        <p>Desarrollado por Alexis J.R.A. &copy; 2023</p>
    </footer>
</body>
</html>