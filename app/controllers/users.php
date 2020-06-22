<?php
include(ROOT_PATH . '/app/helpers/middleware.php');

#SIGN-UP $_POST VARIABLES DECLARATION
$full_name = $email = $phone = "";
$username = $password = $conpassword = $address = $address2 = $country = "";
$age =  $fb_link = $ref =  $user_id = "";

#ERRORS VARIABLES DECLARATION
$error_full_name = $error_logad = $login_error = "";
$error_address = $error_con = $error_con2 = $error_email = $error_email2 = "";
$error_username = $error_full_name2 = $error_pass = $error_pass2 = $error_pass3 = "";
$error_phone = $error_phone2 = $error_passcon = $error_image =  $error_image2 =   "";

#CONSTANT REUSABLE VARIABLES
$table = "users";
$table_code = "codes";

#CODE GENERATION VARIABLES
$phone_code = '0123456789';
$email_vrification_code = 'abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$referal_code = '0123456789abcdefghijklmnopqrstuvwzyz';
$user_key = $phone_code . $email_vrification_code;


function generateRandomString($x, $lenght){
    return substr(
        str_shuffle(str_repeat($x, ceil($lenght/strlen($x)))), 1,$lenght);
}

function sessionDeclar($data = []){
    foreach($data as $key => $value){
        $_SESSION[$key] = $data[$key];
    }
}

function loginUser($user) {
    global $table_code;
    global $table;
    $un_code = selectOne($table_code, ['user_id'=>$user['id']]);
    $_SESSION['un_code'] = $un_code['user_key'];
    sessionDeclar($user);
    unset($_SESSION['password']);
    $_SESSION['message'] = 'You are now Logged In';
    $_SESSION['type'] = 'success';
    $_SESSION['role'] = $table;
    if ($_SESSION['role'] = "teachers") {
        header('location:' . BASE_URL . '/teachers/dashboard.php');
        exit();
    }else{
        header('location:' . BASE_URL . '/student/profile.php');
        exit();
    }     
}

function loginAdminUser($user){
    sessionDeclar($user);
    unset($_SESSION['password']);
    $_SESSION['message'] = 'You are now Logged In';
    $_SESSION['type'] = 'success';
    $_SESSION['admin'] = 'Admin';
    header('location:' . BASE_URL . '/admin/dashboard.php');
    exit();
}

if(isset($_GET['role']) === 'teacher'){
    $table = "teachers";
    $table_code = "teachers_codes";
}

if(isset($_POST['sign-up'])){
    require(ROOT_PATH . '/app/helpers/validation.php');
    if ($err === 0) {
       unset($_POST['sign-up'], $_POST['conpassword'], $_POST['agree'], $_POST['policy']);
       $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
        $codes = array('user_id'=>$user_id, 'email_code'=>generateRandomString($email_vrification_code, 25), 'phone_code'=>generateRandomString($phone_code, 7), 'referals_code'=>generateRandomString($referal_code, 6), 'user_key'=>generateRandomString($user_key, 30));
        $code_insert = create($table_code, $codes);
        require(ROOT_PATH . '/app/helpers/mailers.php');
        $_SESSION['id'] = $user_id;
        $user = selectOne($table, ['id' => $user_id]);
        #LOG USER IN
        loginUser($user);
    }else{
        $_SESSION['message'] = ucwords("error in singing in please make sure you input correct data.");
        $_SESSION['type'] = "error";
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $address = $_POST['address'];
        $address2 = $_POST['address2'];
        $country = $_POST['country'];
        $age = $_POST['age'];
        $fb_link = $_POST['fb_link'];
        $ref = $_POST['ref'];
        }
}

if (isset($_POST['login-btn'])) {
    #VALIDATION OF $_POST VALUES
    require(ROOT_PATH . '/app/helpers/validate.php');
    #IF NO ERROR
    if($err === 0){
        $user = selectAny($table, ['username' => $_POST['logad'], 'email' => $_POST['logad']]);
        if ($user && password_verify($_POST['password'], $user['password'])) {
        // login and redirect
        loginUser($user);
        }else {
            $login_error = 'Invalid Credentials';
            $username = $_POST['logad'];
        }
    }else {
    $username = $_POST['logad'];
    $password = $_POST['password'];
    }
}

if (isset($_GET['id']) && isset($_GET['key'])) {
    notLogin($s['id']);
    if(($_GET['id'] == $s['id']) && ($_GET['key'] == $s['un_code'])){
            $user = selectOne($table, ['id' => $_GET['id']]);
            $full_name = $user['full_name'];
            $email = $user['email'];
            $phone = $user['phone'];
            $username = $user['username'];
            $address = $user['address'];
            $address2 = $user['address2'];
            $country = $user['country'];
            $age =  $user['age'];
            $image =  $user['image'];
            $fb_link = $user['fb_link'];
            $ref =  $user['ref'];
        }else{
            header('location:' . BASE_URL . '/404.php');
            exit();
        }
    
}

if (isset($_POST['update'])) {
    notLogin($s['id']);
    #require(ROOT_PATH . '/app/helpers/validation.php');
    $err = 0;
    if ($err === 0) {
        unset($_POST['update'], $_POST['conpassword'], $_POST['id']);
        
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        /* dd($_POST); */
        $user_id = update($table, $s['id'], $_POST);
        $user = selectOne($table, ['id' => $s['id']]);
        sessionDeclar($user);
        $_SESSION['message'] = 'User updated sucessfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/profile.php');
        exit();  
    } else {
        $user = $_POST;
        $full_name = $user['full_name'];
        $email = $user['email'];
        $phone = $user['phone'];
        $username = $user['username'];
        $address = $user['address'];
        $address2 = $user['address2'];
        $country = $user['country'];
        $age =  $user['age'];
        $fb_link = $user['fb_link'];
        $ref =  $user['ref'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
    }
    
}
if((isset($_GET['del_id'])) && (isset($_GET['key']))){
    notLogin($s['id']);
    if(($_GET['del_id'] == $s['id']) && ($_GET['key'] == $s['un_code'])){
        $count = delete($table, $_GET['del_id']);
        $_SESSION['message'] = 'User Deleted successfuly';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/index.php');
        exit();  
    }else{
        header('location: ' . BASE_URL . '/404.php');
        exit(); 
    }
     
}

if(isset($_POST['admin-btn'])){
    $table = "admin";
    #VALIDATION OF $_POST VALUES
    require(ROOT_PATH . '/app/helpers/validate.php');
    #IF NO ERROR
    if($err === 0){
        $user = selectAny($table, ['username' => $_POST['logad'], 'email' => $_POST['logad']]);
        
        if ($user && password_verify($_POST['password'], $user['password'])) {
        // login and redirect
        loginAdminUser($user);
        }else {
            $login_error = 'Invalid Credentials';
            $username = $_POST['logad'];
        }
    }else {
    $username = $_POST['logad'];
    $password = $_POST['password'];
    }
}

if(isset($_POST['admin-sign-up'])){
    $table = "admin";
     #VALIDATION OF $_POST VALUES
     require(ROOT_PATH . '/app/helpers/validate_admin.php');
    if ($err === 0) {
       unset($_POST['admin-sign-up'], $_POST['conpassword']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['created_by'] = $s['id'];
        $user_id = create($table, $_POST);
        dd($_POST);
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit(); 
    }else{
        $_SESSION['message'] = ucwords("error in singing in please make sure you input correct data.");
        $_SESSION['type'] = "error";
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        }
}

?>
