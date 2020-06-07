<?php
$err = 0;
$user = $_POST;
$regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
$regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";
$regexpassword = "/^[a-zA-Z\d]+$/";
$regexphone = "/^[\d]+$/";
$lenght = strlen($user['password']);



#FULLNAME VALIDATION
if (empty($user['full-name'])) {
    $error_full_name = 'Full Name Required';
    $err++;
} 

if (!empty($user['full-name']) && !preg_match($regexname, $user['full-name'])) {
    $error_full_name2 = 'Full Name:Invalid Charaters';
    $err++;
}

#EMAIL VALIDATION
if (empty($user['email'])) {
    $error_email = 'Email Required';
    $err++;
}
if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
    $error_email2 = 'Email:Invalid Charaters';
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

#USERNAME VALIDATION
if (empty($user['username'])) {
    $error_username = 'Username Required';
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
    $error_pass3 = 'Password Must contain 8 to 16 charaters';
    $err++;
}
    
#CONFIRMATION PASSWORD VALIDATION
if ($user['conpassword'] !== $user['password']) {
    $error_passcon = 'Passwords do not match';
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

if ($_FILES['image']['name']) {
    $image_name = time() . '_' . $_FILES['image']['name'];
    $destination = ROOT_PATH . "/assets/images/" . $image_name;

    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    if ($result) {
        $_POST['image'] = $image_name;
    } else {
        $error_image =  'Failed To Upload Image';
        $err++;
        }   
    } else {
        $error_image2 =  'Post Image Required';
        $err++;
    }


?>