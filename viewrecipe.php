<?php

include 'connection.php';
$product_id = $_POST['id'];
$sql = "SELECT * FROM tbl_products WHERE product_id = $product_id";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$product_name = $row["product_name"];
$product_serving = $row["product_serving"];
$procedure = $row["product_procedure"];
$date_created = $row["date_created"];


$date = date_create($date_created);

echo '<h3>'.$product_name.'</h3>
    <p>Date Created: '.date_format($date,"F d, Y").'</p>
    <p>Serving Size: '.$product_serving.'</p>
    <h5>Ingredients:</h5>
    <ul class="list-group"> ';


$sql = "SELECT * FROM tbl_ingredients WHERE product_id = $product_id";
$result = $conn->query($sql);
  
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

  echo '<li class="list-group-item">'.$row['primary_value'].' '.$row['primary_unit'].' '.$row['ingredient_name'].'</li>';

}

echo '</ul>';
echo '<h5>Procedure:</h5><p>'.$procedure.'</p>'
  


?>


