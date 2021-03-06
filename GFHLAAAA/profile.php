<?php 
    include('functions.php');
    if(!isLoggedIn()){
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }

    if(isAdmin() || isOwner()){
        header('location: admin/home.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script2.js"></script>
    <script src="script3.js"></script>
    
    
</head>
<body>
<header>
    <section id="link">   
        <nav>
            <a href="index.php" id="left">G.F.H.L.A.A.A.A</a>
            <li><a href="messageboards/board.php" id="right">Messages</a></li>

        </nav>
        <div class="profile_info" id="myForm">
            <img src=<?php echo 'images/'.$_SESSION['user']['profile_image']; ?>>
        <?php echo $_SESSION['user']['username']; ?>
        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
        <a href="profile.php?logout='1'" style="color: red;">logout</a></i>
    </div>
    </section>    
</header>
<div class="header">
    <h2>Home Page</h2>
</div>
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

    <form action="profile.php" class="card" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
              </div>
              <img src='images/<?php echo $_SESSION['user']['profile_image'] ?>' onClick="triggerClick()" id="profileDisplay" width=95%>
            </span>
            <input type="file" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label><br>
            <h1><?php echo $_SESSION['user']['username']?></h1>
            <p class=title><i  style='color: #888'>(<?php echo $_SESSION['user']['user_type']?>)</i></p>
            <p>Bio: <br><?php echo $_SESSION['user']['info'];?></p>
            <h5><a href="profile_edit.php">Edit Profile</a></h5>
            <h6><a href="password-reset/enter_email.php">Change Password</a></h6>
            <button></button>
          </div>
    </form>

</body>
</html>
