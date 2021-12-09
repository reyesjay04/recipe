<?php

include '../connection.php';
$product_id = $_POST['id'];
$sql = "SELECT * FROM tbl_ingredients WHERE product_id = $product_id";
$result = $conn->query($sql);

echo '<h5>Ingredients:</h5><ul class="list-group">';
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  echo '<li class="list-group-item">'.$row['primary_value'].' '.$row['primary_unit'].' '.$row['ingredient_name'].'</li>';
}
echo '</ul>';



?>


