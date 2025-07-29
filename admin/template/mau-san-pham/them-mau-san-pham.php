<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function color () {
		global $conn_vn;
		if (isset($_POST['add_color'])) {
			$src= "../images/";
			// $src = "uploads/";

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);

			}

			$product_id = $_POST['product_id'];
			$color_name = $_POST['color_name'];
			$color_value = $_POST['color_value'];
			// $image = $_FILES['image']['name'];

			$sql = "INSERT INTO color (product_id, color_name, color_value) VALUES ($product_id, '$color_name', '$color_value')";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một màu sản phẩm.\');window.location.href="index.php?page=mau-san-pham&product_id='.$product_id.'"</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	color();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin <br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=mau-san-pham&product_id=<?= $_GET['product_id'] ?>">Quay lại</a> <br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
        	<input type="hidden" name="product_id" value="<?= $_GET['product_id'] ?>">
        	<input type="hidden" name="color_name" value="<?= $_GET['id'] ?>">
            <p class="titleRightNCP">Mã màu</p>
            <input type="text" class="txtNCP1" name="color_value" required/>
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_color">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ Cafelink Việt Nam</p>