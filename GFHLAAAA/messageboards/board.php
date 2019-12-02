<?php 
include ('../functions.php');

if(isLoggedIn()){

}else{
    header('location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
</head>
<body>
<header>
      <section id="link">   
        <nav>
          <li><a href="#" id="left">G.F.H.L.A.A.A.A</a></li>
          <?php if(!isset($_SESSION['user'])) : ?>
          <li><a href="../login.php" id="right">Login</a></li>
          <li><a href="../register.php" >Register</a></li>
          <?php endif ?>
          <?php  if (isset($_SESSION['user'])) : ?>
          <li><a href="../profile.php">Profile</a></li>
        </nav>
        <div class="profile_info">
		      <a href="../profile.php"> <img src=<?php echo 'images/'. $_SESSION['user']['profile_image']; ?>>
          </a>
				  <strong>
            <?php echo $_SESSION['user']['username']; ?>
          </strong>
				  <small>
					  <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
					  <a href="messages.php?logout='1'" style="color: red;">logout</a>
				  </small>
				  <?php endif ?>
			  </div>
    </section>    
  </header>

  <form method="post" id="box"action="board.php">

    <?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
    </div>
	<div class="input-group">
		<button type="submit" class="btn" name="send_msg">Register</button>
	</div>
</form>
</body>
</html>