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

</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="../index.html" id="left">G.F.H.L.A.A.A.A</a></li>
                <li><a href="home.php">Admin Home</a></li>
              <li>Logged as Admin</li>
              </nav>
    </section>    
</header>
<?php 
$sql = "SELECT * FROM users";
$result = $db->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<h2>".$row["username"]." ".$row["user_type"]." ".$password."</h2>"."<br>";
    } 
}else{
        echo "0 results";
    }
$db->close();
?>
</body>
</html>