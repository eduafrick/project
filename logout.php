<?php 
include('path.php');
include(ROOT_PATH . '/app/database/db.php');
$userr = selectOne('users', ['id' => $s['id']]);
foreach($userr as $key => $value){
    unset($_SESSION[$key]);
}
unset($_SESSION['message']);
unset($_SESSION['type']);
session_destroy();

header('location:' . BASE_URL . '/index.php');


?>