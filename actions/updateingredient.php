<?php 
include_once '../connection.php';


$prid = $_POST['prid'];
$id = $_POST['ingid'];
$name = $_POST['name'];
$primary = $_POST['primary'];
$primaryval = $_POST['primaryval'];

$createdat = date('Y-m-d h:i:s', time());

try {

$sql = "UPDATE tbl_ingredients SET ingredient_name = '$name', primary_unit = '$primary', primary_value = '$primaryval', date_created = '$createdat' WHERE ingredients_id = $id";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

echo '<script>';
echo 'alert("Updated Successfully");';
echo 'self.location = "../modify.php?id='.$prid.'"';
echo '</script>';

?>
   