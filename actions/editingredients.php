<?php

include '../connection.php';
$id = $_POST['id'];
$prid = $_POST['prid'];
$sql = "SELECT * FROM tbl_ingredients WHERE ingredients_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

$ingredients_name = $row["ingredient_name"];
$primary_unit = $row["primary_unit"];
$primary_value = $row["primary_value"];

echo '<input type="hidden" name="ingid" value="'.$id.'">
      <input type="hidden" name="prid" value="'.$prid.'">


      <label for="basic-url">Product Name</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="name" value="'.$ingredients_name.'" required>
      </div>
      <label for="basic-url">Serving Size</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="primary" value="'.$primary_unit.'" required>
      </div>
      <label for="basic-url">Procedure</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="primaryval" value="'.$primary_value.'" required>
      </div>';

?>


