<?php
    $product_page = $mshopkeeper->get_products_page(20, $trang);//var_dump($product_page);
    $total = $mshopkeeper->get_total_product();
?>	
<div class="boxPageNews">
	<div class="searchBox">
        <form action="">
            <input type="hidden" name="page" value="san-pham-1">
            <button type="submit" class="btnSearchBox" name="">Tìm kiếm</button>
            <input type="text" class="txtSearchBox" name="search" />                                  
        </form>
    </div>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($product_page as $key => $row) {
                    $trang_thai = $mshopkeeper->check_has_product($row['Id']);
                    if ($trang_thai == false) {
                        $link = "index.php?page=them-san-pham&id_msk=".$row['Id'];
                    } else {
                        $link = "index.php?page=sua-san-pham&id=".$trang_thai;
                    }
                ?>
                    <tr>
                        <td><a href="<?= $link; ?>" title=""><?= $row['Name']; ?></a></td>
                        <td>
                            
                        </td>
                        <td><?= number_format($row['SellingPrice'],'0','','.')?> đ</td>
                        <td><?= $trang_thai == false ? 'Chưa' : 'Rồi'?></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
	
    <div class="paging">             
    	<?= $mshopkeeper->paging($total, $trang, 20, 'san-pham') ?>
	</div>
</div>
<?php  ?>
