<?php
Include '../connection.php';
$id = $_GET['id'];
// DB table to use
$table = 'tbl_ingredients';
// Table's primary key
$primaryKey = 'ingredients_id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.
// 
$columns = array(
    array( 'db' => 'ingredient_name', 'dt' => 0 ),
    array(
            'db' => 'ingredients_id', 
            'dt' => 1,
            'formatter' => function( $d, $row ){ 
                return ('<div class="btn-group"><button type="button" class="btn btn-info bg-gr" id='.$d.' onclick="edit(this.id)"><i class="fas fa-edit"></i></button><button class="btn btn-danger bg-gr" id='.$d.' onclick="deleteingredient(this.id)"><i class="fas fa-minus"></i></button></div>');
            }
        ),
     array( 'db' => 'ingredients_id', 'dt' => 2 )
);
// Include SQL query processing class
require('../ssp.class.php');
// Output data as json format
echo json_encode(
    // SSP::simple( $_GET, ConnectionArray(), $table, $primaryKey, $columns)
    SSP::complex ( $_GET, ConnectionArray(), $table, $primaryKey, $columns, $whereResult=null, $whereAll='product_id = "'.$id.'"')

);

?>
