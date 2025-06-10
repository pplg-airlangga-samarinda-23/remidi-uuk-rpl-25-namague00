<?php

$username = @$_POST['username'];
$password = @$_POST['password'];
$userbener = "admin";
$passbener = "admin123";

if ($username == $userbener && $password == $passbener){
    header("Location:admin2.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
     <div class="login-container">
        <h2>Login Admin</h2>
        <form action="" method="POST" class="login-form">
            <input type="hidden" name="role" value="admin">
            <input type="text" name="username" placeholder="Username" >
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>