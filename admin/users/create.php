<?php 
include('../../path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $s['admin'];?>-Create Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include(ROOT_PATH . '/app/includes/messages.php');?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <h1>Create Admin</h1>
    <div class="address">
            <div class="label">
                <label for="full-name">Full Name:&nbsp;
                    <input type="text" name="full_name" id="full_name" class="text-input" placeholder="Full Name" value="<?php echo $full_name;?>">
                    <span class="error">*<?php echo $error_full_name; echo "&nbsp;"; echo $error_full_name2;?></span>
                </label>
            </div>
            <div class="label">
                <label for="email">Email:&nbsp;
                    <input type="email" name="email" id="email" class="text-input" placeholder="Email" value="<?php echo $email;?>">
               <span class="error">*<?php echo $error_email; echo "&nbsp;"; echo $error_email2?></span>
                </label>
            </div>
            <div class="label">
                <label for="phone">Phone:&nbsp;
                    <input type="number" name="phone" id="phone" class="text-input" placeholder="Phone Number" value="<?php echo $phone;?>">
                <span class="error">*<?php echo $error_phone; echo "&nbsp;"; echo $error_phone2;?></span>
                </label>
            </div>
            <div class="label">
                <label for="username">Username:&nbsp;
                    <input type="text" name="username" id="username" class="text-input" placeholder="Username" value="<?php echo $username;?>">
                    <span class="error">*<?php echo $error_username;?></span>
                </label>
            </div>
            <div class="label">
                <label for="password">Password:&nbsp;
                    <input type="password" name="password" id="password" class="text-input" placeholder="Password" value="<?php echo $password;?>">
                    <span class="error">*<?php echo $error_pass; echo "&nbsp;"; echo $error_pass2; echo "&nbsp;"; echo $error_pass3;?></span>
                </label>
            </div>
            <div class="label">
                <label for="conpassword">Confirm Password:&nbsp;
                    <input type="password" name="conpassword" id="conpassword" class="text-input" placeholder="Confirm Password" value="<?php echo $conpassword;?>">
                <span class="error">*<?php echo $error_passcon?></span>
                </label>
            </div>
            <div class="label">
                <label for="image">Image:&nbsp;
                    <input type="file" name="image" id="image" class="text-input" value="<?php echo $image;?>">
                    <span class="error">*<?php echo $error_image; echo "&nbsp;"; echo $error_image2;?></span>
                </label>
            </div>
        </div>
        <button type="submit" class="btn-action btn" name="admin-sign-up"  id="admin-sign-up">Add Admin</button>
    </form>
</body>

</html>