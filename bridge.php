<?php 
include('path.php');

if($_GET['action'] == 'signup'){
    $file = "/signup.php";
}
if($_GET['action'] == 'login'){
    $file = "/login.php";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
    <a href="<?php echo BASE_URL . $file ."?role=teacher";?>">Teacher</a>
    <a href="<?php echo BASE_URL . $file ."?role=student";?>">Student</a>
    </body>
</html>