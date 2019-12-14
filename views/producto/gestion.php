<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>
<table>
<tr>
    <th>ID</th>
    <th>Nombe</th>
    <th>Precio</th>
    <th>Stock</th>
</tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td>$<?=$pro->precio;?></td>
            <td><?=$pro->stock;?> Pz.</td>
        </tr>
    <?php endwhile; ?>
</table>