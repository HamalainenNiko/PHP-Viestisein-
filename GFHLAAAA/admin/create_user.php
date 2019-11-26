<?php 
include('../functions.php');

if(!isOwner()){
    if(isLoggedIn()){
        header('location: ../profile.php');
        echo "You must be the Owner to access this site";
    }else{
        header('location: ../login.php');
        echo "You must be the owner to create new Admins";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create user</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <form method="post" id="box" action="create_user.php">
            <h2>Admin <br> User Creation</h2>
            <?php echo display_error(); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>

            <div class="input-group">
                <label>User type</label><br>
                <select name="user_type" id="user_type">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Create user</button>
            </div>
        </form>            
    </body>
</html>