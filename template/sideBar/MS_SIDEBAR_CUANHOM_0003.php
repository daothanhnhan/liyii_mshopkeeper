<?php 
    $sidebar_news_new = $action_news->getListNewsNew_hasLimit(3);//var_dump($sidebar_news_new);
?>
<div class="gb-recenpost-sidebar-cuanhom widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-cuanhom">Bài viết mới nhất</h3>
        <div class="widget-content">
            <div class="gb-blog-left-recent-posts_cuanhom">
                <ul>
                    <?php 
                    foreach ($sidebar_news_new as $item) {
                        $rowLang = $action_news->getNewsLangDetail_byId($item['news_id'],$lang);
                    ?>
                    <li>
                        <div class="gb-news-blog_cuanhom-item">
                            <div class="gb-news-blog_cuanhom-item-img">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['news_img'] ?>" class="img-responsive"></a>
                                <div class="caption caption-large">
                                    <time class="the-date"><?= substr($item['news_created_date'], 0, 10) ?></time>
                                </div>
                            </div>
                            <div class="gb-news-blog_cuanhom-item-text">
                                <div class="gb-news-blog_cuanhom-item-title">
                                    <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_news_name'] ?></a></h3>
                                </div>
                                <div class="gb-news-blog_cuanhom-item-text-des">
                                    <p><?= $rowLang['lang_news_des'] ?></p>
                                </div>
                            </div>
                            <div class="gb-news-blog_cuanhom-item-button">
                                <a href="/<?= $rowLang['friendly_url'] ?>">
                                    <button type="button" class="btn gb-btn-readmore">ĐỌC TIẾP</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </aside>
</div>