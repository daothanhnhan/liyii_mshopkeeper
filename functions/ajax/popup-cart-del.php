<?php 
    session_start();
    include_once dirname(__FILE__) . "/../database.php";
    include_once dirname(__FILE__) . "/../library.php";
    include_once dirname(__FILE__) . "/../action.php";
    include_once dirname(__FILE__) . "/../action_mshopkeeper.php";
    $action = new action();
    $mshopkeeper = new action_mshopkeeper();
    $products = $mshopkeeper->get_products_all_db();
    foreach ($_SESSION['shopping_cart'] as $k => $item) {
        if ($item['product_id'] == $_GET['id']) {
            unset($_SESSION['shopping_cart'][$k]);
        }
    }
    // echo $_GET['id'];die;
?>
<ul>
    <?php
    $total = 0; 
    foreach ($_SESSION['shopping_cart'] as $item) { 
        $total += $item['product_quantity'] * $item['product_price'];
        $product = $action->getDetail('product', 'product_id', $item['product_id']);
        $product1 = $mshopkeeper->get_product($products, $product['mshopkeeper_id']);
    ?>
    <li style="clear: both;padding-top: 5px;">
        <button type="button" class="close" onclick="popup_cart_del(<?= $item['product_id'] ?>)">&times;</button>
        <a href="/<?= $product['friendly_url'] ?>">
            <img src="<?= $product1['Picture'] ?>">
            <?= $item['product_name'] ?>
        </a>
        <span><?= $item['product_quantity'] ?> x <?= number_format($item['product_price']) ?> đ</span>
    </li>
    <?php } ?>
</ul>
<hr>
<p class="price-cart">
    <strong class="text-uppercase">Tổng tiền: <?= number_format($total) ?> đ</strong>
</p>
<p class="buttons text-uppercase">
   <a href="/gio-hang" class="button btn-cart-view wc-forward">View cart</a> 
   <a href="/thanh-toan" class="button checkout wc-forward">Checkout</a>
</p>