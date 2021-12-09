<?php 
include_once '../connection.php';

$id = $_POST['id'];

try {
	
$sql = "DELETE FROM tbl_ingredients WHERE ingredients_id = $id";
echo $sql;

$conn->query($sql);

} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
   