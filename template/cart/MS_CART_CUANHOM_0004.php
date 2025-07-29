<?php 
	$total_cart = 0;
	$quantity_cart = 0;
	if (isset($_SESSION['shopping_cart'])) {
		foreach ($_SESSION['shopping_cart'] as $v) {
			$total_cart += $v['product_price']*$v['product_quantity'];
			$quantity_cart += $v['product_quantity'];
		}
	}
?>
<div class="gb-header-cart_cuanhom">
	<button class="btn btn-cart-cuanhom"><a href="/gio-hang" style="color:black;"><i
				class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color: #000;   font-weight: 1400;"></i>
				<span class="badge1" style="font-weight: 300;"><?= $quantity_cart ?>/</span>
			<?= number_format($total_cart) ?> VND</a></button>
</div>