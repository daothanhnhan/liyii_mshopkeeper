<?php 
	$id_msk = $action->getDetail('product', 'product_id', $_GET['product_id'])['mshopkeeper_id'];
	$product = $mshopkeeper->get_product($id_msk);//var_dump($product['ListDetail']);
?>
	
    <div class="boxPageNews">
        <h1><?= $product['Name'] ?></h1>
        <p style="clear: both;"><a href="index.php?page=sua-san-pham&id=<?= $_GET['product_id'] ?>">Quay lại</a></p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Màu</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($product['ListDetail'] as $row) {
                        $d++;
                        $has_mau = $action->getDetail('color', 'color_name', $row['Id']);
                    ?>
                        <tr>
                            <td><?= $d ?></td>
                            <td><?= $row['Color']?></td>
                            <td>
                                <?php 
                                if ($has_mau) {
                                    echo '<span style="color:'.$has_mau['color_value'].'">MÀU</span>';
                                }
                                ?>
                            </td>
                            <?php if ($has_mau) { ?>
                            <td style="float: none;"><a href="index.php?page=sua-mau-san-pham&id=<?= $row['Id'] ?>" style="float: none;">Sửa</a></td>
                            <?php } else { ?>
                            <td style="float: none;"><a href="index.php?page=them-mau-san-pham&product_id=<?= $_GET['product_id'] ?>&id=<?= $row['Id'] ?>" style="float: none;">Thêm</a></td>
                            <?php } ?>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ Cafelink Việt Nam</p>             