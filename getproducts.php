<?php 
include_once 'connection.php';
$get_users = array();

$id = $_POST['id'];
$product_name = $_POST['pn'];
$byDate = $_POST['byDate'];

$sql;

if ($id == 1) {
	$sql = "SELECT * FROM tbl_products";
} else {
	if ($byDate == "ON") {
		$date_created = $product_name;
		$date = date_create($date_created);
		$sql = "SELECT * FROM tbl_products WHERE DATE_FORMAT(date_created, '%Y-%m-%d') = '".date_format($date,"Y-m-d")."'";
	} else {
		$sql = "SELECT * FROM tbl_products WHERE product_name LIKE '%$product_name%'";
	}
	
}

$result = $conn->query($sql);
	
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

	        $product_image = $row['product_image'];
			$product_name = $row['product_name'];
	        $product_procedure = $row['product_procedure'];
	        $product_id = $row['product_id'];
	        $get_users[] = array("image" => $product_image, "title" => $product_name, "procedure" => $product_procedure, "productid" => $product_id);
	}

echo json_encode($get_users);
?>
   