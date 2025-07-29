<?php 
    include_once dirname(__FILE__) . "/../database.php";
    include_once dirname(__FILE__) . "/../library.php";
    include_once dirname(__FILE__) . "/../action.php";
    $action = new action();

    $city = $action->getList('city', '', '', 'id', 'asc', '', '' ,'');
?>
                                            <div class="section" define="{billing_address: {}}">
                                                <div class="section__header">
                                                    <div class="layout-flex layout-flex--wrap">
                                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                            <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                                            <label class="control-label">Thông tin mua hàng1</label>
                                                        </h2>

                                                        <a class="layout-flex__item section__title--link" href="/account/login?returnUrl=/checkout">
                                                            <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                                                            Đăng nhập
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="section__content">
                                                    <div class="form-group" bind-class="{'has-error' : invalidEmail}">
                                                        <div>
                                                            <label class="field__input-wrapper" bind-class="{ 'js-is-filled': email }">
                                                                <span class="field__label" bind-event-click="handleClick(this)">
                                                                    Email
                                                                </span>
                                                                <input name="txtEmail" type="email" bind-event-change="changeEmail()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_email" data-error="Vui lòng nhập email đúng định dạng" required="" value="" pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" bind="email">
                                                            </label>
                                                        </div>
                                                        <div class="help-block with-errors">
                                                        </div>
                                                    </div>
                                                    <div class="billing">
                                                        <div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.full_name }">
                                                                    <span class="field__label" bind-event-click="handleClick(this)">
                                                                        Họ và tên
                                                                    </span>
                                                                    <input name="txtName" type="text" bind-event-change="saveAbandoned()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_last_name" data-error="Vui lòng nhập họ tên" required="" bind="billing_address.full_name">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.phone }">
                                                                    <span class="field__label" bind-event-click="handleClick(this)">
                                                                        Số điện thoại
                                                                    </span>
                                                                    <input name="txtPhone" bind-event-change="saveAbandoned()" type="tel" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_phone" required="" data-error="Vui lòng nhập số điện thoại" pattern="^([0-9,\+,\-,\(,\),\.]{8,20})$" bind="billing_address.phone">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.address1 }">
                                                                    <span class="field__label" bind-event-click="handleClick(this)">
                                                                        Địa chỉ
                                                                    </span>
                                                                    <input name="txtAddress" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_address1" data-error="Vui lòng nhập địa chỉ" required="" bind="billing_address.address1">
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="field__input-wrapper field__input-wrapper--select">
                                                                    <label class="field__label" for="BillingProvinceId">
                                                                        Tỉnh thành
                                                                    </label>
                                                                    <select class="field__input field__input--select form-control filter-dropdown select2-hidden-accessible" name="city" id="billingProvince" required="" data-error="Bạn chưa chọn tỉnh thành" bind-event-change="billingProviceChange('')" bind="BillingProvinceId" data-select2-id="billingProvince" tabindex="-1" aria-hidden="true" onchange="city1(this)">
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
                                                                <div class="field__input-wrapper field__input-wrapper--select">
                                                                    <label class="field__label" for="BillingDistrictId">
                                                                        Quận huyện
                                                                    </label>
                                                                    <select class="field__input field__input--select form-control filter-dropdown select2-hidden-accessible" name="district" id="billingDistrict" required="" data-error="Bạn chưa chọn quận huyện" bind-event-change="billingDistrictChange('')" bind="BillingDistrictId" data-select2-id="billingDistrict" tabindex="-1" aria-hidden="true" onchange="shipf(this)">
                                                                        <option value="" data-select2-id="4">--- Chọn
                                                                            quận huyện ---</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            
                                                            <div bind-show="!otherAddress" class="form-group">
                                                                <div class="error hide" bind-show="requiresShipping &amp;&amp; loadedShippingMethods &amp;&amp; shippingMethods.length == 0  &amp;&amp; BillingProvinceId  &amp;&amp; BillingDistrictId  ">
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
                                                                <input class="input-checkbox" type="checkbox" value="false" name="otherAddress" id="other_address" bind="otherAddress" bind-event-change="changeOtherAddress(this)" onclick="toggle2()">
                                                            </div>
                                                            <label class="checkbox__label" for="other_address">
                                                                Giao hàng đến địa chỉ khác
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.address1 }">
                                                            <span class="field__label" bind-event-click="handleClick(this)">
                                                                Ghi chú
                                                            </span>
                                                            <textarea name="txtNote" rows="4" style="width: 100%;"></textarea>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    