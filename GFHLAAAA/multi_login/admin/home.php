<?php 
include('../functions.php');

if(!isAdmin()){
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}



if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style> 
    
    .header2 {
        background: #003366;
    }
    button[name=register_btn] {
        background: #003366;
    }
    </style>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="../../index.php" id="left">G.F.H.L.A.A.A.A</a></li>
                <li><a href="users.php">Manage Users</a></li>
              <li>Logged as Admin</li>
              </nav>
    </section>    
</header>
        <h2>Admin - Home Page</h2>
        <?php if(isset($_SESSION['success'])) : ?>
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
  <img src="../img/group2.png"  style="width:100%">
  <h1><?php echo $_SESSION['user']['username']; ?></h1>
  <p class="title"> <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></p>
  <p>G.F.H.L.A.A.A.A</p>

  <p><button></button></p>
</div>

</body>
</html>