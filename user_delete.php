<?php
include_once "db_conn.php";

if(isset($_GET['user_id'])){
      
    $table = "users";
    $d_user_id = $_GET['user_id'];
    $fields = array( 'user_stats' => 'I' );
    $filter = array( 'user_id' => $d_user_id );
    
   if( update($conn, $table, $fields, $filter )){
       header("location: user_index.php?delete_user=deleted");
       exit();
   }
    else{
        header("location: user_index.php?delete_user=failed");
        exit();
    }
}