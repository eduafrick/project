<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="./login.html">
        <div class="label">
            <label for="logad">Email/Username:&nbsp;
                <input type="text" name="logad" id="logad" class="text-input" placeholder="Email or Username">
            </label>
        </div>
        <div class="label">
            <label for="password">Password:&nbsp;
                <input type="password" name="password" id="password" class="text-input" placeholder="Password">
            </label>
        </div>
        <button type="submit" class="btn-action btn">Log In</button>
    </form>
</body>

</html>