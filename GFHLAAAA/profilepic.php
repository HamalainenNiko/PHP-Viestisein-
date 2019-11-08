<?php 
include('functions.php');
if(!isLoggedIn()){
$_SESSION['msg'] = "Login";
header('location: login.php');
}
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
    <link rel="stylesheet" href="adsf.css">
</head>
<body>
    
</body>
</html>