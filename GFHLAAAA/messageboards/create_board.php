<?php 
include('../functions.php');

if(!isLoggedIn()){
    header('location: ../login.php');
    echo 'Login before you can start messaging';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="index.php" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="login.php" id="right">Login</a></li>
              </nav>
    </section>    
</header>
    <form action="create_board.php" id="box" action="post">
    
    <h2>Create board</h2>

    <?php echo display_error(); ?>
    <div class="input-group">
    <label>Board Name</label>
    <input type="text" name="boardname" value="">
    </div>
    
    <div class="input-group">
    <label>Comment</label>
    <textarea type="text" name="comment" rows="8" cols="25" value=""></textarea>
    </div>

    <div class="input-group">
    <button type="submit" class="btn" name="create_board">Submit</button>
    </div>
    </form>
</body>
</html>