<?php
include_once dirname(__FILE__)."/library.php";
include_once dirname(__FILE__)."/pagination/Pagination.php";

class action_mshopkeeper extends library {

	public function get_token_1 () {
		return 'NJ7PO5-5TTumhWg6Sl9Mz6EmmQJ1EzEdpgmnahnwwm4cs1TLob8Dxzpps_ra0FVHWu6n8yR1pEDtyzpH9IisdnDcX5gvNyDtJiF95JnPYWznt4TVQ8RjYL5W_6RAaPqY41cZm3esDxl4eiN7kklUHxsP-Tf01hvnmo-Ul4gAB13bu1nvtESu0GynoPxbX0bwO6cLHszDywYz2YvmT3OCNMyJ8nmwS3CAgQ6Ey7_W4ItCIvE16XnAy4cZqbFtJOzsl6SBgS89JUon3WXt6-f4gw';
	}

	public function get_token () {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://graphapi.mshopkeeper.vn/auth/api/Account/Login",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\r\n  \"AppID\": \"MShopKeeperOpenPlatform\",\r\n  \"Domain\": \"liyii.mshopkeeper.vn\",\r\n  \"LoginTime\": \"3019-08-24T12:00:00.000Z\",\r\n  \"SignatureInfo\":\"cb1ffbf0067384b3d8d8e521c6bda2585622c8948cf304dc753e795c3378eda3\"\r\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Accept-Encoding: gzip, deflate",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Length: 210",
		    "Content-Type: application/json",
		    "Host: graphapi.mshopkeeper.vn",
		    "Postman-Token: f10414a9-66d7-4915-a381-1cc21230ca06,0f1235aa-70b4-4d58-ab45-dcca73db5e69",
		    "User-Agent: PostmanRuntime/7.15.2",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  // echo $response;
		  $res = json_decode($response, true);
		  return $res['Data']['AccessToken'];
		}
	}

	public function get_total_product () {
		$token = $this->get_token();
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://graphapi.mshopkeeper.vn/g1/api/v1/inventoryitems/pagingwithdetail",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\r\n  \"Page\": 1,\r\n  \"Limit\": 1,\r\n  \"SortField\": \"Code\",\r\n  \"SortType\": \"1\",\r\n  \"IncludeInventory\": true\r\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Accept-Encoding: gzip, deflate",
		    "Authorization: Bearer $token",
		    "Cache-Control: no-cache",
		    "CompanyCode: liyii",
		    "Connection: keep-alive",
		    "Content-Length: 105",
		    "Content-Type: application/json",
		    "Host: graphapi.mshopkeeper.vn",
		    "Postman-Token: 0f4b135c-e866-4ee2-b527-7730157ae3bf,997c2934-2a28-432b-8752-a861acd5cf10",
		    "User-Agent: PostmanRuntime/7.15.2",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  // echo $response;
		  $res = json_decode($response, true);
		  return $res['Total'];
		}
	}

	public function get_products_limit ($limit, $trang) {
		$token = $this->get_token();
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://graphapi.mshopkeeper.vn/g1/api/v1/inventoryitems/pagingwithdetail",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\r\n  \"Page\": $trang,\r\n  \"Limit\": $limit,\r\n  \"SortField\": \"Code\",\r\n  \"SortType\": \"1\",\r\n  \"IncludeInventory\": true\r\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Accept-Encoding: gzip, deflate",
		    "Authorization: Bearer $token",
		    "Cache-Control: no-cache",
		    "CompanyCode: liyii",
		    "Connection: keep-alive",
		    "Content-Length: 107",
		    "Content-Type: application/json",
		    "Host: graphapi.mshopkeeper.vn",
		    "Postman-Token: 637f6f8b-a009-4b97-935a-1cde73b4f898,d0438bfe-f418-48ee-a506-b00c5c135d51",
		    "User-Agent: PostmanRuntime/7.15.2",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  // echo $response;
			$res = json_decode($response, true);//var_dump($res);
			$data = $res['Data'];
			return $data;
		}
	}

	public function get_products_all () {
		$total = $this->get_total_product();
		$limit = 100;
		$count = ceil($total/$limit);//echo $count;
		$return = array();
		for ($i=0;$i<$count;$i++) {
			$trang = $i+1;
			$list = $this->get_products_limit($limit, $trang);//var_dump($list);
			foreach ($list as $item) {
				// $check = $this->check_has_product($item['id']);
				// if ($check != false) {
					$return[] = $item;
				// }
			}
		}
		return $return;
	}

	public function get_products_all_db () {
		global $conn_vn;
		$sql = "SELECT * FROM product_mshopkeeper WHERE id = 1";
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		$return = json_decode($row['data'], true);
		return $return;
	}

	public function get_products_new ($products, $limit) {
		global $conn_vn;
		$sql = "SELECT * FROM product WHERE product_new = 1 LIMIT $limit";
		$result = mysqli_query($conn_vn, $sql);
		$ids_msk = array();
		$num = mysqli_num_rows($result);
		if ($num > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$ids_msk[] = $row['mshopkeeper_id'];
			}
		}
		$rows = array();
		foreach ($products as $item) {
			if (in_array($item['Id'], $ids_msk)) {
				$rows[] = $item;
			}
		}
		return $rows;
	}

	public function get_products_hot ($products, $limit) {
		global $conn_vn;
		$sql = "SELECT * FROM product WHERE product_hot = 1 LIMIT $limit";
		$result = mysqli_query($conn_vn, $sql);
		$ids_msk = array();
		$num = mysqli_num_rows($result);
		if ($num > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$ids_msk[] = $row['mshopkeeper_id'];
			}
		}
		$rows = array();
		foreach ($products as $item) {
			if (in_array($item['Id'], $ids_msk)) {
				$rows[] = $item;
			}
		}
		return $rows;
	}

	public function get_products_bycat ($products, $limit, $id_cat) {
		global $conn_vn;
		$sql = "SELECT * FROM product WHERE productcat_ar LIKE '%$id_cat%' LIMIT $limit";
		$result = mysqli_query($conn_vn, $sql);
		$ids_msk = array();
		$num = mysqli_num_rows($result);
		if ($num > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$ids_msk[] = $row['mshopkeeper_id'];
			}
		}
		$rows = array();
		foreach ($products as $item) {
			if (in_array($item['Id'], $ids_msk)) {
				$rows[] = $item;
			}
		}
		return $rows;
	}

	public function get_product_gb ($id_msk) {
		global $conn_vn;
		$sql = "SELECT * FROM product WHERE mshopkeeper_id = '$id_msk'";
		$result = mysqli_query($conn_vn, $sql);
		$num = mysqli_num_rows($result);
		$row = array();
		if ($num > 0) {
			$row = mysqli_fetch_assoc($result);
		} 
		return $row;
	}

	public function get_product ($products, $id_msk) {
		$product_all = $products;
		$product = array();
		foreach ($product_all as $item) {
			if ($item['Id'] == $id_msk) {
				$product = $item;
			}
		}
		return $product;
	}
}
?>