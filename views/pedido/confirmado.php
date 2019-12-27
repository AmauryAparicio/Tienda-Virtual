<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p class="conf-p">Tu pedido se ha guardado con exito, una vez realizada la transferencia bancaria "<span class="sub">056325436563465ASD</span>" con el coste del pedido, sera procesado y enviado.</p>
    <?php if(isset($pedido)): ?>
        <h3 class="conf-h3">Datos del pedido:</h3>
        <ul class="conf-d">
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
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido NO ha podido completarse</h1>
<?php endif; ?>