<?php 
    include('functions.php');
    if(!isLoggedIn()){
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }


    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";
        //Uuden salasanan validointi
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["new_password"]))){
            $new_password_err = "Syötä salasana";
        } elseif(strlen(trim($_POST["new_password"])) < 6){
            $new_password_err = "Salasanan pitää olla ainakin 6 merkkiä pitkä";
        } else {
            $new_password = trim($_POST["new_password"]);
        }
    
        //Salasanan vahvistuksen validointi
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Vahvista salasana";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($new_password_err) && ($new_password != $confirm_password)){
                $confirm_password_err = "Salasanat eivät täsmää";
            }
        }
    
        //Tarkista syöte ennen tietokannan päivitystä
        if(empty($new_password_err) && empty($confirm_password_err)){
            //Valmistele päivitys
            $sql = "UPDATE users SET password = ? WHERE id = ?";
    
            if($stmt = mysqli_prepare($db, $sql)){
                mysqli_stmt_bind_param($stmt, "si", $param_password, $paraim_id);
    
                $param_password = base64_encode($new_password);
                $paraim_id = $_SESSION["id"];
    
                if(mysqli_stmt_execute($stmt)){
                    //salasana on vaihdettu
                    //Poista sessio ja palaa kirjautumissivulle
                    session_destroy();
                    header("location: login.php");
                    exit();
                } else {
                    echo "Virhe on tapahtunut. Yritä myöhemmin uudelleen.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($db);
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="script2.js"></script>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="index.php" id="left">G.F.H.L.A.A.A.A</a></li>
      <?php  if (isset($_SESSION['user'])) : ?>
      <li><a href="profile.php">Profile</a></li>
      </nav>
      <div class="profile_info">
		<a href="profile.php"> <img src="img/group2.png"></a>
				<strong>
          <?php echo $_SESSION['user']['username']; ?>
        </strong>
				<small>
					<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					<br>
					<a href="index.php?logout='1'" style="color: red;">logout</a>
				</small>
				<?php endif ?>
			</div>
    </section>    
</header>

<div class="wrapper">
        <h2>Nollaa salasana</h2>
        <p>Täytä tiedot vaihtaaksesi salasanasi.</p>
        <form action="reset-password.php" method="post">
            <div class="form-group <?php echo
            (!empty($new_password_err)) ? 'has-error' : ' '; ?>">
                <label>Uusi salasana</label>
                <input type="password" name="new_password" 
            class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group <?php echo
        (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Vahvista salasana</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class = "btn btn-link" href="welcome.php">Peruuta</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>