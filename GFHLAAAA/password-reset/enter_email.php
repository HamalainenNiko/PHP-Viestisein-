<?php include('../functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Password Reset</title>
</head>
<body>
    // https://codewithawa.com/posts/password-reset-system-in-php
    <form class="login-form" action="enter_email.php" method="post">
        <h2 clasS="form-title">Reset Password</h2>

        <?php include('messages.php'); ?>
        <div class="form-group">
            <label>Your email address</label>
            <input type="email" name="email">
        </div>
        <div class="form-group">
            <button type="submit" name="reset-password" class="login-btn">Submit</button>
        </div>
    </form>
</body>
</html>