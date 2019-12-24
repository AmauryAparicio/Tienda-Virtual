<?php if(isset($_SESSION['identity'])): ?>
<h1>Finalizar Orden</h1>
<p><a href="<?=base_url?>/carrito/index">Ver el carrito</a></p>

<h3 class="FO">Direccion para el envio</h3>
<form action="<?=base_url?>pedido/add" method="POST" class="FO-form">
    <label for="estado">Estado</label>
    <input type="text" name="estado" required>

    <label for="ciudad">Ciudad</label>
    <input type="text" name="ciudad" required>

    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" required>

    <input type="submit" value="Confirmar Pedido">

</form>

<?php else: ?>
<h1>NECESITAS ESTAR IDENTIFICADO</h1>
<p>Primero registrate e inicia sesion para hacer el pedido</p>
<?php endif; ?>