<?php 

    $msxcn_cat = $action_product->getProductCatLangDetail_byId(140, $lang);

    $msxcn = $action->getList('product', 'product_favorite', 1, 'product_id', 'desc', '', '4', '');//var_dump($msxcn);

?>

<div class="gb-maysanxuat_cuanhom"> 

    <div class="row">

        <?php 

        $d = 0;

        foreach ($msxcn as $item) { 

            $d++;
            $row = $item;
            $rowLang = $action_product->getProductLangDetail_byId($item['product_id'], $lang);

        ?>

        <div class="col-md-3 col-sm-3 col-sx-6">

            <div class="gb-product-item_cuanhom">

                <div class="gb-product-item_cuanhom-img">

                    <a class="boxImgProductHome" href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>


                    <div class="gb-product-item_cuanhom-text">

                        <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h2> 
                        <?php $price =  $item?>
                         

                        <!-- <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home6'] ?></div> -->

                        <div class="box_info_product"> 
                            <div class="box_price_product">
                                <span class="price_product"><?= number_format($price['product_price']*(100-$price['product_price_sale'])/100) ?></span>
                                <div style="clear:both"></div>
                                <span class="old_price"><?= number_format($price['product_price']) ?></span>
                            </div>
                            <!--<div class="rating"><i class="iconfont-top4"></i>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <i class="glyphicon glyphicon-star-empty"></i></div>-->
                            <div class="actionProHome">                                            
                                <a href="javascript:void(0)" class="add_cart" onclick="load_url('<?= $row['product_id'] ?>', '<?= $rowLang['lang_product_name'] ?>', '<?= $row['product_price']-($row['product_price']*($row['product_price_sale']/100));?>')">
                                    <i class="iconfont-cart3"></i>
                                    <span>Thêm vào giỏ</span>
                                </a>
                                <a href="#" class="view_detail" title="Xem chi tiết"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="#" class="add_favorite" title="Thêm yêu thích"><i class="glyphicon glyphicon-heart"></i></a>
                                <a href="#" class="add_compare" title="Thêm so sánh"><i class="glyphicon glyphicon-refresh"></i></a>
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