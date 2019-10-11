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

    </style>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="../index.php" id="left">G.F.H.L.A.A.A.A</a></li>
                <li><a href="users.php">Manage Users</a></li>
                <li><a href="create_user.php">Create User</a></li>
              </nav>
              <div class="profile_info">
            <img src=<?php echo '../images/'.$_SESSION['user']['profile_image']; ?>>
            <strong>
        <?php echo $_SESSION['user']['username']; ?>
</strong>
    <small>
        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)
        <br>
        <a href="home.php?logout='1'" style="color: red;">logout</a></i>
    </small>
    </div>
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


<!--   echo "<img src='images/" .$row['profile_image']."' />"; -->
<?php 
    $id = $_SESSION['user']['id'];
    $id = mysqli_real_escape_string($db,$id);
    $sql = "SELECT * FROM users WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    
    while($row = mysqli_fetch_array($result)){
        echo "<img src='../images/" .$row['profile_image']."' width=100%/>";
        echo '<h1>'.$row['username'].'</h1>';
        echo '<p class=title><i  style=color: #888;>('.$_SESSION['user']['user_type'].') <br></p>';
        echo '<p>Bio: <br>'.$row['info'].'</p>';
        echo '<p>G.F.H.L.A.A.A.A</p>';
        echo '<h5><a href="../profile_edit.php">Edit Profile</a></h5>';
        echo '<h6><a href="../password-reset/enter_email.php">Change Password</h6>';
        echo '<p><button></button></p>';
        
    }
    ?>

</div>

</body>
</html>