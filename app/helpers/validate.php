<?php 
function validate($user) {
        $errors = array();
        $regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";
        $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
        $regexpassword = "/^[a-zA-Z\d]+$/";
        $regexphone = "/^[\d]+$/";
        $lenght = strlen($user['password']);
        
        #FULLNAME VALIDATION
        if (empty($user['full-name'])) {
            array_push($errors, 'Full Name Required');
        }
        if (!empty($user['full-name']) && !preg_match($regexname, $user['full-name'])) {
            array_push($errors, 'Full Name:Invalid Charaters');
        }

        #EMAIL VALIDATION
        if (empty($user['email'])) {
            array_push($errors, 'Email Required');
        }
        if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
            array_push($errors, 'Email:Invalid Charaters');
        }

        #PHONE NUMBER VALIDATION
        if (empty($user['phone'])) {
            array_push($errors, 'Phone Required');
        }
        if (!empty($user['phone']) && !preg_match($regexphone, $user['phone'])) {
            array_push($errors, 'Phone:Invalid Charaters');
        }

        #USERNAME VALIDATION
        if (empty($user['username'])) {
            array_push($errors, 'Username Required');
        }

        
        #PASSWORD VALIDATION
        if (empty($user['password'])) {
            array_push($errors, 'Password Required');
        }
        if (!empty($user['password']) && !preg_match($regexpassword, $user['password'])) {
            array_push($errors, 'Password:Invalid Charaters');
        }
        if ($lenght <= 8 || $lenght >= 16) {
            array_push($errors, 'Password Must contain 8 to 16 charaters');
        }
        
        #CONFIRMATION PASSWORD VALIDATION
        if ($user['conpassword'] !== $user['password']) {
            array_push($errors, 'Passwords do not match');
        }
        

        #ADDRESS VALIDATION
        if (empty($user['address'])) {
            array_push($errors, 'address Required');
        }

        #COUNTRY VALIDATION
        if (empty($user['country'])) {
            array_push($errors, 'Country Required');
        }
        if (!empty($user['Country']) && !preg_match($regexname, $user['country'])) {
            array_push($errors, 'Country:Invalid Charaters');
        }
        
        return $errors;
}








?>