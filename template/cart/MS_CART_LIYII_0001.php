

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-lg btnLightBox1 btn_addCart" data-toggle="modal" data-target="#myModal1">THÊM VÀO GIỎ HÀNG</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <p class="text-uppercase sp-cart-title"> shopping cart</p>
                </div>
                <div class="modal-body">
                    <div class="row" id="popup-cart">
                        <ul>
                            <?php
                            $total_popup = 0; 
                            foreach ($_SESSION['shopping_cart'] as $item) { 
                                $total_popup += $item['product_quantity'] * $item['product_price'];
                                $product_popup = $action->getDetail('product', 'product_id', $item['product_id']);
                                $product_popup1 = $mshopkeeper->get_product($product_all, $product_popup['mshopkeeper_id']);
                            ?>
                            <li style="clear: both;padding-top: 5px;">
                                <button type="button" class="close" onclick="popup_cart_del(<?= $item['product_id'] ?>)">&times;</button>
                                <a href="/<?= $product_popup['friendly_url'] ?>">
                                    <img src="<?= $product_popup1['Picture'] ?>">
                                    <?= $item['product_name'] ?>
                                </a>
                                <span><?= $item['product_quantity'] ?> x <?= number_format($item['product_price']) ?> đ</span>
                            </li>
                            <?php } ?>
                        </ul>
                        <hr>
                        <p class="price-cart">
                            <strong class="text-uppercase">Tổng tiền: <?= number_format($total_popup) ?> đ</strong>
                        </p>
                        <p class="buttons text-uppercase">
                           <a href="/gio-hang" class="button btn-cart-view wc-forward">View cart</a> 
                           <a href="/thanh-toan" class="button checkout wc-forward">Checkout</a>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
<script type="text/javascript">
    function popup_cart_del (id) {
        // alert(id);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("popup-cart").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/functions/ajax/popup-cart-del.php?id="+id, true);
          xhttp.send();
    }
</script>
