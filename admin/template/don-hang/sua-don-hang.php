<?php
if ($acc->checkMod()) {
    $acc->redirect("index.php");
}
if(isset($_GET['id_cart'])){
    $id = $_GET['id_cart'];
}else{
    header("location:index.php?page=don-hang");
}
$form_payment = array(
    0 => '',
    1 => 'Thanh toán khi giao hàng (COD)',
    2 => 'Chuyển khoản qua ngân hàng',
    3 => 'Nhận hàng tại cửa hàng',
    4 => 'Thanh toán trực tuyến bằng ứng dụng Internet Banking với QR Code, thẻ ATM /Visa/Master Card/JCB'
);
?>
<form id="updateOrder">
    <input type="hidden" id="parent_id" name="id_cart" value="<?php echo $id;?>"/>
    <input type="hidden" name="action" value="updateOrder">
    <?php

    $order = new action_order();
    $rowOrder = $order->getOrderDetail($id);
    $listOrderDetail =  $order->getlistOrderDetailByCartId($rowOrder['id_cart']);
    $orderStates = $order->getOrderState();
    ?>

    <script type="text/javascript">
        !function ($, window, document, _undefined){

            $('#updateOrder').on('click', '.deleteDetailID', function (e) {
                e.preventDefault()
                if (window.confirm('Bạn chuẩn bị xóa chi tiết đơn hàng, nếu trong đơn hàng chỉ có 1 sản phẩm thì sẽ xóa toàn bộ đơn hàng.\nBấm "OK" để tiếp tục, "Hủy" để dừng lại.')) {
                    var select = $(this), cart_id = select.closest('form').find('#parent_id').val(),
                        detail_id = select.data('id'),
                        submit = function () {
                            $.post('ajax.php', {
                                cart_id: cart_id,
                                detail_id: detail_id,
                                action: 'deleteOrderDetail'
                            }).done(function (data) {
                                console.log(data);
                                alert(data['status_text']);
                                if('true' == data['redirect']) {
                                    window.location.href = "/admin/index.php?page=don-hang";
                                } else {
                                    window.location.reload();
                                }
                            }).fail(function (t) {
                                alert('Lỗi, bạn vui lòng thử lại sau');
                                console.table(t);
                            });
                        };
                    return submit();
                }
                return false;
            });

        }(jQuery, this, document)


    </script>

    <div class="rowNodeContentPage">
        <div class="coverContentPage">
            <div class="row">
                <div class="contentPage">
                    <div class="box1">
                        <h2>Chi tiết đơn hàng số #<?php echo $rowOrder['id_cart'];?></h2>
                        <h3><?php echo $rowOrder['name_orderState'];?></h3>
                        <ul class="list_item_order">
                            <?php
                            $totalprice = 0;
                            foreach ($listOrderDetail as $rowOrderDetail) {
                                ?>
                                <li class="item_order">
                                        <span class="item_image">
                                            <img src="../images/<?php echo $rowOrderDetail['product_img'];?>" alt="">
                                        </span>
                                    <span class="item_name">
                                            <a href="index.php?page=sua-san-pham&id=<?php echo $rowOrderDetail['product_id'];?>"><?php echo $rowOrderDetail['product_name'] ;?></a>
                                        </span>
                                    <span class="item_price">
                                            <?php echo number_format($rowOrderDetail['price_product'],"0","",".");?>
                                        </span>
                                    <span class="countwidth">x</span>
                                    <span class="item_quantity">
                                        <input type="number" style="width: 30px;" name="qyt_product[<?= $rowOrderDetail['id_cartDetail'] ?>]" value="<?= $rowOrderDetail['qyt_product'] ?>">
                                    </span>

                                    <span class="item_total_price">
                                            <?php echo number_format($rowOrderDetail['totalprice_product'],"0","",".");?>
                                        </span>
                                    <span class="item-delete-detail">
                                        <a href="javascript:;" class="deleteDetailID" data-id="<?= $rowOrderDetail['id_cartDetail'] ?>">Xóa</a>
                                    </span>
                                </li>
                                <?php
                                $totalprice += $rowOrderDetail['totalprice_product'];
                            }
                            ?>
                        </ul>
                        <div class="infor-order">
                            <span>Tạm tính: </span>
                            <span class="price"><?php echo number_format($totalprice, "0","",".");?> đ</span><br>
                            <span>Phí vận chuyển: </span>
                            <span class="price"><?php echo number_format($rowOrder['ship'], "0","",".");?> đ</span><br>
                            <span>Khuyến mãi: </span>
                            <span class="price"><?php echo number_format($rowOrder['sale'], "0","",".");?> đ</span><br>
                            <span>Tổng tiền: </span>
                            <span class="price"><?php echo number_format($totalprice+$rowOrder['ship']-$rowOrder['sale'], "0","",".");?> đ</span>
                        </div>
                    </div>

                    <div class="box2">
                        <h2>Chi tiết đơn hàng</h2>
                        <label for="inputTxtNote">Ghi chú</label>
                        <textarea name="note_cart" id="inputTxtNote" cols="30" class="longtxtNCP2" rows="10" placeholder="Nhập ghi chú về đơn hàng"><?php echo $rowOrder['note_cart'];?></textarea>

                        <label for="name_buyer">Tên: </label>
                        <input type="text" class="form-control" name="name_buyer" value="<?= $rowOrder['name_buyer']; ?>">

                        <label for="phone_buyer">Số điện thoại: </label>
                        <input type="text" class="form-control" name="phone_buyer" value="<?= $rowOrder['phone_buyer']; ?>">

                        <label for="address_buyer">Địa chỉ: </label>
                        <input type="text" class="form-control" name="address_buyer" value="<?= $rowOrder['address_buyer']; ?>">

                        <label for="mail_buyer">Email: </label>
                        <input type="text" class="form-control" name="mail_buyer" value="<?= $rowOrder['mail_buyer']; ?>">

                        <label for="note_buyer">Ghi chú: </label>
                        <input type="text" class="form-control" name="note_buyer" value="<?= $rowOrder['note_buyer']; ?>">

                        <label for="inputSelect">Trạng thái đơn hàng</label>
                        <select name="id_orderState" id="inputSelect" class="form-control">
                            <?php
                            foreach ($orderStates as $orderState) {
                                ?>
                                <option <?php if($orderState['order_state_id'] == $rowOrder['id_orderState']){ echo "selected";}?> value="<?php echo $orderState['order_state_id'];?>"><?php echo $orderState['order_state_name'];?></option>
                                <?php
                            }
                            ?>

                        </select>

                        <label for="note_buyer">Thành phố: </label>
                        <input type="text" class="form-control" name="city1" value="<?= $rowOrder['city1']; ?>">

                        <label for="note_buyer">Quận huyện: </label>
                        <input type="text" class="form-control" name="district1" value="<?= $rowOrder['district1']; ?>">
                        <h3>Thông tin nhận hàng</h3>

                        <label for="note_buyer">Tên: </label>
                        <input type="text" class="form-control" name="name" value="<?= $rowOrder['name']; ?>">

                        <label for="note_buyer">Điện thoại: </label>
                        <input type="text" class="form-control" name="phone" value="<?= $rowOrder['phone']; ?>">

                        <label for="note_buyer">Địa chỉ: </label>
                        <input type="text" class="form-control" name="address" value="<?= $rowOrder['address']; ?>">

                        <label for="note_buyer">Thành phố: </label>
                        <input type="text" class="form-control" name="city2" value="<?= $rowOrder['city2']; ?>">

                        <label for="note_buyer">Quận huyện: </label>
                        <input type="text" class="form-control" name="district2" value="<?= $rowOrder['district2']; ?>">

                        <label for="note_buyer">Hình thức thanh toán: </label>
                        <input type="text" class="form-control" name="district2" value="<?= $form_payment[$rowOrder['payment']]; ?>">

                    </div>

                </div>
                <div class="sideCusInfo">
                    <h4>Thông tin khách hàng</h4>
                    <hr>

                    <div class="CusInfo">
                        <p><strong>Tên:</strong> <?php echo $rowOrder['name_buyer'];?></p>
                        <p><strong>Số điện thoại:</strong> <?php echo $rowOrder['phone_buyer'];?></p>
                        <p><strong>Địa chỉ:</strong> <?php echo $rowOrder['address_buyer'];?></p>
                        <p><strong>Email:</strong> <?php echo $rowOrder['mail_buyer'];?></p>
                        <p><strong>Ghi chú:</strong> <?php echo $rowOrder['note_buyer'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->
    <button type="button" class="btn btn-danger pull-right" data-id="<?= $rowOrder['id_cart']; ?>" data-action="deleteOrder" id="deleteOrder">Xóa</button>
    <button class="btn btnSave">Lưu</button>
</form>
