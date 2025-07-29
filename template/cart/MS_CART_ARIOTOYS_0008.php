<?php 
    if (isset($_POST['txtName'])){
        $cart->payment1();
    }
    $city = $action->getList('city', '', '', 'id', 'asc', '', '', '');
    $_SESSION['cart_ship'] = 0;
    $product_all = $mshopkeeper->get_products_all_db();
?>
<div class="uni-cart">
    <div id="wrapper-container" class="site-wrapper-container">
        <div id="main-content" class="site-main-content">
            <div class="site-content-area">
                <main id="main" class="site-main">
                    <?php include DIR_BREADCRUMS."MS_BREADCRUMS_ARIOTOYS_0001.php";?>
                    <div class="uni-cart-body">
                        <div id="post" class="container">
                            <h1 class="title-cart">GIỎ HÀNG</h1>
                            <div class="entry-content" style="margin-top: 94px;">
                                <div class="woocommerce">
                                  <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-4" id="toggle-pay">
                                            <div class="section" define="{billing_address: {}}">
                                                <div class="section__header">
                                                    <div class="layout-flex layout-flex--wrap">
                                                        <h2
                                                            class="section__title layout-flex__item layout-flex__item--stretch">
                                                            <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg"
                                                                aria-hidden="true"></i>
                                                            <label class="control-label">Thông tin mua hàng</label>
                                                        </h2>

                                                        <!-- <a class="layout-flex__item section__title--link"
                                                            href="/account/login?returnUrl=/checkout">
                                                            <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                                                            Đăng nhập
                                                        </a> -->

                                                    </div>
                                                </div>
                                                <div class="section__content">
                                                    <div class="form-group" bind-class="{'has-error' : invalidEmail}">
                                                        <div>
                                                            <label class="field__input-wrapper"
                                                                bind-class="{ 'js-is-filled': email }">
                                                                <span class="field__label"
                                                                    bind-event-click="handleClick(this)">
                                                                    Email
                                                                </span>
                                                                <input name="txtEmail" type="email"
                                                                    bind-event-change="changeEmail()"
                                                                    bind-event-focus="handleFocus(this)"
                                                                    bind-event-blur="handleFieldBlur(this)"
                                                                    class="field__input form-control" id="_email"
                                                                    data-error="Vui lòng nhập email đúng định dạng"
                                                                    required="" value=""
                                                                    pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                                                                    bind="email">
                                                            </label>
                                                        </div>
                                                        <div class="help-block with-errors">
                                                        </div>
                                                    </div>
                                                    <div class="billing">
                                                        <div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper"
                                                                    bind-class="{ 'js-is-filled': billing_address.full_name }">
                                                                    <span class="field__label"
                                                                        bind-event-click="handleClick(this)">
                                                                        Họ và tên
                                                                    </span>
                                                                    <input name="txtName" type="text"
                                                                        bind-event-change="saveAbandoned()"
                                                                        bind-event-focus="handleFocus(this)"
                                                                        bind-event-blur="handleFieldBlur(this)"
                                                                        class="field__input form-control"
                                                                        id="_billing_address_last_name"
                                                                        data-error="Vui lòng nhập họ tên" required=""
                                                                        bind="billing_address.full_name">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper"
                                                                    bind-class="{ 'js-is-filled': billing_address.phone }">
                                                                    <span class="field__label"
                                                                        bind-event-click="handleClick(this)">
                                                                        Số điện thoại
                                                                    </span>
                                                                    <input name="txtPhone"
                                                                        bind-event-change="saveAbandoned()" type="tel"
                                                                        bind-event-focus="handleFocus(this)"
                                                                        bind-event-blur="handleFieldBlur(this)"
                                                                        class="field__input form-control"
                                                                        id="_billing_address_phone" required=""
                                                                        data-error="Vui lòng nhập số điện thoại"
                                                                        pattern="^([0-9,\+,\-,\(,\),\.]{8,20})$"
                                                                        bind="billing_address.phone">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper"
                                                                    bind-class="{ 'js-is-filled': billing_address.address1 }">
                                                                    <span class="field__label"
                                                                        bind-event-click="handleClick(this)">
                                                                        Địa chỉ
                                                                    </span>
                                                                    <input name="txtAddress"
                                                                        bind-event-change="saveAbandoned()" type="text"
                                                                        bind-event-focus="handleFocus(this)"
                                                                        bind-event-blur="handleFieldBlur(this)"
                                                                        class="field__input form-control"
                                                                        id="_billing_address_address1"
                                                                        data-error="Vui lòng nhập địa chỉ" required=""
                                                                        bind="billing_address.address1">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div
                                                                    class="field__input-wrapper field__input-wrapper--select">
                                                                    <label class="field__label" for="BillingProvinceId">
                                                                        Tỉnh thành
                                                                    </label>
                                                                    <select
                                                                        class="field__input field__input--select form-control filter-dropdown select2-hidden-accessible"
                                                                        name="city" id="billingProvince"
                                                                        required=""
                                                                        data-error="Bạn chưa chọn tỉnh thành"
                                                                        bind-event-change="billingProviceChange('')"
                                                                        bind="BillingProvinceId"
                                                                        data-select2-id="billingProvince" tabindex="-1"
                                                                        aria-hidden="true" onchange="city1(this)">
                                                                        <option value="" data-select2-id="2">--- Chọn
                                                                            tỉnh thành ---</option>
                                                                        <?php foreach ($city as $item) { ?>
                                                                        <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                                                        <?php } ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>

                                                            <div bind-show="!otherAddress" class="form-group">
                                                                <div
                                                                    class="field__input-wrapper field__input-wrapper--select">
                                                                    <label class="field__label" for="BillingDistrictId">
                                                                        Quận huyện
                                                                    </label>
                                                                    <select
                                                                        class="field__input field__input--select form-control filter-dropdown select2-hidden-accessible"
                                                                        name="district" id="billingDistrict"
                                                                        required=""
                                                                        data-error="Bạn chưa chọn quận huyện"
                                                                        bind-event-change="billingDistrictChange('')"
                                                                        bind="BillingDistrictId"
                                                                        data-select2-id="billingDistrict" tabindex="-1"
                                                                        aria-hidden="true" onchange="shipf(this)">
                                                                        <option value="" data-select2-id="4">--- Chọn
                                                                            quận huyện ---</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            
                                                            <div bind-show="!otherAddress" class="form-group">
                                                                <div class="error hide"
                                                                    bind-show="requiresShipping &amp;&amp; loadedShippingMethods &amp;&amp; shippingMethods.length == 0  &amp;&amp; BillingProvinceId  &amp;&amp; BillingDistrictId  ">
                                                                    <label>Khu vực này không hỗ trợ vận chuyển</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="section pt10">
                                                <div class="section__content">
                                                    <div class="form-group" bind-show="requiresShipping">
                                                        <div class="checkbox-wrapper">
                                                            <div class="checkbox__input">
                                                                <input class="input-checkbox" type="checkbox"
                                                                    value="false" name="other" id="other_address"
                                                                    bind="otherAddress"
                                                                    bind-event-change="changeOtherAddress(this)" onclick="toggle2()">
                                                            </div>
                                                            <label class="checkbox__label" for="other_address">
                                                                Giao hàng đến địa chỉ khác
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper"
                                                            bind-class="{ 'js-is-filled': billing_address.address1 }">
                                                            <span class="field__label"
                                                                bind-event-click="handleClick(this)">
                                                                Ghi chú
                                                            </span>
                                                            <textarea name="txtNote" rows="4" style="width: 100%;"></textarea>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="section payment-methods p0--desktop"
                                                bind-class="{'p0--desktop': shippingMethods.length == 0}">
                                                <div class="section__header">
                                                    <h2 class="section__title">
                                                        <i class="fa fa-credit-card fa-lg section__title--icon hidden-md hidden-lg"
                                                            aria-hidden="true"></i>
                                                        <label class="control-label">Thanh toán</label>
                                                    </h2>
                                                </div>
                                                <div class="section__content">
                                                    <div class="content-box">

                                                        <div class="content-box__row gb-cart-radio">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input class="input-radio" type="radio"
                                                                        value="1" name="PaymentMethodId"
                                                                        id="payment_method_420555" data-check-id="4"
                                                                        bind="payment_method_id" checked="" onclick="methodf(this);">
                                                                </div>
                                                                <label class="radio__label" for="payment_method_420555">
                                                                    <span class="radio__label__primary">Thanh toán khi
                                                                        giao hàng (COD)</span>
                                                                    <span class="radio__label__accessory">
                                                                        <ul>
                                                                            <li class="payment-icon-v2 payment-icon--4">

                                                                                <i class="fa fa-money payment-icon-fa"
                                                                                    aria-hidden="true"></i>

                                                                            </li>
                                                                        </ul>
                                                                    </span>
                                                                </label>
                                                            </div> <!-- /radio-wrapper-->
                                                        </div>

                                                        <div class="radio-wrapper content-box__row content-box__row--secondary bkg1"
                                                            id="payment-gateway-subfields-1"
                                                            bind-show="payment_method_id == 420555">
                                                            <div class="blank-slate">
                                                                <p>Beemart hỗ trợ giao hàng trên toàn quốc với đơn hàng
                                                                    giá trị trên 70.000đ.
                                                                </p>
                                                                <p>Phí vận chuyển nội thành Hà Nội, Hồ Chí Minh, Hải
                                                                    Phòng là 15.000đ, ngoại thành là 25.000đ.
                                                                </p>
                                                                <p>Phí vận chuyển các tỉnh thành khác dao động từ
                                                                    40.000đ trở lên tùy theo kích thước, cân nặng hàng
                                                                    hóa.
                                                                </p>
                                                                <p>Miễn phí vận chuyển với đơn trên 350.000đ khu vực nội
                                                                    thành và trên 700.000đ khu vực ngoại thành HN, HP,
                                                                    HCM (theo quy định Beemart).
                                                                </p>
                                                                <p>Miễn phí vận chuyển toàn quốc với đơn trên 900.000đ
                                                                </p>


                                                            </div>
                                                        </div>


                                                        <div class="content-box__row gb-cart-radio">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input class="input-radio" type="radio"
                                                                        value="2" name="PaymentMethodId"
                                                                        id="payment_method_420552" data-check-id="3"
                                                                        bind="payment_method_id" onclick="methodf(this);">
                                                                </div>
                                                                <label class="radio__label" for="payment_method_420552">
                                                                    <span class="radio__label__primary">Chuyển khoản qua
                                                                        ngân hàng</span>
                                                                    <span class="radio__label__accessory">
                                                                        <ul>
                                                                            <li class="payment-icon-v2 payment-icon--3">

                                                                                <i class="fa fa-money payment-icon-fa"
                                                                                    aria-hidden="true"></i>

                                                                            </li>
                                                                        </ul>
                                                                    </span>
                                                                </label>
                                                            </div> <!-- /radio-wrapper-->
                                                        </div>

                                                        <div class="radio-wrapper content-box__row content-box__row--secondary hide bkg1"
                                                            id="payment-gateway-subfields-2"
                                                            bind-show="payment_method_id == 420552">
                                                            <div class="blank-slate">
                                                                <p>Thông tin chuyển khoản khi mua hàng online tại
                                                                    Beemart:
                                                                </p> <br>
                                                                <p>Vietcombank
                                                                </p>
                                                                <p>Số tài khoản : 0011004193352
                                                                </p>
                                                                <p>Chủ tài khoản : TỐNG THỊ NGỌC ÁNH
                                                                </p>
                                                                <p>Chi nhánh : Hà Nội
                                                                </p> <br>
                                                                <p>Techcombank
                                                                </p>
                                                                <p>Số tài khoản : 19028490204019
                                                                </p>
                                                                <p>Chủ tài khoản : TỐNG THỊ NGỌC ÁNH
                                                                </p>
                                                                <p>Chi nhánh : Hà Nội</p>


                                                            </div>
                                                        </div>


                                                        <div class="content-box__row gb-cart-radio">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input class="input-radio" type="radio"
                                                                        value="3" name="PaymentMethodId"
                                                                        id="payment_method_420551" data-check-id="5"
                                                                        bind="payment_method_id" onclick="methodf(this);">
                                                                </div>
                                                                <label class="radio__label" for="payment_method_420551">
                                                                    <span class="radio__label__primary">Nhận hàng tại
                                                                        cửa hàng</span>
                                                                    <span class="radio__label__accessory">
                                                                        <ul>
                                                                            <li class="payment-icon-v2 payment-icon--5">

                                                                                <i class="fa fa-money payment-icon-fa"
                                                                                    aria-hidden="true"></i>

                                                                            </li>
                                                                        </ul>
                                                                    </span>
                                                                </label>
                                                            </div> <!-- /radio-wrapper-->
                                                        </div>

                                                        <div class="radio-wrapper content-box__row content-box__row--secondary hide bkg1"
                                                            id="payment-gateway-subfields-3"
                                                            bind-show="payment_method_id == 420551">
                                                            <div class="blank-slate">
                                                                <p>Beemart.vn hỗ trợ giữ hàng cho khách trong vòng 24h
                                                                    tính bắt đầu từ lúc khách hàng được gọi điện xác
                                                                    nhận đơn.
                                                                </p>
                                                                <p>Hình thức này khuyến khích các khách hàng ở khu vực
                                                                    Hà Nội, Hải Phòng, Hồ Chí Minh sử dụng.</p>


                                                            </div>
                                                        </div>


                                                        <div class="content-box__row gb-cart-radio">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input gb-pos-top-30">
                                                                    <input class="input-radio" type="radio"
                                                                        value="4" name="PaymentMethodId"
                                                                        id="payment_method_420549" data-check-id="16"
                                                                        bind="payment_method_id" onclick="methodf(this);">
                                                                </div>
                                                                <label class="radio__label" for="payment_method_420549">
                                                                    <span class="radio__label__primary">Thanh toán trực
                                                                        tuyến bằng ứng dụng Internet Banking với QR
                                                                        Code, thẻ ATM /Visa/Master Card/JCB</span>
                                                                    <span class="radio__label__accessory">
                                                                        <ul>
                                                                            <li
                                                                                class="payment-icon-v2 payment-icon--16">

                                                                            </li>
                                                                        </ul>
                                                                    </span>
                                                                </label>
                                                            </div> <!-- /radio-wrapper-->
                                                        </div>


                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#moca-modal" data-backdrop="static"
                                                            data-keyboard="false" class="trigger-moca-modal"
                                                            style="display: none;" title="Thanh toán qua Moca">
                                                        </a>
                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#qr-error-modal" class="trigger-qr-error-modal"
                                                            style="display: none;" title="Lỗi thanh toán">
                                                        </a>
                                                        <a data-toggle="modal" data-target="#zalopay_modal"
                                                            data-backdrop="static" data-keyboard="false"
                                                            class="trigger-zalopay-modal" style="display: none;"
                                                            title="Thanh toán qua ZaloPay">
                                                        </a>
                                                        <div class="modal fade moca-modal" id="moca-modal" tabindex="-1"
                                                            role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div>
                                                                        <iframe
                                                                            style="border: 0px; width: 100%; height: 100%;"
                                                                            src=""></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="qr-error-modal" data-width=""
                                                            tabindex="-1" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <button aria-hidden="true" data-dismiss="modal"
                                                                            class="close" type="button">×</button>
                                                                        <div class="invalid_order">
                                                                            <p>Giao dịch của bạn chưa đủ hạn mức thanh
                                                                                toán</p>
                                                                            <p>Hạn mức tối thiểu để thanh toán được là
                                                                                <span>1đ</span></p>
                                                                            <p>Vui lòng chọn hình thức thanh toán khác
                                                                            </p>
                                                                        </div>
                                                                        <div class="custom_error_message"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade zalopay_modal" id="zalopay_modal"
                                                            tabindex="-1" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div
                                                                            style="display:flex; justify-content: space-around;">
                                                                            <div class="qr-wrapper">
                                                                                <img>
                                                                                <div class="qr-timer-container">
                                                                                    Thời gian quét mã QR để thanh toán
                                                                                    còn <span class="qr-timer"
                                                                                        style="color:#4286f6;">300</span>
                                                                                    giây
                                                                                </div>
                                                                            </div>
                                                                            <div class="qr-guide-content">
                                                                                <p><b>Thực hiện theo hướng dẫn sau để
                                                                                        thanh toán:</b></p>
                                                                                <p>Bước 1: Mở ứng dụng ZaloPay</p>
                                                                                <p>Bước 2: Chọn "Thanh Toán" <img
                                                                                        src="//bizweb.dktcdn.net/assets/images/barcode-zalo.png"
                                                                                        class="zalopay-qr-payment-icon">
                                                                                    và quét mã QR code bên cạnh</p>
                                                                                <p>Bước 3: Hoàn thành các bước thanh
                                                                                    toán theo hướng dẫn trên ứng dụng
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="justify-content: flex-end;display: flex;">
                                                                            <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">Hủy thanh
                                                                                toán</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 infor_cart">
                                            <div class="title_form">
                                                <p style="font-size:22px;padding-bottom: 20px;">Thông tin đơn hàng</p>
                                            </div>
                                            <br>
                                            <div class="table-responsive" id="order_table">  
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
                                                            <td>
                                                                <img src="<?= $img ?>" width="100"><br>
                                                                <?php echo $values["product_name"]; ?>
                                                                    
                                                            </td>   
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
                                              </div>
                                              <div>
                                                  <div class="form-group">
                                                        <div class="field__input-wrapper"
                                                            bind-class="{ 'js-is-filled': billing_address.phone }">
                                                            <span class="field__label"
                                                                bind-event-click="handleClick(this)">
                                                                Nhập mã khuyến mãi
                                                            </span>
                                                            <input name="sale" style="width: 70%;display: inline;"
                                                                bind-event-change="saveAbandoned()" type="text"
                                                                bind-event-focus="handleFocus(this)"
                                                                bind-event-blur="handleFieldBlur(this)"
                                                                class="field__input form-control"
                                                                id="sale"
                                                                data-error="Vui lòng nhập mã khuyến mãi"
                                                                
                                                                bind="billing_address.phone">
                                                            <button type="button" class="btn btn-primary" onclick="cart_sale()">Áp dụng</button>
                                                        </div>
                                                        <div class="help-block with-errors" id="sale-error">
                                                            <?php 
                                                                if (isset($_SESSION['cart_sale']) && $_SESSION['cart_sale'] != 0) {
                                                                    echo '<span style="color:green">Bạn được giảm '.number_format($_SESSION['cart_sale']).' đ</span>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                              </div>
                                            <!-- <a class="btn btn-default pull-right" href="/gio-hang" role="button" style="background-color:#48BD2B; border:none; font-weight:bold; color:#fff;">Mua Hàng Tiếp</a> -->
                                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function (data) {
        $('.add_to_cart').click(function () {
            var product_id = $(this).attr("id");
            var product_name = $('#name' + product_id).val();
            var product_price = $('#price' + product_id).val();
            var product_quantity = $('#quantity' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "../functions/action_cart_tmp.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                        alert("Product has been Added into Cart");
                    }
                });
            } else {
                alert("Please Enter Number of Quantity")
            }
        });
        $(document).on('click', '.delete', function () {
            var product_id = $(this).attr("id");
            var action = "remove";
            var size = $(this).attr("size");
            if (confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    url: "../functions/action_cart_tmp.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_size: size,
                        action: action
                    },
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                        $('.badge1').text(data.cart_item);
                        // alert(data.order_table);
                        // alert('success');
                    },
                    error: function () {
                        alert('loi.');
                    }
                });


            } else {
                return false;
            }
        });
        $(document).on('keyup', '.quantity', function () {
            var product_id = $(this).data("product_id");
            var quantity = $(this).val();
            var action = "quantity_change";
            var size = $(this).data('product_size');
            // alert(size);return false;
            if (quantity != '') {
                $.ajax({
                    url: "../functions/action_cart_tmp.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_size: size,
                        quantity: quantity,
                        action: action
                    },
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                    }
                });


            }
        });
    });
</script>
<script type="text/javascript">
    function methodf (data) {
        // alert('hide');
        add_hide();

        var show = document.getElementById("payment-gateway-subfields-"+data.value);
        if (show) {
            show.classList.remove("hide");
        }
    }

    function add_hide () {
        var hide_420555 = document.getElementById("payment-gateway-subfields-1");
        hide_420555.classList.add("hide");

        var hide_420552 = document.getElementById("payment-gateway-subfields-2");
        hide_420552.classList.add("hide");

        var hide_420551 = document.getElementById("payment-gateway-subfields-3");
        hide_420551.classList.add("hide");
    }

    function toggle2 () {
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("toggle-pay").innerHTML = this.responseText;
             cart_ship_off();
            }
          };
          xhttp.open("GET", "/functions/ajax/toggle2.php", true);
          xhttp.send();
    }

    function toggle1 () {
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("toggle-pay").innerHTML = this.responseText;
             cart_ship_off();
            }
          };
          xhttp.open("GET", "/functions/ajax/toggle1.php", true);
          xhttp.send();
    }

    function city1 (data) {
        // alert(data.value);
        var city = data.value;
        // billingDistrict
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("billingDistrict").innerHTML = this.responseText;
             cart_ship_off();
            }
          };
          xhttp.open("GET", "/functions/ajax/district.php?name="+city, true);
          xhttp.send();
    }

    function cart_sale () {
        var sale = document.getElementById('sale').value;
        // alert(sale);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("sale-error").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/functions/ajax/cart_sale.php?sale="+sale, true);
          xhttp.send();
    }

    function shipf (data) {
        // alert(data.value);
        var district = data.value;
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("order_table").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/functions/ajax/cart_payment.php?district="+district, true);
          xhttp.send();
    }

    function cart_ship_off () {
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("order_table").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/functions/ajax/cart_ship_off.php", true);
          xhttp.send();
    }
</script>