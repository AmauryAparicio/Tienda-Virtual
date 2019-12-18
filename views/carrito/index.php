<h1>Carrito de compras</h1>

<table class="tabla-carrito">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php
        foreach($carrito as $indice => $elemento): 
        $producto = $elemento['producto'];
     ?>
        <tr>
            <td>
                <?php if($producto->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img-carrito">
                <?php else: ?>
                    <img src="<?=base_url?>uploads/images/camiseta.png" class="img-carrito">
                <?php endif; ?>
            </td>
            <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
            <td>$<?=$producto->precio?></td>
            <td><?=$elemento['unidades']?></td>
        </tr>
    <?php endforeach; ?>
</table>