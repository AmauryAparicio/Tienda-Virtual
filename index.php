<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index.php">
                    <h1>Tienda de Camisetas</h1>
                </a>
            </div>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoria 1</a>
                </li>
                <li>
                    <a href="#">Categoria 2</a>
                </li>
                <li>
                    <a href="#">Categoria 3</a>
                </li>
                <li>
                    <a href="#">Categoria 4</a>
                </li>
                <li>
                    <a href="#">Categoria 5</a>
                </li>
            </ul>
        </nav>

        <div id="content">

            <!-- Sider -->
            <aside id="lateral">
                
                <div class="block_aside" id="login">
                    <h3>Entrar a la web</h3>
                    <!-- Formulario de login -->
                    <form action="#" method="POST">
                        <!-- email -->
                        <label for="email">E-mail</label>
                        <input type="email" name="email">
                        <!-- Contraseña -->
                        <label for="password">Password</label>
                        <input type="password" name="password" id="">
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li> 
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorias</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Content -->
            <div id="central">
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 DLS</p>
                    <a href="#">Comprar</a>
                </div>

                <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 DLS</p>
                        <a href="#">Comprar</a>
                    </div>

                    <div class="product">
                            <img src="assets/img/camiseta.png">
                            <h2>Camiseta Azul Ancha</h2>
                            <p>30 DLS</p>
                            <a href="#">Comprar</a>
                        </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <p>Desarrollado por Amaury Aparicio &copy; <?=date('Y')?></p>
        </footer>
    </div>
</body>
</html>