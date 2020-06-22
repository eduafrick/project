<?php 
include('path.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php include(ROOT_PATH . '/app/includes/messages.php');?>
    <a href="./bridge.php?action=signup">Sign Up</a>
    <a href="./bridge.php?action=login">Login</a>
    <a href="admin/index.php">Admin Login</a>
</body>
</html>