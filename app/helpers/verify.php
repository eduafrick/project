<?php 
include('../../path.php');
include(ROOT_PATH . '/app/database/db.php');

if(isset($_GET['id'])){
    $verify = selectOne('codes', ['user_id' => $_GET['id'], 'email_code' => $_GET['email_code']]);
    if($verify = !null){
        $status = update('users', $_GET['id'], ['verified' => 1]);
        if($status = !null){
            header('location: ' . BASE_URL . '/login.php');
            exit(); 
        }else{
            header('location: ' . BASE_URL . '/error.php');
            exit(); 
        }
    }
}


?>