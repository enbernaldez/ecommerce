<?php
include_once "db_conn.php";

if(isset($_GET['item_id'])){
    
    $table = "products";
    $d_item_id = $_GET['item_id'];
    $fields = array( 'item_stats' => 'I' );
    $filter = array( 'item_id' => $d_item_id );
    
   if( update($conn, $table, $fields, $filter )){
       header("locsation: product_index.php?delete_product=deleted");
       exit();
   }
    else{
        header("location: product_index.php?delete_product=failed");
        exit();
    }
}