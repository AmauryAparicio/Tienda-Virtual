<h1>Mis pedidos</h1>
<table class="ped-tb">
    <tr>
        <th>Clave</th>
        <th>Costo total</th>
        <th>Fecha</th>
    </tr>
    <?php while($ped = $pedidos->fetch_object()): ?>
        <tr>
            <td><a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>">&#8594; <?=$ped->id?> &#8592;</a></td>
            <td><?=$ped->costo?></td>
            <td><?=$ped->fecha?></td>
        </tr>
    <?php endwhile; ?>
</table>