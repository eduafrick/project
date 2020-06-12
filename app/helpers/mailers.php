<?php 

$user_ide = selectOne($table, ['id' => $user_id]);
$user_code = selectOne('codes', ['user_id' => $user_id]);

$to = $user_ide['email'];
$subject = ucwords("Email Verification | EduAfric.com");

$message = "
<html>
<style>
a{padding: 2em;
    background: blue;
    border: 2px solid grey;}
</style>
<head>
<title>Verify Your email</title>
</head>
<body>
<a href=http://localhost:8080/EduAfric/verify.php?email_code=" . $user_code['email_code'] . ">Verify</a>
</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: ugochukwu.ekwueme@yahoo.com' . "\r\n";
/* $headers .= 'Cc: myboss@example.com' . "\r\n"; */

mail($to,$subject,$message,$headers);


?>