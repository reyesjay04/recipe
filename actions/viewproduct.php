<?php

include '../connection.php';
$product_id = $_POST['id'];
$sql = "SELECT * FROM tbl_products WHERE product_id = $product_id";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$product_name = $row["product_name"];
$product_serving = $row["product_serving"];
$procedure = $row["product_procedure"];
$date_created = $row["date_created"];
$product_image = $row['product_image'];


echo '<input type="hidden" name="prid" value="'.$product_id.'">
      <label for="basic-url">Product Name</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="prname" value="'.$product_name.'" required>
      </div>
      <label for="basic-url">Serving Size</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="serving" value="'.$product_serving.'" required>
      </div>
      <label for="basic-url">Procedure</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" aria-describedby="basic-addon1" name="procedure" value="'.$procedure.'" required>
      </div>
      <input type="file" name="pi" accept="image/*" onchange="previewFile()">
      <br>
      <img src="data:image/png;base64,'.$product_image.'" height="100" alt="Image preview...">
      <input type="hidden" name="b64img" value="'.$product_image.'">';



  


?>


