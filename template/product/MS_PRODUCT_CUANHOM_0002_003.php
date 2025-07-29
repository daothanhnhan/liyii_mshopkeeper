<?php 
    $home_pro_favorite = $action->getList('product', 'product_favorite', '1', 'product_id', 'desc', '', '2', '');
?>
<h2 class="boxSubProductHome">
    <span>ƯA THÍCH</span>
</h2>
<ul class="list_pro_1_col">
    <?php foreach ($home_pro_favorite as $item) { ?>
    <li class="item_pro_1_col">
        <div class="box_image_1_col">
            <img src="images/<?= $item['product_img'] ?>" width="100%">
        </div>
        <div class="box_info_1_col">
            <a href="/<?= $item['friendly_url'] ?>" class="link_item_pro_1_col"><?= $item['product_name'] ?></a>
            <div class="rating_pro_1_col">
                <i class="glyphicon glyphicon-star-empty"></i>
                <i class="glyphicon glyphicon-star-empty"></i>
                <i class="glyphicon glyphicon-star-empty"></i>
                <i class="glyphicon glyphicon-star-empty"></i>
                <i class="glyphicon glyphicon-star-empty"></i>
            </div>
            <div class="box_price">
                <span class="price_pro_1_col"><?= number_format($item['product_price']*(100-$item['product_price_sale'])/100) ?> VNĐ</span>
                <span class="old_price_pro_1_col"><?= number_format($item['product_price']) ?> VNĐ</span>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>