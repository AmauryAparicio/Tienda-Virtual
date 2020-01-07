<h1>Detalle del pedido</h1>
<?php if(isset($pedido)): ?>
    <div class="det-env">
        <?php if(isset($_SESSION['admin'])): ?>
            <h3>Cambiar estado del pedido</h3>
            <form action="<?=base_url?>pedido/estado" method="POST">
                <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
                <select class="det-sel" name="status">
                    <option value="confirmed" <?=$pedido->status == 'confirmed' ? 'selected' : ''; ?> >Pendiente</option>
                    <option value="preparation" <?=$pedido->status == 'preparation' ? 'selected' : ''; ?> >En preparacion</option>
                    <option value="ready" <?=$pedido->status == 'ready' ? 'selected' : ''; ?> >Preparado para enviar</option>
                    <option value="sent" <?=$pedido->status == 'sent' ? 'selected' : ''; ?> >Enviado</option>
                </select>
                <input type="submit" value="Cambiar estado" class="btn-env">
            </form>
        <?php endif; ?>
        <h3>Direccion de envio</h3>
        <p>Estado: <?=$pedido->estado?></p>
        <p>Ciudad: <?=$pedido->ciudad?></p>
        <p>Direccion: <?=$pedido->direccion?></p>
    </div>
    
    <h3 class="conf-h3">Datos del pedido:</h3>
    <ul class="conf-d">
        <li>Estado: <span class="inner"><?=Utils::showStatus($pedido->status);?></span></li>
        <li>Clave del pedido: <span class="inner"><?=$pedido->id?></span></li>
        <li>Productos:</li>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
                <?php while($producto = $productos->fetch_object()): ?>
                    <tr>
                        <td>
                            <?php if($producto->imagen != null): ?>
                                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img-carrito">
                            <?php else: ?>
                                <img src="<?=base_url?>uploads/images/camiseta.png" class="img-carrito">
                            <?php endif; ?>
                        </td>
                        <td><?=$producto->nombre?></td>
                        <td>$<?=$producto->precio?></td>
                        <td>x<?=$producto->unidades?></td>
                    </tr>
                <?php endwhile;?>
            </table>
    </ul>
    <p class="conf-t">Total a pagar: <span class="inner">$<?=$pedido->costo?></span></p>
<?php endif; ?>