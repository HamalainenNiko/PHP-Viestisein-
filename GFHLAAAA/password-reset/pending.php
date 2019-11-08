<?php 
include('app_logic.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post" class="login-form">
    <p>
        An email has been sent to <b><?php echo $_GET['email'] ?></b> to help you recover your account.
    </p>
    <p>Please login to your email account and click on the link we've sent you</p>
    <?php var_dump($_GET);?>
    </form>
</body>
</html>