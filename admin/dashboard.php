<?php 
#INCLUDING THE NECESSARY FILES
include('../path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $s['full_name']?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo BASE_URL;?>/assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php include(ROOT_PATH . '/app/includes/messages.php');?>
    <div class="container">
        <a href="<?php echo BASE_URL;?>/logout.php">Logout</a>
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
                    <li><span class="list">Email:</span>&nbsp;<span class="list_text"><?php echo $s['email']?></span></li>
                    <li><span class="list">Username:</span>&nbsp;<span class="list_text"><?php echo $s['username']?></span></li>
                    <li><span class="list">Phone Number:</span>&nbsp;<span class="list_text"><?php echo $s['phone']?></span></li>
                </ul>
            </div>
        </div>
        <a href="<?php echo BASE_URL;?>/admin/users/create.php">Add Admin</a>
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