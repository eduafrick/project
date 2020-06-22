<?php 
#INCLUDING THE NECESSARY FILES
include('../path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');

function checkVerification($each){
    if($each == false){
        echo '<button onclick="display()" class="btn">Verify</button>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $s['full_name']?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo BASE_URL;?>/assets/css/style.css" rel="stylesheet">
    <script src="<?php echo BASE_URL;?>/assets/js/script.js"></script>
</head>

<body>
<?php include(ROOT_PATH . '/app/includes/messages.php');?>
<div class="phone" id="phone">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="hidden" name="verify_phone_id" id="verify_phone_id" value="<?php echo $s['id'];?>">
        <div>
            <input type="number" class="text-input" name="code" id="code" placeholder="1234567...">
        </div>
        <button class="text-input" name="verify" id="verify">Verify</button>
    </form>
</div>
    <div class="container">
        <a href="./logout.php">Logout</a>
        <a href="<?php echo BASE_URL;?>/edit_profile.php?id=<?php echo $s['id'] . "&key=" . $s['un_code']; ?>" class="edit">Edit Profile</a>
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?del_id=<?php echo $s['id'] . "&key=" . $s['un_code']; ?>" class="edit">Delete Account</a>
        <div class="id">
            <div class="profile_image">
                <img src="<?php echo BASE_URL . '/assets/images/' . $s['image']; ?>" alt="profile_image">
                <span><?php echo $s['full_name']?>.</span>
            </div>
            <div class="id_name">
                <ul>
                    <li><span class="list">Name:</span>&nbsp;<span class="list_text"><?php echo $s['full_name']?></span></li>
                    <li><span class="list">Email:</span>&nbsp;<span class="list_text"><?php echo $s['email']?></span><?php checkVerification($s['verified_phone']);?></li>
                    <li><span class="list">Username:</span>&nbsp;<span class="list_text"><?php echo $s['username']?></span></li>
                    <li><span class="list">Phone Number:</span>&nbsp;<span class="list_text"><?php echo $s['phone']?></span><?php checkVerification($s['verified_phone']);?></li>
                    <li><span class="list">Country:</span>&nbsp;<span class="list_text"><?php echo $s['country']?></span></li>
                </ul>
            </div>
        </div>
        <div class="courses">
            <div class="current">
                <div class="box">
                    <img src="" alt="coruse_image">
                    <div class="course_details_sub">
                        <span>Lorem, ipsum dolor.</span>
                        <span>Expires on Dec, 19 2018</span>
                        <span><i fa fas-star></i></span>
                    </div>
                </div>
                <div class="box">
                    <img src="" alt="coruse_image">
                    <div class="course_details_sub">
                        <span>Lorem, ipsum dolor.</span>
                        <span>Expires on Dec, 19 2018</span>
                        <span><i fa fas-star></i></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>