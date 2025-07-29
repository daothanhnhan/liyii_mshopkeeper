<div class="gb-addtocart">
    <!-- <button type="submit" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart">Thêm vào giỏ hàng</button> -->
    <!-- <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart">Thêm vào giỏ hàng</button> -->
    <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart" onclick="load_url('<?php echo $row1['product_id'];?>', '<?php echo $row1['product_name'];?>', '<?php echo $row1['product_price']-($row1['product_price']*($row1['product_price_sale']/100));?>')"">
    	Mua ngay
    	<!-- <a href="javascript:void(0)" >Add to cart</a> -->
    </button>
</div>
