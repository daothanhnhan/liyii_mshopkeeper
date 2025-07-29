<?php 
    session_start();
    include_once dirname(__FILE__) . "/../database.php";
    include_once dirname(__FILE__) . "/../library.php";
    include_once dirname(__FILE__) . "/../action.php";
    include_once dirname(__FILE__) . "/../action_mshopkeeper.php";
    $mshopkeeper = new action_mshopkeeper();
    $product_all = $mshopkeeper->get_products_all_db();

    $name = $_GET['district'];
    $action = new action();
    $district = $action->getDetail('district', 'name', $name);
    if ($name == '' || $name == 'Quận/Huyện khác') {
        $_SESSION['cart_ship'] = 0;
    } else {
        $_SESSION['cart_ship'] = $district['fee'];
    }
?>
<table class="table table-bordered">  
                                                        <tr>  
                                                             <th width="60%" style="font-weight: bold;">Sản phẩm</th>  
                                                             <th width="40%" style="font-weight: bold;">Đơn giá</th>  
                                                        </tr>  
                                                        <?php  
                                                        if(!empty($_SESSION["shopping_cart"]))  
                                                        {  
                                                             $total = 0;  
                                                             foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                                             {                      
                                                                $id_msk = $action->getDetail('product', 'product_id', $values['product_id'])['mshopkeeper_id'];
                                                                $img = $mshopkeeper->get_product($product_all, $id_msk)['Picture'];                         
                                                        ?>  
                                                        <tr>  
                                                             <td><img src="<?= $img ?>" width="100"><br><?php echo $values["product_name"]; ?></td>   
                                                             <td align="right"><?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?> VNĐ</td>  
                                                        </tr>  
                                                        <?php  
                                                                  $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                                             }  
                                                        ?>  
                                                        <tr>  
                                                             <td align="left" style="font-weight: bold;">Tạm tính</td>  
                                                             <td align="right" style="font-weight: bold;"><?php echo number_format($total, 2); ?> VNĐ</td>  
                                                        </tr>    
                                                        <tr>  
                                                             <td align="left" style="font-weight: bold;">Phí vận chuyển</td>  
                                                             <td align="right" style="font-weight: bold;"><?php echo number_format($_SESSION['cart_ship'], 2); ?> VNĐ</td>  
                                                        </tr>
                                                        <tr>  
                                                             <td align="left" style="font-weight: bold;">Tổng cộng</td>  
                                                             <td align="right" style="font-weight: bold;"><?php echo number_format($total+$_SESSION['cart_ship'], 2); ?> VNĐ</td>  
                                                        </tr>
                                                        <?php  
                                                        }  
                                                        ?>  
                                                   </table>  