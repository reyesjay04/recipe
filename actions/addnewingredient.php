<?php 
include_once '../connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$primaryunit = $_POST['primaryunit'];
$primaryval = $_POST['primaryval'];
$createdat = date('Y-m-d h:i:s', time());

try {

$sql = "INSERT INTO tbl_ingredients (product_id,ingredient_name,primary_unit,primary_value,date_created,status) VALUES ('$id','$name','$primaryunit','$primaryval','$createdat','Active')";
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
echo 'self.location = "../ingredients.php";';
echo '</script>';
?>
   