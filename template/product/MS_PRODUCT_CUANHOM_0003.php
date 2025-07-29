<?php                              
    $product_all = $mshopkeeper->get_products_all_db();                                          
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];

        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);
        $rows = $action_product->getProductList_byMultiLevel_orderProductId($rowCat['productcat_id'],'desc',$trang,12,$slug);//var_dump($rows);
    }else{
        $rows = $action->getList('product','','','product_id','desc',$trang,12,'san-pham');
    }
    
    $_SESSION['sidebar'] = 'productCat';
?>
<div class="container">
<div class="gb-maysanxuat_cuanhom">

    <div  class="gb-maysanxuat_cuanhom_title">

        <h2><span><?= $rowCatLang['lang_productcat_name'] ?></span></h2>

    </div>

    <div class="row">

        <?php 

        $d = 0;

        foreach ($rows['data'] as $row) { 

            $d++;
            $item = $mshopkeeper->get_product($product_all, $row['mshopkeeper_id']);//var_dump($item);

        ?>

        <div class="col-md-3 col-sm-6 col-xs-6">

            <div class="gb-product-item_cuanhom">

                <div class="gb-product-item_cuanhom-img">

                    <a class="boxImgProductHome zoom" id="ex1" href="/<?= $row['friendly_url'] ?>"><img src="<?= $item['Picture'] ?>" alt="<?= $item['Name'] ?>" class="img-responsive"></a>


                    <div class="gb-product-item_cuanhom-text">

                        <h2><a href="/<?= $row['friendly_url'] ?>"><?= $item['Name'] ?></a></h2> 
                        <?php $price =  $item?>
                         

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
                                <a href="javascript:void(0)" class="add_cart" onclick="load_url('<?= $row['product_id'] ?>', '<?= $item['Name'] ?>', '<?= $item['SellingPrice'];?>')">
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
    <div style="text-align: center;"><?= $rows['paging'] ?></div>
</div>
</div>
<!-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
<script src='/js/jquery.zoom.js'></script>
<script>
    $(document).ready(function(){
        $('.zoom').zoom();
    });
</script>