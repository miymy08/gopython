<div class="w3-bar w3-black" style="padding:0 50px 0 50px;">
  <?php
  if(empty($_SESSION)){
  ?>
   <img src="img/python21.png" style="width:133px;height:45px;" class="w3-bar-item w3-mobile">
  <a href="index.php" class="w3-bar-item w3-button w3-mobile">GO PYTHON GO</a>
  <a href="aboutus.php" class="w3-bar-item w3-button w3-mobile">About Us</a>
  <?php
  }else if($_SESSION['id']=="admin"){
  ?>
  
  <img src="img/python21.png" style="width:133px;height:45px;" class="w3-bar-item w3-mobile">
  <a href="adminmain.php" class="w3-bar-item w3-button w3-mobile">GO PYTHON GO</a>
  <a class="w3-bar-item w3-mobile">|</a>
  <a href="adminchaptermain.php" class="w3-bar-item w3-button w3-mobile">Chapter (Admin)</a>
  <a href="adminexercisemain.php" class="w3-bar-item w3-button w3-mobile">Exercise (Admin)</a>
  <a href="adminusermain.php" class="w3-bar-item w3-button w3-mobile">User (Admin)</a>
  <?php
  }else{
  ?>
  <img src="img/python21.png" style="width:133px;height:45px;" class="w3-bar-item w3-mobile">
  <a href="main.php" class="w3-bar-item w3-button w3-mobile">GO PYTHON GO</a>
  <a class="w3-bar-item">|</a>
  <a href="chapter.php" class="w3-bar-item w3-button w3-mobile">Chapter</a>
  
  <?php
  }
  if (!empty($_SESSION['id'])){
  ?>
  <a href="process/logout.php" class="w3-bar-item w3-button w3-right w3-mobile">Log Out</a>
  <a class="w3-bar-item w3-right w3-mobile">Welcome back, <?php echo $_SESSION['fullname'];?></a>
  <?php
  }else{
  ?>
  <a href="login.php" class="w3-bar-item w3-button w3-right w3-mobile">Sign In</a>
  <?php
  }
  ?>
</div>