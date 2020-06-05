<?php
include(ROOT_PATH . '/app/helpers/validate.php');
$full_name = "";
$email = "";
$phone = "";
$username = "";
$password = "";
$conpassword = "";
$address = "";
$address2 = "";
$country = "";
$age = "";
$fb_link ="";
$ref = "";
$user_id ="";
$table = "user";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = validate($_POST);
    if (!empty($_FILES['image']['name'])) {
        echo "hello";
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, 'Failed To Upload Image');
        	}   
        } else {
            array_push($errors, 'Post Image Required');
        }
    if (count($errors) == 0) {
       
       unset($_POST['sign-up'], $_POST['conpassword']);
       $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
         echo "Sucessful";
    }else{
        $_SESSION['message'] = "Hi";
        $_SESSION['type'] = "error";
        $full_name = $_POST['full-name'];
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