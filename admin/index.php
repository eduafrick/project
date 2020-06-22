<?php 
include('../path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');
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
   <div class="container">
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<?php include(ROOT_PATH . '/app/includes/error.php');?>
       <h1>Admin Login</h1>
            <div>
                <label for="Username">Username/Email:&nbsp;
                    <input type="text" name="logad" id="logad" placeholder="Username/Email" value="<?php echo $username;?>">
                    <span class="error">*<?php echo $error_logad;?></span>
                </label>
            </div>
            <div>
                <label for="password">Password:&nbsp;
                    <input type="password" name="password" id="password" placeholder="password" value="<?php echo $password;?>">
                    <span class="error">*<?php echo $error_pass; echo "&nbsp;"; echo $error_pass2; echo "&nbsp;"; echo $error_pass3;?></span>
                </label>
            </div>
            <button type="submit" name="admin-btn" id="admin-btn" class="btn">Login</button>
        </form>
   </div>
</body>
</html>