<?php 
include('app_logic.php');
?>
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
    <form action="new_password.php" class="login-form" method="post">
        <h2 class="form-title">New password</h2>
        
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        
        <div class="form-group">
            <label>New password</label>
            <input type="password" name="new_pass">
        </div>        
        <div class="form-group">
            <label>Confirm new password</label>
            <input type="password" name="new_pass_c">
        </div>
        <div class="form-group">
            <button type="submit" name="new_password" class="login-btn">Submit</button>
        </div>

    </form>
</body>
</html>