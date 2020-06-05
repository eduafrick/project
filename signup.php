<?php 
include('path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>signup!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include(ROOT_PATH . '/app/includes/error.php')?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="address">
            <div class="label">
                <label for="full-name">Full Name:&nbsp;
                    <input type="text" name="full-name" id="full-name" class="text-input" placeholder="Full Name" value="<?php echo $full_name;?>">
                </label>
            </div>
            <div class="label">
                <label for="email">Email:&nbsp;
                    <input type="email" name="email" id="email" class="text-input" placeholder="Email" value="<?php echo $email;?>">
                </label>
            </div>
            <div class="label">
                <label for="phone">Phone:&nbsp;
                    <input type="number" name="phone" id="phone" class="text-input" placeholder="Phone Number" value="<?php echo $phone;?>">
                </label>
            </div>
            <div class="label">
                <label for="username">Username:&nbsp;
                    <input type="text" name="username" id="username" class="text-input" placeholder="Username" value="<?php echo $username;?>">
                </label>
            </div>
            <div class="label">
                <label for="password">Password:&nbsp;
                    <input type="password" name="password" id="password" class="text-input" placeholder="Password" value="<?php echo $password;?>">
                </label>
            </div>
            <div class="label">
                <label for="conpassword">Confirm Password:&nbsp;
                    <input type="password" name="conpassword" id="conpassword" class="text-input" placeholder="Confirm Password" value="<?php echo $conpassword;?>">
                </label>
            </div>
            <div class="label">
                <label for="address">Address:&nbsp;
                    <input type="text" name="address" id="address" class="text-input" placeholder="Address" value="<?php echo $address;?>">
                </label>
            </div>
            <div class="label">
                <label for="address">Address 2<span>(optional)</span>:&nbsp;
                    <input type="text" name="address2" id="address2" class="text-input" placeholder="Address 2" value="<?php echo $address2;?>">
                </label>
            </div>
            <div class="label">
                <label for="country">Country:&nbsp;
                    <input type="text" name="country" id="country" class="text-input" placeholder="Country" value="<?php echo $country;?>">
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
            <div class="label">
                <label for="image">Image:&nbsp;
                    <input type="file" name="image" id="image" class="text-input" value="<?php echo $image;?>">
                </label>
            </div>
            <div class="label">
                <label for="ref">Where did you hear about us:&nbsp;
                    <input type="text" name="ref" id="ref" class="text-input" placeholder="" value="<?php echo $ref;?>">
                </label>
            </div>
            <div class="label">
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" class="text-input" placeholder="">&nbsp;I agree tp <a href="#">blah blah blah</a>
                </label>
            </div>
            <div class="label">
                <label for="policy">
                    <input type="checkbox" name="policy" id="policy" class="text-input" placeholder="">&nbsp;I agree to <a href="#">blah blah blah</a>
                </label>
            </div>
        </div>
        <button type="submit" class="btn-action btn" name="sign-up">Sign UP</button>
    </form>
    <div class="login">
        <span>Or <a href="./login.html">Login here</a></span>
    </div>
</body>

</html>