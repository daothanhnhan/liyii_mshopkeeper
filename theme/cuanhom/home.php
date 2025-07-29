<?php 
    $product_all = $mshopkeeper->get_products_all_db();//var_dump($product_all);die;
?>

<!--CONTENT-->

<div class="Content-Main">


                <!--SLIDESHOW-->

                <?php include DIR_SLIDESHOW."MS_SLIDESHOW_CUANHOM_0001.php";?>
    
     <div class="container">

        <div class="row"> 

            <div class="col-sm-12">
                <div class="Khuyen-mai" style="">
                    <p>UP TO 70% OFF THE ENTIRE STORE! · MADE WITH LOVE by X-Temos <p>
                </div>

                <!--SẢN PHẨM MỚI VỀ-->

                <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0006.php";?>
                <!--SẢN PHẨM HOT-->
                <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0001.php";?>

                <!--Ý KIẾN KHÁCH HÀNG-->

                <?php //include DIR_BANNER."MS_BANNER_CUANHOM_0001.php";?>
               
                <?php include DIR_CUSTOMER."MS_CUSTOMER_LIYII_0001.php";?>
                <!--MÁY SẢN XUẤT CỦA NHÔM-->

                <?php //include DIR_PRODUCT."MS_PRODUCT_CUANHOM_0001.php";?>

                <!--Linh kiện thay thế-->

                <?php //include DIR_BANNER."MS_BANNER_CUANHOM_0002.php";?>

                <!--MÁY SẢN XUẤT CỦA NHÔM-->

                <?php //include DIR_PRODUCT."MS_PRODUCT_CUANHOM_0002.php";?>
                <!--Phụ kiện-->
                <?php include DIR_PRODUCT."MS_PRODUCT_LIYII_0007.php";?>
                
                <?php include DIR_CHARACTERISTICS."MS_CHARACTERISTICS_CUANHOM_0001.php";?>
                
            </div>

        </div>

    </div>
</div>

