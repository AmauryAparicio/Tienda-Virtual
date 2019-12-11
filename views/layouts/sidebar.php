            <!-- Sider -->
            <aside id="lateral">
                
                <div class="block_aside" id="login">

                    <?php if(!isset($_SESSION['identity'])): ?>

                    <h3>Entrar a la web</h3>
                    <!-- Formulario de login -->
                    <form action="<?=base_url?>usuario/login" method="POST">
                        <!-- email -->
                        <label for="email">E-mail</label>
                        <input type="email" name="email">
                        <!-- Contraseña -->
                        <label for="password">Password</label>
                        <input type="password" name="password" id="">
                        <input type="submit" value="Enviar">
                    </form>
                    
                    <?php else: ?>
                        <h3><?=$_SESSION['identity']->nombre . ' ' . $_SESSION['identity']->apellidos?></h3>

                    <ul>
                        <li><a href="#">Mis pedidos</a></li> 
                        <?php if(isset($_SESSION['admin'])): ?>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorias</a></li>
                        <?php endif; ?>
                        <li><a href="<?=base_url?>usuario/logout">Cerrar Sesión</a></li>
                    </ul>

                    <?php endif; ?>
                </div>
            </aside>

            <!-- Content -->
            <div id="central">