<!--to insert new user-->
<?php
include_once "db_conn.php";

if(isset($_POST['new_username'])){
    $n_username=$_POST['new_username'];
    $n_password=$_POST['new_password'];
    $n_fullname=$_POST['new_fullname'];
    
    $table = "users";
    $fields = array('username' => $n_username
                  , 'password' => $n_password
                  , 'fullname' => $n_fullname 
                  );
    //check user
    $chk_sql = "SELECT * FROM `users` WHERE `username` = ?";
    $param = array($n_username);
    $chk_result = query($conn, $chk_sql, $param);
    
    if(!empty($chk_result)) {
        header("location: user_index.php?new_user=failed");
        exit();
    }
    else{
        if(insert($conn, $table, $fields) ){
            header("location: user_index.php?new_user=added");
            exit();
        }
        else{
            header("location: user_index.php?new_user=failed");
            exit();
        }
    }
}