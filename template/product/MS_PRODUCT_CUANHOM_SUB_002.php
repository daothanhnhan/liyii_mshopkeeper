
<?php 
    $product_hot = $mshopkeeper->get_products_hot($product_all, 4);//var_dump($product_new);
?>
<div class="gb-maysanxuat_cuanhom"> 

    <div class="row">

        <?php 

        $d = 0;

        foreach ($product_hot as $item) { 
            $d++;
            $row = $mshopkeeper->get_product_gb($item['Id']);
        ?>

        <div class="col-md-3 col-sm-3 col-sx-3">

            <div class="gb-product-item_cuanhom">

                <div class="gb-product-item_cuanhom-img">

                    <a class="boxImgProductHome" href="/<?= $row['friendly_url'] ?>"><img src="<?= $item['Picture'] ?>" alt="<?= $item['Name'] ?>" class="img-responsive"></a>


                    <div class="gb-product-item_cuanhom-text">

                        <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['Name'] ?></a></h2> 
                        
                         

                        <!-- <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home6'] ?></div> -->

                        <div class="box_info_product"> 
                            <div class="box_price_product">
                                <span class="price_product"><?= number_format($item['SellingPrice']) ?> đ</span>
                                <span class="price_product" style="float: right;">
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
                                </span>
                                <div style="clear:both"></div>
                                <!-- <span class="old_price"><?= number_format($row['product_price']) ?></span> -->
                            </div>
                            <!-- <div class="rating"><i class="iconfont-top4"></i>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <i class="glyphicon glyphicon-star-empty"></i></div> -->
                            <div class="actionProHome">                                            
                                <a href="javascript:void(0)" class="add_cart" onclick="load_url('<?= $row['product_id'] ?>', '<?= $item['Name'] ?>', '<?= $item['SellingPrice']; ?>')">
                                    <i class="iconfont-cart3"></i>
                                    <span>Thêm vào giỏ</span>
                                </a>
                                <!-- <a href="#" class="view_detail" title="Xem chi tiết"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="#" class="add_favorite" title="Thêm yêu thích"><i class="glyphicon glyphicon-heart"></i></a>
                                <a href="#" class="add_compare" title="Thêm so sánh"><i class="glyphicon glyphicon-refresh"></i></a> -->
                                <a href="#" class="add_compare" title="cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php 

        if ($d%4==0) {

            echo '<hr style="width:100%;border:0;" />';

        }

        } ?>

    </div>

</div>