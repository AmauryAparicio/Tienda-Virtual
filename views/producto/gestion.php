<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<!-- Anuncio de creacion de producto -->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'): ?>
    <strong class="alert_red">Falló la creacion del producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<!-- Anuncio de eliminacion de producto -->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alert_red">Falló la eliminación del producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<!-- Anuncio de eliminacion de producto -->
<?php if (isset($_SESSION['productoE']) && $_SESSION['productoE'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha editado correctamente</strong>
<?php elseif (isset($_SESSION['productoE']) && $_SESSION['productoE'] == 'failed'): ?>
    <strong class="alert_red">Falló la edición del producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('productoE'); ?>

<table>
<tr>
    <th>ID</th>
    <th>Nombe</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td>$<?=$pro->precio;?></td>
            <td><?=$pro->stock;?> Pz.</td>
            <td>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>