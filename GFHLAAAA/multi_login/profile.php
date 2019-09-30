<?php 
    include('functions.php');
    if(!isLoggedIn()){
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }

    if(isAdmin()){
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
</head>
<body>
<header>
    <section id="link">   
        <nav>
            <a href="../index.php" id="left">G.F.H.L.A.A.A.A</a>
            <a href="profile_edit.php">Edit Profile</a>
        </nav>
        <div class="profile_info" id="myForm">
            <img src="img/group2.png">
        <?php echo $_SESSION['user']['username']; ?>
        <i  style="color #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)
        <br>
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
    <div class="card">
  <img src="img/group2.png"  style="width:100%">
  <h1><?php echo $_SESSION['user']['username']; ?></h1>
  <p class="title"> <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></p>
  <p>G.F.H.L.A.A.A.A</p>
  <p><button></button></p>
</div>
</body>
</html>