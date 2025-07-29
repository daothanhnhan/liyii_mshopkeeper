<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('district',array('name'), $_GET['search'],$trang,20,$_GET['page']);
    }else{
       $rows = $acc->getList("district","","","id","asc",$trang, 20, "quan-huyen");
    }
?>
    <div class="boxPageNews">
        <div class="searchBox">
            <form action="">
                <input type="hidden" name="page" value="quan-huyen">
                <button type="submit" class="btnSearchBox">Tìm kiếm</button>
                <input type="text" class="txtSearchBox" name="search" />                                    
            </form>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên quận huyện</th>
                    <th>Thành phố</th>
                    <th>Phí vận chuyển</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($rows['data'] as $row) {
                        $d++;
                    ?>
                        <tr>
                            <td><?= $d ?></td>
                            <td><?= $row['name']?></td>
                            <td>
                                <?= $action->getDetail('city', 'id', $row['city_id'])['name'] ?>
                            </td>
                            <td><?= number_format($row['fee']) ?></td>
                            <td style="float: none;"><a href="index.php?page=sua-quan-huyen&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    	
        <div class="paging">             
        	<?= $rows['paging'] ?>
		</div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ Cafelink Việt Nam</p>             