<?php

$full_name = $email = $phone = "";
$username = $password = $conpassword = $address = $address2 = $country = "";
$age =  $fb_link = $ref =  $user_id = "";

#ERRORS VARIABLES DECLARATION
$error_full_name = "";
$error_address = $error_con = $error_con2 = $error_email = $error_email2 = "";
$error_username = $error_full_name2 = $error_pass = $error_pass2 = $error_pass3 = "";
$error_phone = $error_phone2 = $error_passcon = $error_image =  $error_image2 =   "";

$table = "users";

#CODE GENERATION VARIABLES
$phone_code = '0123456789';
$email_vrification_code = 'abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$referal_code = '0123456789abcdefghijklmnopqrstuvwzyz';


function generateRandomString($x, $lenght){
    return substr(
        str_shuffle(str_repeat(
                            $x, ceil($lenght/strlen($x)) 
                            )
                    ), 1,$lenght);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require(ROOT_PATH . '/app/helpers/validation.php');
    if ($err === 0) {
       unset($_POST['sign-up'], $_POST['conpassword']);
       $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
           /*  $verify_id = selectOne($table, $user_id);
            $codes = array('user_id'=>$user_id, 'email_code'=>generateRandomString($email_vrification_code, 25), 'phone_code'=>generateRandomString($phone_code, 7), 'referals_code'=>generateRandomString($referal_code, 6));
            $code_insert = create('codes', $codes); */
            echo "hello";
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
