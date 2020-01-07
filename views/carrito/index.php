<h1>Carrito de compras</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
	<table class="tabla-carrito">
		<tr>
			<th>Imagen</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Unidades</th>
			<th>Eliminar</th>
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
				<td><a href="<?=base_url?>carrito/down&index=<?=$indice?>">&#8722;</a> <?=$elemento['unidades']?> <a href="<?=base_url?>carrito/up&index=<?=$indice?>">&#43;</a></td>
				<td><a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button button-small button-red qp">Quitar</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<a href="<?=base_url?>carrito/delete_all" class="button button-small button-red vc">Vaciar carrito</a>
	<?php $stats = Utils::statsCarrito(); ?>
	<h3 class="total-carrito">Total: $<?=$stats['total']?></h3>
	<a href="<?=base_url?>pedido/hacer" class="button button-small button-total">Finalizar Orden</a>
<?php else: ?>
		<h3>El carrito esta vacio, añade algun producto para continuar.</h3>
<?php endif;?>