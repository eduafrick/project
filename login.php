<?php
include('path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <span><?php echo $login_error; ?></span>
        <div class="label">
            <label for="logad">Email/Username:&nbsp;
                <input type="text" name="logad" id="logad" class="text-input" placeholder="Email or Username" value="<?php echo $username;?>">
                <span class="error">*<?php echo $error_logad;?></span>
            </label>
        </div>
        <div class="label">
            <label for="password">Password:&nbsp;
                <input type="password" name="password" id="password" class="text-input" placeholder="Password" value="<?php echo $password;?>">
                <span class="error">*<?php echo $error_pass; echo "&nbsp;"; echo $error_pass2; echo "&nbsp;"; echo $error_pass3;?></span>
            </label>
        </div>
        <button type="submit" class="btn-action" name="login-btn" id="login-btn">Log In</button>
    </form>
</body>

</html>