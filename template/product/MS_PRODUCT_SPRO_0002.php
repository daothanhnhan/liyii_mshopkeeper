
<div class="item-price">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8">
            <p class="news-price"><?= number_format($item['SellingPrice']) ?> VNĐ</p>
            <!-- <p class="old-price"><?= number_format($row['product_price']-($row['product_price']*($row['product_price_sale']/100))) ?> VNĐ</p> -->
        </div>
        <div class="col-md-4  col-sm-4 col-xs-4">
           <!-- <p class="sale-percent">-<?= $row1['product_price_sale'] ?>%</p>-->
           <?php 
           foreach ($item['ListDetail'] as $item_color) { 
           		$mau = $action->getDetail('color', 'color_name', $item_color['Id']);
                if ($mau) { } else {
                    $mau['color_value'] = "#fff";
                }
                if ($item_color['Color'] != '') { 
           ?>
           	<span class="dot1" style="background: <?= $mau['color_value'] ?>" data-toggle="tooltip" data-placement="top" title="<?= $item_color['Color'] ?>"></span>
           <?php } } ?>
        </div>
    </div>
</div>