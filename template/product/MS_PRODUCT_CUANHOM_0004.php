<?php 
    $action_product = new action_product(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);
    $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);
    $_SESSION['productcat_id_relate'] = $row[$nameColIdProductCat_product];
    $_SESSION['sidebar'] = 'productDetail';
    $arr_id = $row['productcat_ar'];
    $arr_id = explode(',', $arr_id);
    $productcat_id = (int)$arr_id[0];
    // $product_breadcrumb = $action_product->getProductCatLangDetail_byId($productcat_id, $lang);
    // $breadcrumb_url = $product_breadcrumb['friendly_url'];
    // $breadcrumb_name = $product_breadcrumb['lang_productcat_name'];
    // $use_breadcrumb = true;

    $img_sub = json_decode($row['product_sub_img']);

    $product_related1 = $action_product->getListProductRelate_byIdCat_hasLimit($productcat_id, 3);
    ///////////////
    $product_all = $mshopkeeper->get_products_all_db();//var_dump($product_all);
    $product_msk = $mshopkeeper->get_product($product_all, $row['mshopkeeper_id']);//var_dump($product_msk);
?>
<script type="text/javascript">
    $(document).ready(function (data) {
        $('.btn_addCart').click(function () {
            // var product_id = $(this).attr("id");
            var product_id = $('#product_id').val();
            var product_name = $('#product_name').val();
            var product_price = $('#product_price').val();
            var product_quantity = $('.number_cart').val();
            var action = "add";
            // var size = $('#size').val();
            // alert(size);return false;
            // var a = {a : 'a'};
            if (product_quantity > 0) {
                $.ajax({
                    url: "/functions/ajax.php?action=add_cart",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        // product_size:size,
                        action: action
                    },
                    success: function (data) {
                        // $('#order_table').html(data.order_table);  
                        // $('.badge').text(data.cart_item);  
                        // if (confirm(
                        //         'Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không'
                        //     )) {
                        //     window.location = '/gio-hang';
                        // } else {
                        //     location.reload();
                            
                        // }
                        popup_cart();
                    },
                    error: function () {
                        alert('loi');
                    }
                });

            } else {
                alert("Please Enter Number of Quantity")
            }
        });
    });

    function popup_cart () {
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("popup-cart").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/functions/ajax/popup-cart.php", true);
          xhttp.send();
    }
</script>

<div class="cf_detailProduct">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box_image">
                    <div class="sub_image">
                        <div id="gallery_09">
                            <a href="#" class="elevatezoom-gallery active" data-update=""
                                data-image="<?= $product_msk['Picture'] ?>"
                                data-zoom-image="<?= $product_msk['Picture'] ?>">
                                <img src="<?= $product_msk['Picture'] ?>"></a>
                            <?php 
                                      $d = 1;
                                      foreach ($img_sub as $item) {
                                          $d++;
                                          $image = json_decode($item, true);?>
                            <a href="#" class="elevatezoom-gallery" data-image="/images/<?= $image['image'] ?>"
                                data-zoom-image="/images/<?= $image['image'] ?>"><img
                                    src="/images/<?= $image['image'] ?>"></a>
                            <?php } ?>

                        </div>

                        <img id="zoom_09" class="bigImgDetail" src="<?= $product_msk['Picture'] ?>"
                            data-zoom-image="<?= $product_msk['Picture'] ?>" style="cursor: pointer;" />
                        <br />
                        <script>
                            $("#zoom_09").elevateZoom({
                                gallery: "gallery_09",
                                galleryActiveClass: "active"
                            });
                            $("#select").change(function (e) {
                                var currentValue = $("#select").val();
                                if (currentValue == 1) {
                                    smallImage = 'images/small/kkkkk01.jpg';
                                    productImage = 'images/product/kkkkk01.jpg';
                                }
                                if (currentValue == 2) {
                                    smallImage = 'images/small/kkkkk02.jpg';
                                    productImage = 'images/product/kkkkk02.jpg';
                                }
                                if (currentValue == 3) {
                                    smallImage = 'images/small/kkkkk03.jpg';
                                    productImage = 'images/product/kkkkk03.jpg';
                                }
                                if (currentValue == 4) {
                                    smallImage = 'images/small/kkkkk04.jpg';
                                    productImage = 'images/product/kkkkk04.jpg';
                                }
                                // Example of using Active Gallery
                                $('#gallery_09 a').removeClass('active').eq(currentValue - 1).addClass(
                                    'active');


                                var ez = $('#zoom_09').data('elevateZoom');

                                ez.swaptheimage(smallImage, productImage);

                            });
                        </script>

                    </div>
                </div> <!-- end box_image -->
            </div>
            <div class=" col-md-6 col-sm-6 col-xs-12">
                <div class="box_caption">
                    <h1 class="name_pro"><?= $product_msk['Name'] ?></h1>
                    <p class="sub_title">
                        <strong>Thông Tin Tổng Quát:</strong><br>
                        <?= str_replace("\r\n", "<br>", $rowLang['lang_product_des']) ?>
                    </p>
                    <div style="margin-top: 60px;">
                        <span>Color: </span>
                        <?php 
                        foreach ($product_msk['ListDetail'] as $item) { 
                            $mau = $action->getDetail('color', 'color_name', $item['Id']);
                            if ($mau) { } else {
                                $mau['color_value'] = "#fff";
                            }
                            if ($item['Color'] != '') { 
                        ?>
                         <span style="background: <?= $mau['color_value'] ?>;" class="dot" data-toggle="tooltip" data-placement="top" title="<?= $item['Color'] ?>">&nbsp;</span>
                        <?php } } ?>
                    </div>
                    <div style="margin: 10px auto;">
                        <span>Size: </span>
                        <?php foreach ($product_msk['ListDetail'] as $item) { ?>
                        <span><?= $item['Size'] ?> &nbsp;&nbsp;</span>
                        <?php } ?>
                    </div>
                    <input type="number" name="" value="1" placeholder="" class="number_cart">
                  
                        
                    <div class="detailt-ship">
                        <div class="item">Miễn phí vận chuyển cho đơn hàng từ 499.000₫</div>
                        <div class="item">Đổi trả sản phẩm nguyên giá, giảm giá trong 15 ngày</div>
                    </div>
                    
                    <input type="hidden" name="id" id="product_id" value="<?php echo $rowLang['product_id'];?>">
                    <input type="hidden" name="name" id="product_name" value="<?= $product_msk['Name'];?>">
                    <input type="hidden" name="price" id="product_price"value="<?php echo $product_msk['SellingPrice'] ;?>">
                    
                   
                        <?php include_once DIR_CART."MS_CART_LIYII_0001.php"; ?>
                    
                    <div class="the">
                        <img  src="/images/payments.png" style="margin-top: 19px;    margin-right: 0px;">
                    </div>
                    <!-- <p class="glyphicon glyphicon-heart glyphicon1" style="float: left;">Add to Wishlist</p>
                    <p class="glyphicon glyphicon-refresh glyphicon1" style="float: left;">Compare</p> -->
                    <!--<div class="rating">
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <a href="#" title="">0 Bình luận</a>
                    </div>-->
                    <hr>
                    <div id="unik" data-ayoshare="https://facebook.com"></div>
                </div> <!-- end box_cation -->
            </div>
            
        </div>

        <div class="row"style="margin-top: 20px;">
            <div class="col-md-12">

                <div class="content_tab">

                    <span class="span-tab">
                        <span class=" span_tab"><a href="#tab_1">Mô tả</a></span>
                        <span class=" span_tab"><a href="#tab_2">Đánh giá (0)</a></span>
                    </span>
                    <div class="span_tab_content" id="tab_1">
                        <?php
                        if (!empty($product_msk['Description'])) {
                            echo $product_msk['Description'];
                        } else {
                            echo $rowLang['lang_product_content'];
                        }
                        ?>
                    </div>
                    <div class="span_tab_content tab2" id="tab_2">
                        <p>Không có đánh giá cho sản phẩm này</p>
                        <h2>Gửi bình luận</h2>
                        <label class="title_comment">Họ và tên</label>
                        <input type="text" name="" id="input" class="form-control" value="" required="required"
                            pattern="" title="">
                        <label class="title_comment">Nội dung</label>
                        <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>

                        <button type="submit">Tiếp tục</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="content_tab">
                    <span class="span-tab2 san-pham-sub">
                        <!-- <span class="span_tab2"><a href="#tab_3" class="active-span-tab2">Sản phẩm nổi bật</a></span> -->
                        <span class="span_tab2"><a href="#tab_4" class="active-span-tab2">Sản phẩm hot</a></span>
                        <span class="span_tab2"><a href="#tab_5" class="">Sản phẩm mới</a></span>
                    </span>
                    <!-- <div class="span_tab_content2" id="tab_3" style="display: block;">
                        <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_001.php";?>
                    </div> -->
                    <div class="span_tab_content2" id="tab_4" style="display: block;">
                        <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_002.php";?>
                    </div>
                    <div class="span_tab_content2" id="tab_5" style="display: block;">
                        <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_003.php";?>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  // slick carousel
  $('.detailt-ship').slick({
    dots: false,
    vertical: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    verticalSwiping: true,
    autoplay: true,
    // autoplaySpeed: 2000, 
    autoplayTimeout: 3000,
  });
});
</script>
