<?php 
    include('functions.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

<?php 
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($db,$id);
    $sql = "SELECT * FROM users WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_array($result)){
        echo '<div  class="card">';
        echo '<img src="img/group2.png" style="width:100%">';
        echo $row['username'];
        echo $row['info'];
        echo '<p>G.F.H.L.A.A.A.A</p>';
        echo '<button></button>';
    }
    ?>
  </div>
</body>
</html>