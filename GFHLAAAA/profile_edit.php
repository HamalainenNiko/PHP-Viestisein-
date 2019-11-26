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
    <script src="script3.js"></script>

    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="adsf.css">

         
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="index.php" id="left">G.F.H.L.A.A.A.A</a></li>
              <li><a href="profile.php" id="right">Profile</a></li>
              </nav>
    </section>    
</header>

    <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <form action="profile_edit.php" class="card" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src='images/<?php echo $_SESSION['user']['profile_image'] ?>' onClick="triggerClick()" id="profileDisplay" width=95%>
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label><br><br>
          </div>
          <div class="form-group">
            <label>Username</label><br>
            <input type="text" name="username" class="form-control" style="text-align:center" placeholder=<?php echo $_SESSION['user']['username']; ?>>
          </div>
          <br>
          <div class="form-group">
            <label>Bio</label><br>
            <textarea name="bio" cols="25" rows="5" style="text-align:center" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
          </div>
        </form>
        <?php var_dump($_SESSION);?>
      </div>
    </div>
  </div>
</body>
</html>
