 <?php
	include "dbcon.php";
	error_reporting(0);
	session_start();
	if (!empty($_SESSION[username]))
	{
	  header("Location:main.php");
	}
	else
    {
?> 
<!DOCTYPE html>
<html>
  <title>Go Python Go | Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="loginbtn.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <style>
    h1 {font-family: "Raleway", sans-serif}
    body, html {height: 0%}
    body {
      background-image: url('img/loginbackground.jpg');
      background-size: 100%;
    }
    .start {  
      background-color: white;
      color: black;
      padding: 30px 30px 30px;
      border-radius: 20px;
      box-shadow: 13px 10px 5px grey;
    }
  </style>
  
  <body>
  <?php include "part/bar.php" ?>
    <div class="w3-row">
      <div class="start w3-center w3-card w3-col l4 m6 s11 w3-display-middle">
        <a href="main.php"><img src="img/logo.png" style="width:150px;"></a>
        <h1>GO PYTHON GO</h1>
        
        <div class='f-sign-in-button' onclick="document.getElementById('id01').style.display='block'" >
          <div class=content-wrapper>
            <div class='logo-wrapper'>  
              <img src='img/gu-logo.png'>
            </div>  
            <span class='text-container'> 
              <span>Sign In</span>
            </span>
          </div>  
        </div><br>
        <div class='gu-sign-in-button' onclick="document.getElementById('id02').style.display='block'">
          <div class=content-wrapper>
            <div class='logo-wrapper'>  
              <img src='img/register.png'>
            </div>  
            <span class='text-container'> 
              <span>Register Now</span>
            </span>
          </div>  
        </div>
      </div>
    </div>
    <div id="id01" class="w3-modal login_modal">
      <div class="w3-modal-content w3-card-4 w3-center w3-round-large" style="width:40%;">
        <div class="w3-container w3-padding" style="margin-top:20vh;">
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h4 class="modal-title">Member Login</h4>
          <form method="post" action="process/loginuser.php">
		    <div class="w3-section">
		      <input class="w3-input w3-border" type="text" name="username" placeholder="Username" required="required">		
			</div>
			<div class="w3-section">
		      <input class="w3-input w3-border" type="password" name="password" placeholder="Password" required="required">	
			</div>        
			<div>
		      <button type="submit" name="submit">Login</button>
			</div>
		  </form>
        </div>
      </div>
    </div>
    
    <div id="id02" class="w3-modal register_modal">
      <div class="w3-modal-content w3-card-4 w3-center w3-round-large" style="width:40%;">
        <div class="w3-container w3-padding" style="margin-top:10vh;">
          <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h4 class="modal-title">Register New Member</h4>
          <form method="post" action="process/registeruser.php">
            <div class="w3-row">
              <div class="w3-half w3-panel">
                <div class="w3-section">
                  <input class="w3-input w3-border" type="text" name="username" placeholder="Username" required="required">
                  <span class="w3-tiny w3-left w3-margin-bottom">Username that you must type when to login.</span>
                </div>
                
                <div class="w3-section">
                  <input class="w3-input w3-border" type="text" name="fullname" placeholder="Fullname" required="required">
                  <span class="w3-tiny w3-left w3-margin-bottom">Fullname used mostly in the website.</span>
                </div>
                
                <div class="w3-section">
                  <select class="w3-input w3-border" name="profile_pic" onchange="$('#imageToSwap').attr('src', this.options[this.selectedIndex].id);" required>
                    <option selected disabled>Select your avatar</option>
                    <?php
                      $q_pp = mysqli_query($con, "SELECT * FROM profile_pic");
                      while($row_pp = mysqli_fetch_array($q_pp)){
                    ?>
                      <option value="<?php echo $row_pp['pp_id']; ?>" id="img/profiledefault/<?php echo $row_pp['pp_name']; ?>"><?php echo $row_pp['pp_name']; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                  <span class="w3-tiny w3-left w3-margin-bottom">What is your monster?</span>
                </div><br>
                <img id="imageToSwap" class="profile" src="img/profiledefault/pic1.png" style="width:60%;">
              </div>
              <div class="w3-half w3-panel">
                <div class="w3-section">
                  <input class="w3-input w3-border" type="text" name="password1" placeholder="Password" required="required">
                  <span class="w3-tiny w3-left w3-margin-bottom">Dont worry, we will also not know your password.</span>
                </div>
                <div class="w3-section">
                  <input class="w3-input w3-border" type="text" name="password2" placeholder="Re-type Password" required="required">
                  <span class="w3-tiny w3-left w3-margin-bottom">Just to check whether you remember your password.</span>
                </div>
              </div>
            </div>       
			<div>
		      <button type="submit" name="submit">Register</button>
			</div>
		  </form>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>

<?php
    }
?>

<!--login modal-->
<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>


<!--register modal-->
<script>
  // Get the modal
  var modal = document.getElementById('id02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>