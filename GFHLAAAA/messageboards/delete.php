<?php 
include('../functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style.css">

    <title>Document</title>
</head>
<body>
    <header>
        <section id="link">
            <nav>
                <li><a href="../index.php" id="left">Home</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                <li><a href="../profile.php">Profile</a></li>
            </nav>
            <div class="profile_info">
            <a href="../profile.php"> <img src=<?php echo '../' . $_SESSION['user']['profile_image']; ?>>
            </a>
            <strong>
                    <?php echo $_SESSION['user']['username']; ?>
            </strong>
            <small>
                <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i><br>
                <a href="delete.php?logout='1'" style="color: red;">logout</a>
                </small>
                <?php endif ?>
            </div>
        </section>    
    </header>
    <br>

    <form method="post" id="msgform" action="delete.php">
    <?php 
        $sql = "SELECT * FROM board";
        $results = mysqli_query($db, $sql);
        while($row = $results->fetch_assoc()){
            echo '<div id=messages>';
            echo $row['user'].', <i  style="color: #888;">'.$row['time'].'</i>';
            echo '<button id=' .$row['id'].' type=submit name=deletemsg >X</button> <br />';

            echo ''.$row['message'].'<br />';

            echo '</div>';
            echo '<br />';       
        } ?>
    </form>



</body>
</html>