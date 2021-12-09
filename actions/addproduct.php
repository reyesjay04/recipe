<?php 
include_once '../connection.php';

$id = $_POST['prid'];
$prname = $_POST['prname'];
$serving = $_POST['serving'];
$procedure = $_POST['procedure'];
$product_image = "";

if($_FILES['pi']['name'] == "") {
	$product_image = $_POST['b64img'];
} else {
	$product_image = file_get_contents($_FILES["pi"]["tmp_name"]);
	$product_image = base64_encode($product_image);
}

$createdat = date('Y-m-d h:i:s a', time());
try {

$sql = "INSERT INTO tbl_products (product_name,product_image,product_serving,product_procedure,date_created) VALUES ('$prname','$product_image','$serving','$procedure','$createdat')";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo '<script>';
echo 'alert("Added Successfully");';
echo 'self.location = "../recipe.php";';
echo '</script>';
?>
   