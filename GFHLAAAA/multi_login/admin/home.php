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
                <li><a href="../index.html" id="left">G.F.H.L.A.A.A.A</a></li>
                <li><a href="users.php">Manage Users</a></li>
              <li>Logged as Admin</li>
              </nav>
    </section>    
</header>
        <h2>Admin - Home Page</h2>
    <div class="content">
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

        <div class="profile_info">
            <img src="../img/group2.png">

            <div>
                <?php if(isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                        <br>
                        <a href="home.php?logout='1'" style="color: red;">logout</a><br>
                        &nbsp; <a href="create_user.php">Add User</a>
                    </small>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>
</html>