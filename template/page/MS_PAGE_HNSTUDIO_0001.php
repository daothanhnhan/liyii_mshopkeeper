<?php 
     $action_page = new action_page(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);
    $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'pageDetail';
?>
<div class="gb-page-gioithieu">
    <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0002.php";?>
    <div class="container" style="margin-top: 53px;">
        <div class="gb-page-gioithieu-right">
            <?= $rowLang['lang_page_content'] ?>
        </div>
    </div>
</div>