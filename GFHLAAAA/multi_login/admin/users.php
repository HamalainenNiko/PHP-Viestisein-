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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<header>
    <section id="link">   
        <nav>
            <li><a href="../../index.php" id="left">G.F.H.L.A.A.A.A</a></li>
            <li><a href="home.php">Admin Home</a></li>
            <li>Logged as Admin</li>
        </nav>
    </section>    
</header>
 <div class="card"> 
<?php
$sql = "SELECT * FROM users";
$result = $db->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<img src=../img/group2.png style=width:100%>";
        echo "<h1>".$row["username"]."</h1>"."<p class=title>".$row["user_type"]."</p>";
        echo "<p>"."G.F.H.L.A.A.A.A"."</p>"."<br>";
    } 
}else{
        echo "0 results";
    }
$db->close();
?>
 </div> 
</body>
</html>