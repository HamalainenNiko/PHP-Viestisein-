<?php 
include('functions.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="index.php" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="login.php" id="right">Login</a></li>
              </nav>
    </section>    
</header>

    <form method="post" id="box"action="register.php">
    <h2>Register</h2>

    <?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="">
    </div>
    <div class="input-group">
        <label>Email</label><br>
        <input type="email" name="email" value="">
    </div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
</form>
</body>
</html>