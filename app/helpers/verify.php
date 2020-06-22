<?php 
include('../../path.php');
include(ROOT_PATH . '/app/database/db.php');
$table = 'codes';

if(isset($_GET['email_id'])){
    $verify = selectOne($table, ['user_id' => $_GET['email_id'], 'email_code' => $_GET['email_code']]);
    if($verify = !null){
        $status = update('users', $_GET['email_id'], ['verified' => 1]);
        if($status = !null){
            header('location: ' . BASE_URL . '/login.php');
            exit(); 
        }else{
            header('location: ' . BASE_URL . '/error.php');
            exit(); 
        }
    }
}

if(isset($_GET['verify_phone_id'])){

    #SEND CODE TO THE USERS PHONE

    header('location: ' . BASE_URL . 'temp.php');

    $code = selectOne($table, ['user_id' => $s['id']]);
    if($code['phone_code'] == $_POST['code']){
        update('users', $s['id'], ['verified_phone' => 1]);
        header('location: ' . BASE_URL . '/profile.php');
        exit();
    }else{
        echo ucwords('code did not match');
    }
}


?>