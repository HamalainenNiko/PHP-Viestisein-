<?php 
include('../functions.php');

if(isOwner() || isAdmin()){

}else{
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
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
        <header>
            <section id="link">   
                <nav>
                    <li><a href="../index.php" id="left">G.F.H.L.A.A.A.A</a></li>
                    <li><a href="users.php">Manage Users</a></li>
                    <li><a href="create_user.php">Create User</a></li>
                    <li><a href="../messageboards/board.php" id="right">Messages</a></li>

                </nav>
                <div class="profile_info">
                    <img src=<?php echo '../images/'.$_SESSION['user']['profile_image']; ?>>
                    <strong>
                        <?php echo $_SESSION['user']['username']; ?>
                    </strong>
                    <small>
                    <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
                        <a href="home.php?logout='1'" style="color: red;">logout</a>
                    </small>
                </div>
            </section>    
        </header>
 
        <?php
            global $password;
            $sql = "SELECT * FROM users";
            $result = $db->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    if(!$row['info']){
                        $row['info'] = "No information given";
                    }
                    echo '<div class=card>';
                    echo "<img src='../images/" .$row['profile_image']."' width=100%/>";
                    echo "<h1>".$row["username"]."</h1>"."<p class=title>".$row["user_type"]."</p>";
                    echo "<p>".$row['info']."</p>"; 
                    echo '<p><button></button></div></p>';
                    echo'<br>';
                } 
            }else{
                echo "0 results";
            }
        $db->close();
        ?>
    </body>
</html>