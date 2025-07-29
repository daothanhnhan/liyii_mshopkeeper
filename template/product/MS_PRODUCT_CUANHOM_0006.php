<?php 

    $linhkien_cat = $action_product->getProductCatLangDetail_byId(151, $lang);

    $linhkien = $action_product->getProductList_byMultiLevel_orderProductId(151, 'desc', 1, 6, '');//var_dump($msxcn);

?>

<div class="gb-linhkienthaythe_cuanhom">

    <div  class="gb-maysanxuat_cuanhom_title">

        <h2><?= $linhkien_cat['lang_productcat_name'] ?></h2>

    </div>

    <div class="row">

        <?php 

        $d = 0;

        foreach ($linhkien['data'] as $item) { 

            $d++;

            $rowLang = $action_product->getProductLangDetail_byId($item['product_id'], $lang);

        ?>

        <div class="col-sm-4">

            <div class="gb-product-item_cuanhom">

                <div class="gb-product-item_cuanhom-img">

                    <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>

                </div>

                <div class="gb-product-item_cuanhom-text">

                    <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h2>

                    <p>Mã sản phẩm: <?= $item['product_code'] ?></p>
                    <?php $price =  $item?>
                    <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_0009.php";?>
                    <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home6'] ?></div>

                </div>

            </div>

        </div>

        <?php 

        if ($d%3==0) {

            echo '<hr style="width:100%;border:0;" />';

        }

        } ?>

    </div>

</div>