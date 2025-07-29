<!--MENU MOBILE-->

<?php include_once DIR_MENU."MS_MENU_CUANHOM_0002.php"; ?>

<!-- End menu mobile-->



<!--MENU DESTOP-->

<header>

    <div class="gb-header-cuanhom">

        <div class="header-top"style="background: #1daaa3;">

            <div class="container gb-top-header_cuanhom">

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="gb-top-header_cuanhom-left">

                            <ul>

                                <li><i class="fa fa-phone" aria-hidden="true"></i>OUR PHONE NUMBER:   +<?= $rowConfig['content_home3'] ?></li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-0">

                        <div class="gb-top-header_cuanhom-right">

                            <ul class="list_top_right">
                                <li class="top_right">
                                    <a href="#" class="link_top_right2"><i class=""></i>TÀI KHOẢN</a>
                                    <ul class="list_account">
                                    </ul>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right">
                                    <a href="#" class="link_top_right2"><i class=""></i>GIỎ HÀNG</a>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right">
                                    <a href="thanh-toan" class="link_top_right2"><i class=""></i>ĐỊA CHỈ</a>
                                </li>
                                <li style="color: #fff;">|</li>
                                <li class="top_right" id="search">
                                    <a class="link_top_right2"><i class=""></i>CONTACT</a>
                                    <div class="box_search_pc" id="sub-search" style="display: none;">
                                        <form style="width:100%;position:relative" action="" method="">
                                            <input type="search" value="" name="txtSearch" placeholder="Tìm kiếm sản phẩm">
                                            <button type="submit"><i class="iconfont-search2"></i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>

        </div> 
        
   
    <nav id="fixMenuScroll" class="gb-main-menu_cuanhom fixMenuScroll fixMenuScrollPosition" > 
        <div class="top-menu">
        <div class="container">
            <div class="gb-header-bottom_cuanhom" >

                <div class="row">

                    <div class="col-md-5 col-sm-5 col-xs-5"> 

                        <?php include DIR_MENU."MS_MENU_CUANHOM_0001.php";?>

                    </div>
                    <div class="col-md-2  ">
                        <a href="/" class="lgHeaderRSP"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="logo" class="img-responsive"></a>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5 thongtin"> 
                        <div class="gb-top-header_cuanhom">
                            <div class="gb-top-header_cuanhom-right">
                            <ul class="list_top_right">
                                <li class="top_right"style="top:-28px">
                                    <i class="tai-khoan"style="font-size: 14px;">Login / Register</i>
                                </li>
                                <!--yêu thích-->
                                <li class="top_right">
                                    <a href="#" class="link_top_right1"><i class="glyphicon glyphicon-heart"style="color: #dc4242"></i></a>
                                </li>
                                <!--tìm kiếm-->
                                <li class="top_right" id="search">
                                    <a class="link_top_right1"><i class="glyphicon glyphicon-search"style="color: #248ab3"></i></a>
                                    <div class="box_search_pc" id="sub-search" style="display: none;">
                                        <form style="width:100%;position:relative" action="" method="">
                                            <input type="search" value="" name="txtSearch" placeholder="Tìm kiếm sản phẩm">
                                            <button type="submit"><i class="iconfont-search2"></i></button>
                                        </form>
                                    </div>
                                </li>
                                     <!--tài khoản-->
                                     <li class="top_right">
                                        <?php include DIR_CART."MS_CART_CUANHOM_0004.php";?>
                                    <ul class="list_account">
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    

                </div>

            </div>
            </div>
        </div>
</div>
    </nav>

    </div>

</header>



<script src="/plugin/sticky/jquery.sticky.js"></script>

<script>

    $(document).ready(function () {

        $(".sticky-menu").sticky({topSpacing:0});

    });

</script>

