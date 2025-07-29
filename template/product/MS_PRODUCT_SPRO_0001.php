<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<?php

$product_hot = $mshopkeeper->get_products_hot($product_all, 12);
?>
<div  class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <h2>SẢN PHẨM HOT</h2>
        <div class="btn-xemtatca"><a href="san-pham">
                Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a></div>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="gb-product-show_slide-three-item owl-carousel owl-theme"style="font-family: -webkit-pictograph;font-size: 19px;">
                <?php                            
                foreach ($product_hot as $item) {                             
                    $row = $mshopkeeper->get_product_gb($item['Id']);                        
                ?>
                    <div class="item">
                        <div class="product-item">
                            <!--BOX SALE-->
                            <?php // include DIR_PRODUCT."MS_PRODUCT_SPRO_0005.php";?> 
                            <div class="item-img"> 
                                <a href="/<?= $row['friendly_url'] ?>">
                                    <img src="<?= $item['Picture'] ?>" alt="<?= $item['Name'] ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="item-text">
                                <h3>
                                    <a href="/<?= $row['friendly_url'] ?>"style="color:#000"><?= $item['Name'] ?></a>
                                </h3>
                                    <!--PRICE--> <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0002.php";?>
                                    <!--Mô tả ngắn--> <?php //include DIR_PRODUCT."MS_PRODUCT_SPRO_0012.php";?>
                                    <!--Add to cart--> <?php //include DIR_CART."MS_CART_SPRO_0003.php";?>
                                </div>
                            </div>
                        </div> <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-product-show_slide-three-item').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: true,
            navText: [],
            dots: false,
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                560: {
                    items: 3,
                    slideBy: 3,
                    nav:true
                },
                768: {
                    items: 4,
                    slideBy: 4,
                    nav:true
                }
            }
        });
    });
</script>

