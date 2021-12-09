<?php
Include '../connection.php';
// DB table to use
$table = 'tbl_products';
// Table's primary key
$primaryKey = 'product_id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.
// 
$columns = array(
    array( 'db' => 'product_name', 'dt' => 0 ),
    array(
            'db' => 'product_id', 
            'dt' => 1,
            'formatter' => function( $d, $row ){ 
                return ('<div class="btn-group"><button type="button" class="btn btn-success" id='.$d.' onclick="viewingredients(this.id)"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-info bg-gr" id='.$d.' onclick="addingredient(this.id)"><i class="fas fa-plus"></i></button><a class="btn btn-danger bg-gr" id='.$d.' href="modify.php?id='.$d.'"><i class="fas fa-edit"></i></a></div>');
            }
        )
);
// Include SQL query processing class
require('../ssp.class.php');
// Output data as json format
echo json_encode(
    SSP::simple( $_GET, ConnectionArray(), $table, $primaryKey, $columns)
    //SSP::complex ( $_GET, $dbDetails, $table, $primaryKey, $columns, $whereResult=null, $whereAll='user_guid <> ""')
);

?>
