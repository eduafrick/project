<?php
$err = 0;
$user = $_POST;
$regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
$regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";
$regexpassword = "/^[a-zA-Z\d]+$/";
$regexphone = "/^[\d]+$/";
$lenght = strlen($user['password']);
$exiting_email = selectAny($table, $email = array('email'=>$user['email']));
$exiting_phone = selectAny($table, $phone = array('phone'=>$user['phone']));
$exiting_username = selectAny($table, $username = array('username'=>$user['username']));


#FULLNAME VALIDATION
if (empty($user['full_name'])) {
    $error_full_name = ucwords('Full name Required');
    $err++;
} 

if (!empty($user['full_name']) && !preg_match($regexname, $user['full_name'])) {
    $error_full_name2 = 'Full Name:Invalid Charaters';
    $err++;
}

#EMAIL VALIDATION
if (empty($user['email'])) {
    $error_email = 'Email Required';
    $err++;
}
if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
    $error_email2 = ucwords('Email:Invalid Charaters');
    $err++;
}
if((isset($_GET['id'])) && $exiting_email){
    $error_email = ucwords("Email already exists");
    $err++;
}

#PHONE NUMBER VALIDATION
if (empty($user['phone'])) {
    $error_phone ='Phone Required';
    $err++;
}
if (!empty($user['phone']) && !preg_match($regexphone, $user['phone'])) {
    $error_phone2 = 'Phone:Invalid Charaters';
    $err++;
}
if((isset($_GET['id'])) && $exiting_phone){
    $error_phone = "Phone Number already exists";
    $err++;
}

#USERNAME VALIDATION
if (empty($user['username'])) {
    $error_username = 'Username Required';
    $err++;
}

if((isset($_GET['id'])) && $exiting_username){
    $error_username = ucwords("Username already exists");
    $err++;
}

    
#PASSWORD VALIDATION
if (empty($user['password'])) {
    $error_pass = 'Password Required';
    $err++;
}
if (!empty($user['password']) && !preg_match($regexpassword, $user['password'])) {
    $error_pass2 = 'Password:Invalid Charaters';
    $err++;
}
if ($lenght <= 8 || $lenght >= 16) {
    $error_pass3 = ucwords('Password Must contain 8 to 16 charaters');
    $err++;
}
    
#CONFIRMATION PASSWORD VALIDATION
if ($user['conpassword'] !== $user['password']) {
    $error_passcon = ucwords('Passwords do not match');
    $err++;
}
    

#ADDRESS VALIDATION
if (empty($user['address'])) {
    $error_address = 'Address Required';
    $err++;
}

#COUNTRY VALIDATION
if (empty($user['country'])) {
    $error_con = 'Country Required';
    $err++;
}
if (!empty($user['Country']) && !preg_match($regexname, $user['country'])) {
    $error_con2 = 'Country:Invalid Charaters';
    $err++;
}

#IMAGE VALIDATION //not working yet

if (empty($_FILES['image']['name'])) {
    $error_image2 =  'Post Image Required';
        $err++;
    }else {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            $error_image =  'Failed To Upload Image';
            $err++;
            }
        }


?>