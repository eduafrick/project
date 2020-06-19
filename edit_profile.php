<?php 
include('path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit <?php echo $s['full_name'];?> Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include(ROOT_PATH . '/app/includes/messages.php');?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="address">
        <input type="text" name="id" id="id" value="<?php echo $s['id'];?>">
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
                <label for="address">Address:&nbsp;
                    <input type="text" name="address" id="address" class="text-input" placeholder="Address" value="<?php echo $address;?>">
                <span class="error">*<?php echo $error_address;?></span>
                </label>
            </div>
            <div class="label">
                <label for="address">Address 2<span class="error">(optional)</span>:&nbsp;
                    <input type="text" name="address2" id="address2" class="text-input" placeholder="Address 2" value="<?php echo $address2;?>">
                </label>
            </div>
            <div class="label">
                <label for="country">Country:&nbsp;
                    <input type="text" name="country" id="country" class="text-input" placeholder="Country" value="<?php echo $country;?>">
                    <span class="error">*<?php echo $error_con; echo "&nbsp;"; echo $error_con2;?></span>
                </label>
            </div>
            <div class="label">
                <label for="age">Age:&nbsp;
                    <input type="date" name="age" id="age" class="text-input" placeholder="Age" value="<?php echo $age;?>">
                </label>
            </div>
            <div class="label">
                <label for="fb-link">Facebook Link:&nbsp;
                    <input type=text name="fb_link" id="fb_link" class="text-input" placeholder="Facebook Link" value="<?php echo $fb_link;?>">
                </label>
            </div>
            <!-- <div class="label">
                <label for="image">Image:&nbsp;
                    <input type="file" name="image" id="image" class="text-input" value="<?php //echo $image;?>">
                    <span class="error">*<?php //echo $error_image; echo "&nbsp;"; echo $error_image2;?></span>
                </label>
            </div> -->
            <div class="label">
                <label for="ref">Where did you hear about us:&nbsp;
                    <input type="text" name="ref" id="ref" class="text-input" placeholder="" value="<?php echo $ref;?>">
                </label>
            </div>
            
        </div>
        <button type="submit" class="btn-action btn" name="update"  id="update">Update</button>
    </form>
</body>

</html>