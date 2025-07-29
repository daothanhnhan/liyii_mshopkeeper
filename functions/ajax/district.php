<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";
	$action = new action();
	$city = $_GET['name'];
	$city = $action->getDetail('city', 'name', $city);
	$district = $action->getList('district', 'city_id', $city['id'], 'id', 'asc', '', '', '');
?>
<option value="">--- Chọn quận huyện ---</option>
<?php foreach ($district as $item) { ?>
<option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
<?php } ?>