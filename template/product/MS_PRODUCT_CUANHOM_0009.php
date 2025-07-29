

<!-- <?php print_r($price) ?> -->
<?php if($price['product_price_sale'] > 0){ ?>
    <div class="gb-product_price">Giá gốc: <span><?= number_format($price['product_price']) ?> đ</span></div>
    <div class="gb-product_price_sale">Khuyến mãi: <span><?= number_format($price['product_price']*(100-$price['product_price_sale'])/100) ?> đ</span></div>

<?php }else{ ?>
    <div class="gb-product_price_sale">Giá gốc: <span><?= number_format($price['product_price']) ?> đ</span></div>
<?php } ?>
