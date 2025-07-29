<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_news->getNewsLangDetail_byUrl($slug,$lang);
    $row = $action_news->getNewsDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0002.php";?>
<div class="gb-single-blog_cuanhom">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 gb-single-blog_cuanhom-right">
                <div class="gb-single-blog_cuanhom-right-img">
                    <img src="/images/<?= $row['news_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>" class="img-responsive">
                </div>
                <div class="gb-single-blog_cuanhom-right-title">
                    <h2><?= $rowLang['lang_news_name'] ?></h2>
                </div>
                <div class="gb-single-blog_cuanhom-right-info">
                    <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="#"> Admin</a></li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#"> March, 23,2017</a></li>
                        <li><i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="#"> Design, Graphic</a></li>
                        <li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="#"> 5 comments</a></li>
                    </ul>
                </div>
                <div class="gb-single-blog_cuanhom-right-text">
                    <?= $rowLang['lang_news_content'] ?>
                </div>

                <div class="gb-single-blog_cuanhom-share">
                    <div class="row">
                        <div class="col-md-5 gb-single-blog_cuanhom-share-left">
                            <ul>
                                <li><a href="#">Finance</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Photo</a></li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-md-offset-2 gb-single-blog_cuanhom-share-right">
                            <ul>
                                <li><span><i class="fa fa-share-alt" aria-hidden="true"></i> share</span></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--bình luận-->
                <?php include DIR_EMAIL."MS_EMAIL_CUANHOM_0002.php";?>

                <!--tin tức liên quan-->
                <?php include DIR_NEWS."MS_NEWS_CUANHOM_0003.php";?>

            </div>
            <div class="col-sm-3 gb-blog-left">
                <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0001.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0003.php";?>
            </div>
        </div>
    </div>
</div>