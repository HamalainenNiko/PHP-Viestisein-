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
</head>
<style>
    h2 {
        padding: 0 10px;
    }
    form {
        padding: 0 10px;
    }
</style>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="../index.html" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="multi_login/login.php" id="right">Login</a></li>
              </nav>
    </section>    
</header>

    <form method="post" id="box" action="login.php">
    <h2>Login</h2>

        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
        <p>
            <a href="register.php" >Sign up</a>
        </p>
    </form>
</body>
</html>