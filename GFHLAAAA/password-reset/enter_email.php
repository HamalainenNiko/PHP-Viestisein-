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
    <link rel="stylesheet" href=../main.css>
    <title>Password Reset</title>
</head>
<body>
<header>
      <section id="link">   
        <nav>
          <li><a href="../index.php" id="left">G.F.H.L.A.A.A.A</a></li>
          <?php if(!isset($_SESSION['user'])) : ?>
          <li><a href="../login.php" id="right">Login</a></li>
          <?php endif ?>
          <?php  if (isset($_SESSION['user'])) : ?>
          <li><a href="profile.php">Profile</a></li>
        </nav>
        <div class="profile_info">
		      <a href="profile.php">  <img src=<?php echo '../images/'.$_SESSION['user']['profile_image']; ?>>
          </a>
				  <strong>
            <?php echo $_SESSION['user']['username']; ?>
          </strong>
				  <small>
					  <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
					  <a href="index.php?logout='1'" style="color: red;">logout</a>
				  </small>
				  <?php endif ?>
			  </div>
    </section>    
  </header>
    <form class="card" action="enter_email.php" method="post">
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
<?php    var_dump($_SESSION);
?>
</body>
</html>