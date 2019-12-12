<?php 
include('../functions.php');

if(isOwner() || isAdmin()){
    
}else{
    header('location: ../profile.php');
    echo "You must be Admin or higher to create users";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <header>
      <section id="link">   
        <nav>
          <li><a href="#" id="left">G.F.H.L.A.A.A.A</a></li>
          <?php if(!isset($_SESSION['user'])) : ?>
          <li><a href="login.php" id="right">Login</a></li>
          <li><a href="register.php" >Register</a></li>
          <?php endif ?>
          <?php  if (isset($_SESSION['user'])) : ?>
          <li><a href="home.php">Profile</a></li>
        </nav>
        <div class="profile_info">
		      <a href="profile.php"> <img src=<?php echo '../images/'. $_SESSION['user']['profile_image']; ?>>
          </a>
				  <strong>
            <?php echo $_SESSION['user']['username']; ?>
          </strong>
				  <small>
                  <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
					  <a href="create_user.php?logout='1'" style="color: red;">logout</a>
				  </small>
				  <?php endif ?>
			  </div>
    </section>    
  </header>
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
                <label>Email</label><br>
                <input type="email" name="email">
            </div>
            <div class="input-group">
                <label>User type</label><br>
                <select name="user_type" id="user_type">
                    <option value=""></option>
                    <?php if($_SESSION['user']['user_type'] == "owner") : ?>

                    <option value="admin">Admin</option>
                    <?php endif; ?>
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