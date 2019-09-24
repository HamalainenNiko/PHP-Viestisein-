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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="../index.html" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="multi_login/login.php" id="right">Login</a></li>


              </nav>
    </section>    
</header>
    <div class="header">
    <h2>Home Page</h2>
    </div>
    <div class="content">

    <?php if (isset($_SESSION['success'])) : ?>
    <div class="error success">
    <h3>
        <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        ?>
    </h3>
</div>
<?php endif ?>

		<div class="profile_info">
			<img src="img/group2.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>