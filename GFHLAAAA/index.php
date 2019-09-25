<?php 
    include('multi_login/functions.php');

?>

<!DOCTYPE html5>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="multi_login/style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<header>
    <section id="link">   
        <nav>
                <li><a href="#" id="left">G.F.H.L.A.A.A.A</a></li>
<?php if(!isset($_SESSION['user'])) : ?>
<li><a href="multi_login/login.php" id="right">Login</a></li>
<?php endif ?>


      <?php  if (isset($_SESSION['user'])) : ?>
      <li><a href="multi_login/profile.php">Profile</a></li>
      <div class="profile_info">
		<img src="multi_login/img/group2.png">
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
            </nav>
    </section>    
</header>

























       <div class="content">



       <h2>G.F.H.L.A.A.A.A. is an epic gamer group.</h2>
       <p>Group was created on June 11th 2018. Originally it consisted of 7 members. <br>
      As of today, it consists of 13 epic gamers.
    <ul>They are:
        <!--Vinku-->
        <li><button class="button1" href="">Vinku</button>(FI)
          <button class="button1" id="hide1" href="">Hide</button>
          <button class="button1" id="more1" href="">Learn more</button></li>
        <input class="hide" type="text" id="Vinku" value="Vinku"  readonly>
        <!--Vascor-->
        <li><button class="button2" href="">Vascor</button>(FI)
          <button class="button2" id="hide2" href="">Hide</button>
          <button class="button2" id="more2" href="">Learn more</button></li>
          <input class="hide" type="text" id="Vascor" value="Vascor" readonly>
        <!--Peku-->
        <li><button class="button3" href="">Peku</button>(EE)
          <button class="button3" id="hide3" href="">Hide</button>
          <button class="button3" id="more3" href="">Learn more</button></li>
          <input class="hide" type="text" id="Peku" value="Peku" readonly>
        <!--Psycho-->
        <li><button class="button4" href="">Psycho</button>(FI)
          <button class="button4" id="hide4" href="">Hide</button>
          <button class="button4" id="more4" href="">Learn more</button></li>
          <input class="hide" type="text" id="Psycho" value="Psycho" readonly>
        <!--Cubesa-->
        <li><button class="button5" href="">Cubesa</button>(FI)
          <button class="button5" id="hide5" href="">Hide</button>
          <button class="button5" id="more5" href="">Learn more</button></li>
          <input class="hide" type="text" id="Cubesa" value="Cubesa" readonly>
        <!--North-->
        <li><button class="button6" href="">North</button>(FI/SE)
          <button class="button6" id="hide6" href="">Hide</button>
          <button class="button6" id="more6" href="">Learn more</button></li>
          <input class="hide" type="text" id="North" value="North" readonly>
        <!--Blue-->
        <li><button class="button8" href="">Blue</button>(FI)
          <button class="button8" id="hide8" href="">Hide</button>
          <button class="button8" id="more8" href="">Learn more</button></li>
          <input class="hide" type="text" id="Blue" value="Blue" readonly>
        <!--Winter-->
        <li><button class="button9" href="">Winter</button>(SE)
          <button class="button9" id="hide9" href="">Hide</button>
          <button class="button9" id="more9" href="">Learn more</button></li>
          <input class="hide" type="text" id="Winter" value="Winter" readonly>
        <!--Nemo-->
        <li><button class="button10" href="">Nemo</button>(SE)
          <button class="button10" id="hide10" href="">Hide</button>
          <button class="button10" id="more10" href="">Learn more</button></li>
          <input class="hide" type="text" id="Nemo" value="Nemo" readonly>
        <!--Zen-->
        <li><button class="button11" href="">Zen</button>(LT)
          <button class="button11" id="hide11" href="">Hide</button>
          <button class="button11" id="more11" href="">Learn more</button></li>
          <input class="hide" type="text" id="Zen" value="Zen" readonly>
        <!--S'ghetti-->
        <li><button class="button12" href="">S'ghetti</button>(DK)
          <button class="button12" id="hide12" href="">Hide</button>
          <button class="button12" id="more12" href="">Learn more</button></li>
          <input class="hide" type="text" id="Sghetti" value="S'ghetti" readonly>
        <!--Waterholic-->
        <li><button class="button13" href="">Waterholic</button>(RO)
          <button class="button13" id="hide13" href="">Hide</button>
          <button class="button13" id="more13" href="">Learn more</button></li>
          <input class="hide" type="text" id="Waterholic" value="Waterholic" readonly>
        <!--Naiko-->
        <li><button class="button14" href="">Naiko</button>(FI)
          <button class="button14" id="hide14" href="">Hide</button>
          <button class="button14" id="more14" href="">Learn more</button></li>
          <input class="hide" type="text" id="Naiko" value="Naiko" readonly>

      </ul> 
    <ul>Left/kicked out members:
        <!--Phoe-->                          
        <li><button class="button7" href="">Phoe</button>(FI)
          <button class="button7" id="hide7" href="">Hide</button>
          <button class="button7" id="more7" href="">Learn more</button></li>
          <input class="hide" type="text" id="Phoe" value="Phoe" readonly>
    </ul>
  </p>
</div>
<div id="img">
<img src="group2.png">
</div>

</body>
</html>