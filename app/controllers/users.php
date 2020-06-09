<?php

$full_name = $email = $phone = "";
$username = $password = $conpassword = $address = $address2 = $country = "";
$age =  $fb_link = $ref =  $user_id = "";

#ERRORS VARIABLES DECLEARATION
$error_full_name = "";
$error_address = $error_con = $error_con2 = $error_email = $error_email2 = "";
$error_username = $error_full_name2 = $error_pass = $error_pass2 = $error_pass3 = "";
$error_phone = $error_phone2 = $error_passcon = $error_image =  $error_image2 =   "";


$table = "user";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require(ROOT_PATH . '/app/helpers/validation.php');
    if ($err === 0) {
       unset($_POST['sign-up'], $_POST['conpassword']);
       $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create("users", $_POST);
       /* dd($_POST);$ */
        echo $user_id;
    }else{
        $_SESSION['message'] = "Hi";
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

?>