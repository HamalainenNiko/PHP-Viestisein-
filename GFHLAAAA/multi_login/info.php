<?php 
    include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
  <header>
    <section id="link">   
      <nav>
        <li><a href="index.php" id="left">G.F.H.L.A.A.A.A</a></li>
        <?php if(!isset($_SESSION['user'])) : ?>
        <li><a href="login.php" id="right">Login</a></li>
        <?php endif ?>
        <?php  if (isset($_SESSION['user'])) : ?>
        <li><a href="profile.php">Profile</a></li>
      </nav>
      <div class="profile_info">
		    <a href="profile.php"> <img src=<?php echo 'images/'. $_SESSION['user']['profile_image']; ?>></a>
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
  <br>
  <div  class="card">
    <?php 
      $id = $_GET['id'];
      $id = mysqli_real_escape_string($db,$id);
      $sql = "SELECT * FROM users WHERE id='" . $id . "'";
      $result = mysqli_query($db, $sql);

      while($row = mysqli_fetch_array($result)){
        echo "<img src='images/" .$row['profile_image']."' />";
        echo '<h1>'.$row['username'].'</h1>';
        echo '<p class=title><i  style=color: #888;>('.$row['user_type'].') <br></p>';
        echo '<p>Bio: <br>'.$row['info'].'</p>';
        echo '<p>G.F.H.L.A.A.A.A</p>';
        echo '<p><button></button></p>';
      }
      ?>
  </div>
</body>
</html>