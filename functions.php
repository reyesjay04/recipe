<?php

function base64url_decode($data) {
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function getProductName($id) {
  include 'connection.php';
  $sql = "SELECT product_name FROM tbl_products WHERE product_id = '$id' ";
  $result = $conn->query($sql);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $product_id = $row["product_name"];
  echo $product_id;
}
?>