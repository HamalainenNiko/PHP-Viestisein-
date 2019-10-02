<?php 
    include('functions.php');
    if(!isLoggedIn()){
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="script2.js"></script>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="#" id="left">G.F.H.L.A.A.A.A</a></li>
      <?php  if (isset($_SESSION['user'])) : ?>
      <li><a href="profile.php">Profile</a></li>
      </nav>
      <div class="profile_info">
		<a href="profile.php"> <img src="img/group2.png"></a>
				<strong>
          <?php echo $_SESSION['user']['username']; ?>
        </strong>
				<small>
					<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					<br>
					<a href="index.php?logout='1'" style="color: red;">logout</a>
				</small>
				<?php endif ?>
			</div>
    </section>    
</header>

<div class="wrapper">
    <h2>Change Password</h2>
    <p>Fill your information to change your password</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form group <?php echo (!empty($old_password_err)) ? 'has-error' : ' '; ?>">
            <label>Old Password</label>
            <input type="password" name="old_password" class="form-control" value="">
            <span class="help-block"><?php echo $old_password_err; ?></span>
        </div>
        <div class="form-group <?php echo
            (!empty($new_password_err)) ? 'has-error' : ' '; ?>">
            <label>New password</label>
            <input type="password" name="new_password" 
            class="form-control" value="<?php echo $new_password; ?>">
            <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo
            (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="reset_btn" value="Submit">
        </div>
    </form>
</div>
</body>
</html>