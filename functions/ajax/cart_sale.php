<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";
	$sale = $_GET['sale'];

	$action = new action();
	$cart_sale = $action->getDetail('code_sale', 'code', $sale);
	if ($cart_sale) {
		$_SESSION['cart_sale'] = $cart_sale['money'];
		echo '<span style="color:green;">Bạn được giảm '.number_format($cart_sale['money']).' đ</span>';
	} else {
		$_SESSION['cart_sale'] = 0;
		echo '<span style="color:red;">Mã khuyến mãi không hợp lệ.</span>';
	}
?>