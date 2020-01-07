			<!-- Sider -->
			<aside id="lateral">
				
				<div class="block_aside" id="carrito">
					<h3>Mi carrito</h3>
					<ul>
						<?php $stats = Utils::statsCarrito();  ?>
						<li>Productos (<?=$stats['count']?>)</li>
						<li>Total: $<?=$stats['total']?></li>
						<li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
					</ul>
				</div>
			
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
					<?php endif; ?>
						<ul>
							<?php if(isset($_SESSION['admin'])): ?>
								<li><a href="<?=base_url?>categoria/index">Gestionar Categorias</a></li>
								<li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
								<li><a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a></li>
							<?php endif; ?>
							<?php if(isset($_SESSION['identity'])): ?>
								<li><a href="<?=base_url?>pedido/misPedidos">Mis pedidos</a></li> 
								<li><a href="<?=base_url?>usuario/logout">Cerrar Sesión</a></li>
							<?php else: ?>
								<li><a href="<?=base_url?>usuario/registro">Registrate aqui</a></li>
							<?php endif; ?>
						</ul>

				</div>
			</aside>

			<!-- Content -->
			<div id="central">