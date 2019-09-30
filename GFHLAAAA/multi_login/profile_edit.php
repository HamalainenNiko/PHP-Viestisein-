<?php 

include('functions.php');
if(!isLoggedIn()){
    $_SESSION['msg'] = "Login before editing profile";
    header('location: login.php');
}

$sql="SELECT username FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";

$result = mysqli_query($db, $sql);

$row = mysqli_fetch_array($result);

$diary=$row['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="bigcard" action="profile_edit.php" method="post">
        <img class="pfp" src="img/group2.png" style="width:100%">
        <h6>Upload Profile Pic</h6>
        <input type="file">
        <h3>Info</h3>
            <label class="name">Name:</label>
            <input class="form-control" value="" name="name" type="text">
<br>
            <label class="info">Description:</label>
            <input class="form-control" value="" name="info" type="textbox">
            <button type="submit">Save</button>  
        </div> 
    </form>
</body>
</html>