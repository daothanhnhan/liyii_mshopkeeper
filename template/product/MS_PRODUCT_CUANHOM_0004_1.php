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
?>
<script type="text/javascript">
   $(document).ready(function(data){  
      $('.btn_addCart').click(function(){  
         // var product_id = $(this).attr("id");
           var product_id = $('#product_id').val();
           var product_name = $('#product_name').val();  
           var product_price = $('#product_price').val();  
           var product_quantity = $('.number_cart').val();  
           var action = "add";
           // var size = $('#size').val();
           // alert(size);return false;
           // var a = {a : 'a'};
           if(product_quantity > 0)  
           {                  
                 $.ajax({  
                     url:"/functions/ajax.php?action=add_cart",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          // product_size:size,
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          // $('#order_table').html(data.order_table);  
                          // $('.badge').text(data.cart_item);  
                          if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                              window.location = '/gio-hang';
                          }else{
                              location.reload();
                              // window.location = '/gio-hang';
                          }  
                     },
                     error: function () {
                        alert('loi');
                     }  
                });  

           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });
   });
 </script>
<div class="cf_detailProduct">  
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <div class="box_image">
                    <div class="sub_image"> 
                            <div id="gallery_09">
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="/images/<?= $row['product_img'] ?>" data-zoom-image="/images/<?= $row['product_img'] ?>">
                                <img src="/images/<?= $row['product_img'] ?>"></a>
                                <?php 
                                      $d = 1;
                                      foreach ($img_sub as $item) {
                                          $d++;
                                          $image = json_decode($item, true);?>
                                <a href="#" class="elevatezoom-gallery" data-image="/images/<?= $image['image'] ?>" data-zoom-image="/images/<?= $image['image'] ?>"><img src="/images/<?= $image['image'] ?>"></a>
                                <?php } ?>
                               
                            </div>

                            <img id="zoom_09" class="bigImgDetail" src="/images/<?= $row['product_img'] ?>" data-zoom-image="/images/<?= $row['product_img'] ?>" style="cursor: pointer;" /> 
                            <br />
                        <script>
                            $("#zoom_09").elevateZoom({
                                    gallery : "gallery_09",
                                    galleryActiveClass: "active"
                                        }); 
                             $("#select").change(function(e){
                           var currentValue = $("#select").val();
                           if(currentValue == 1){    
                           smallImage = 'images/small/kkkkk01.jpg';
                           productImage = 'images/product/kkkkk01.jpg';
                           }
                           if(currentValue == 2){    
                           smallImage = 'images/small/kkkkk02.jpg';
                           productImage = 'images/product/kkkkk02.jpg';
                           }
                           if(currentValue == 3){    
                           smallImage = 'images/small/kkkkk03.jpg';
                           productImage = 'images/product/kkkkk03.jpg';
                           }
                           if(currentValue == 4){    
                           smallImage = 'images/small/kkkkk04.jpg';
                           productImage = 'images/product/kkkkk04.jpg';
                           }
                            // Example of using Active Gallery
                          $('#gallery_09 a').removeClass('active').eq(currentValue-1).addClass('active');       
                         
                         
                             var ez =   $('#zoom_09').data('elevateZoom');    
                           
                          ez.swaptheimage(smallImage, productImage); 
                             
                            });


                        </script>
                        
                    </div>
                </div> <!-- end box_image -->
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="box_caption">
                    <h1 class="name_pro"><?= $rowLang['lang_product_name'] ?></h1>
                    <p class="sub_title">
                        <strong>Thông Tin Tổng Quát:</strong><br> 
                        <?= str_replace("\r\n", "<br>", $rowLang['lang_product_des']) ?>
                        </p>
                    <input type="number" name="" value="1" placeholder="" class="number_cart">
                    <input type="hidden" name="id" id="product_id" value="<?php echo $rowLang['product_id'];?>">
                    <input type="hidden" name="name" id="product_name" value="<?= $rowLang['lang_product_name'];?>">
                    <input type="hidden" name="price" id="product_price" value="<?php echo $row['product_price']-($row['product_price']*($row['product_price_sale']/100));?>">
                    <div class="boxChooseSize01">
                      <p class="titleSelectSize">Chọn Size Quần</p>
                      <div>
                        <div class="chiller_cb">
                          <input id="myCheckbox" type="radio" name="size quần" checked>
                          <label for="myCheckbox">28</label>
                          <span></span>
                        </div>
                        <div class="chiller_cb">
                          <input id="myCheckbox2" type="radio" name="size quần">
                          <label for="myCheckbox2">29</label>
                          <span></span>
                        </div>
                        <div class="chiller_cb">
                          <input id="myCheckbox3" type="radio" name="size quần">
                          <label for="myCheckbox3">30</label>
                          <span></span>
                        </div>
                        <div class="chiller_cb">
                          <input id="myCheckbox4" type="radio" name="size quần">
                          <label for="myCheckbox4">31</label>
                          <span></span>
                        </div>
                        <div class="chiller_cb">
                          <input id="myCheckbox5" type="radio" name="size quần">
                          <label for="myCheckbox5">32</label>
                          <span></span>
                        </div>
                        <div class="chiller_cb">
                          <input id="myCheckbox6" type="radio" name="size quần">
                          <label for="myCheckbox6">33</label>
                          <span></span>
                        </div>
                        <div class="chiller_cb">
                          <input id="myCheckbox7" type="radio" name="size quần">
                          <label for="myCheckbox7">34</label>
                          <span></span>
                        </div>
                      </div>
                    </div>

                    <div class="boxChooseSize02">
                      <p class="titleSelectSize">Chọn Size Áo</p>
                      <div>
                        <div class="chiller_cb">
                        <input id="myCheckbox_1" type="radio" name="size áo" checked>
                        <label for="myCheckbox_1">M</label>
                        <span></span>
                      </div>
                      <div class="chiller_cb">
                        <input id="myCheckbox_2" type="radio" name="size áo">
                        <label for="myCheckbox_2">L</label>
                        <span></span>
                      </div>
                      <div class="chiller_cb">
                        <input id="myCheckbox_3" type="radio" name="size áo">
                        <label for="myCheckbox_3">XL</label>
                        <span></span>
                      </div>
                      <div class="chiller_cb">
                        <input id="myCheckbox_4" type="radio" name="size áo">
                        <label for="myCheckbox_4">XXL</label>
                        <span></span>
                      </div>
                      <div class="chiller_cb">
                        <input id="myCheckbox_5" type="radio" name="size áo">
                        <label for="myCheckbox_5">XXXL</label>
                        <span></span>
                      </div>
                    </div>
                  </div>

                    <button type="submit" class="btn_addCart">Thêm vào giỏ</button>
                    <span class="add_favorite"><i class="glyphicon glyphicon-heart"></i></span>
                    <span class="add_compare"><i class="glyphicon glyphicon-refresh"></i></span>   
                    <div class="rating">
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <i class="glyphicon glyphicon-star-empty"></i>
                        <a href="#" title="">0 Bình luận</a>
                    </div>
                    <hr>
                    <div id="unik" data-ayoshare="https://facebook.com"></div>

                    
                </div> <!-- end box_cation -->
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="sidebar_pro_relate">
                    <div class="header_siderbar">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                    <ul class="list_pro_relate">
                        <?php 
                        foreach ($product_related1 as $item) {
                            $row_pe = $item;
                            $rowLang_pe = $action_product->getProductLangDetail_byId($row_pe['product_id'],$lang);
                        ?>
                        <li class="item_pro_relate">
                            <a href="/<?= $rowLang_pe['friendly_url'] ?>" class="image"><img src="/images/<?= $row_pe['product_img'] ?>" alt="<?= $rowLang_pe['lang_product_name'] ?>"></a>
                            <div class="content_pro_relate">
                                <div class="cover_conten_pro_relate">
                                    <a href="/<?= $rowLang_pe['friendly_url'] ?>" title=""><?= $rowLang_pe['lang_product_name'] ?></a>
                                    <div class="box_price">
                                        <span class="current_price"><?= number_format($row_pe['product_price']) ?> VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="content_tab">
                
                    <span class="span-tab">
                        <span class=" span_tab"><a href="#tab_1">Mô tả</a></span>
                        <span class=" span_tab"><a href="#tab_2">Đánh giá (0)</a></span>
                    </span>
                    <div class="span_tab_content" id="tab_1">
                        <?= $rowLang['lang_product_content'] ?>
                    </div>
                    <div class="span_tab_content tab2" id="tab_2">
                        <p>Không có đánh giá cho sản phẩm này</p>
                        <h2>Gửi bình luận</h2>
                        <label class="title_comment">Họ và tên</label>
                        <input type="text" name=""  id="input" class="form-control" value="" required="required" pattern="" title="">
                        <label class="title_comment">Nội dung</label>
                        <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea> 

                        <button type="submit">Tiếp tục</button>
                    </div>
               
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="content_tab">
                    <span class="span-tab2">
                        <span class="span_tab2"><a href="#tab_3" class="active-span-tab2">Sản phẩm nổi bật</a></span>
                        <span class="span_tab2"><a href="#tab_4" class="">Sản phẩm phổ biến</a></span>
                        <span class="span_tab2"><a href="#tab_5" class="">Sản phẩm mới</a></span>
                    </span>
                    <div class="span_tab_content2" id="tab_3" style="display: block;">                        
                        <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_SUB_001.php";?>
                    </div>
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