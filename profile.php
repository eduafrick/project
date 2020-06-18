<?php 
include('path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/controllers/users.php');

$user = selectOne('users', 21);
dd($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ugochukwu-Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="id">
            <div class="profile_image">
                <img src="./images/giu-vicente-FMArg2k3qOU-unsplash.jpg" alt="profile_image">
                <span><?php echo $user['full_name']?>.</span>
            </div>
            <div class="id_name">
                <ul>
                    <li><span class="list">Name:</span>&nbsp;<span class="list_text">Lorem, ipsum dolor.</span></li>
                    <li><span class="list">Email:</span>&nbsp;<span class="list_text">loremipsum@gmail.com</span></li>
                    <li><span class="list">Username:</span>&nbsp;<span class="list_text">Lorem, ipsum dolor.</span></li>
                    <li><span class="list">Phone Number:</span>&nbsp;<span class="list_text">Lorem, ipsum dolor.</span></li>
                    <li><span class="list">Country:</span>&nbsp;<span class="list_text">Nigeria</span></li>
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