<?php 

include('functions.php');
if(!isLoggedIn()){
    $_SESSION['msg'] = "Login before editing profile";
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

    <script src='spectrum.js'></script>
<link rel='stylesheet' href='spectrum.css' />          
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="../index.php" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="profile.php" id="right">Profile</a></li>
              </nav>
    </section>    
</header>
    <form class="card" id="update_form" action="profile_edit.php" method="post">
        <img class="pfp" src="img/group2.png" style="width:100%">
        <h6>Upload Profile Pic</h6>
        <input type="file" name="pfp">
        <h3>Info</h3>
            <label class="name">Name:</label>
            <input class="profile-edit" type="text" value="<?php echo $_SESSION['user']['username']?>" name="name" />
<br>
            <label class="info">Description:</label>
            <textarea class="profile-edit" value="<?php echo $_SESSION['user']['info']?>" name="info" cols="35" rows="10" ></textarea>
            <button type="submit" name="update_btn">Save</button>  
        </div> 
    </form>


    <div class="container">
    <div class="row">
        <div class="col-4 offset-md-4 form-div"></div>
        <form action="profile_edit.php" class="card" method="post" enctype="multipart/form-data">
        <h3 class="text-center">Create Profile</h3>
            <div class="form-group">
            <label for="profileImage">Profile Image</label>
            <input type="file" name="profileImage" id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="bio"></label>
            <textarea id = "bio" name = "bio" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <button type="submit" name="save-user" class="btn btn-primary btn-block">Save User</button>
            </div>
        </form>
    </div>
</div>


</body>
</html>