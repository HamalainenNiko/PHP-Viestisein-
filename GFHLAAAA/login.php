<?php include('functions.php') 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>

</style>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="index.php" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="messageboards/board.php" id="right">Messages</a></li>
              </nav>
    </section>    
</header>

    <form method="post" id="box" class="card" action="login.php">
    <h2>Login</h2>

        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div  class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div><br><br>
        <div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
        <p>
            <p><a href="register.php" >Sign up</a></p> 
            <p><a hreF="password-reset/enter_email.php">Forgot your password?</a></p>
        </p>
    </form>
</body>
</html>