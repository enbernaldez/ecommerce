<?php
include_once "db_conn.php";


if(isset($_POST['u_user_id'])){
    $table = "users";
    
    $p_user_id  = $_POST['u_user_id'];
    $p_username = $_POST['u_username'];
    $p_password = $_POST['u_password'];
    $p_fullname = $_POST['u_fullname'];
    
    
    $fields = array( 'username' => $p_username
                   , 'password' => $p_password
                   , 'fullname' => $p_fullname 
                   );
    $filter = array( 'user_id' => $p_user_id );
    
   
   if( update($conn, $table, $fields, $filter )){
       header("location: user_index.php?update_user=success");
       exit();
   }
    else{
        header("location: user_index.php?update_user=failed");
        exit();
    }
 }
?>