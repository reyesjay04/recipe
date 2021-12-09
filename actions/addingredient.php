<?php

include '../connection.php';
$id = $_POST['id'];
echo '<input type="hidden" name="id" value="'.$id.'">
<label for="basic-url">Ingredient Name</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" value="" aria-describedby="basic-addon1" required>
      </div>
      <label for="basic-url">Primary Unit</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="primaryunit" value="" aria-describedby="basic-addon1" required>
      </div>
      <label for="basic-url">Primary Value</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="primaryval" value="" aria-describedby="basic-addon1" required>
      </div>';
?>


