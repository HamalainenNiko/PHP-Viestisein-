<?php 
    include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <?php if(!isset($_SESSION['user'])) : ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php" id="right">Register</a></li>
          <?php endif ?>
          <?php  if (isset($_SESSION['user'])) : ?>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="messageboards/board.php" id="right">Messages</a></li>
        </nav>
        <div class="profile_info">
		      <a href="profile.php"> <img src=<?php echo 'images/'. $_SESSION['user']['profile_image']; ?>>
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
  <div class="content">
    <h2>Lorem Ipsum.</h2>
    <p> Ipsum Lorem.<br> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quisquam, 
    accusamus culpa impedit rem atque est facere <br> magni ducimus esse laborum ea? Iure esse excepturi debitis facere reprehenderit! Totam ipsa ven
    rem necessitatibus maiores <br> consequatur. Doloremque reiciendis veritatis quod? Harum.
    <ul>Existing members:

    <?php
      $sql = "SELECT * FROM users";
      $result = $db->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $name=$row['username'];
          echo '<br><br><a href=info.php?id=' .$row['id'].'><button id='.$name.'  class=button1>';
          echo $name;
          echo '</button></a>';
        }
      }
    ?>

</div>
</body>
</html>