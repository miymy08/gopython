<?php
  include "dbcon.php";
  session_start();
  if (empty($_SESSION['username']))
	{
	  header("Location:index.php");
	}
	else
    {
?>
<!DOCTYPE html>
<html>
  <title>Go Python Go | User Chapter</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="loginbtn.css">
  <style>

    h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    body {
      background:-webkit-radial-gradient(circle farthest-corner at center center, rgb(255, 255, 255) 0%, rgb(175, 175, 175) 80%);
      background:-o-radial-gradient(circle farthest-corner at center center, rgb(255, 255, 255) 0%, rgb(175, 175, 175) 80%);
      background:-moz-radial-gradient(circle farthest-corner at center center, rgb(255, 255, 255) 0%, rgb(175, 175, 175) 80%);
      background:radial-gradient(circle farthest-corner at center center, rgb(255, 255, 255) 0%, rgb(175, 175, 175) 80%);
/*
      background-image: url('img/pgbg.jpg');
      background-size: 20%;
*/
    }
    .main{
      padding: 5vh 10vw;
    }
    .lesson_btn{
      border-radius:10px;
      position: relative;
      color: white;
      height: 200px;
      margin: 10px 10px;
      overflow: hidden;
    }
    .lesson_btn .lesson_btn_title{
      position: relative;
      z-index: 3;
    }
    .lesson_btn .lesson_btn_layout{
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background:radial-gradient(circle farthest-corner at bottom right, rgba(255, 255, 255, 0) 0%, rgba(0, 125, 227, 0.63) 80%);
      z-index: 1;
      box-shadow: 10px 10px 5px grey;
    }
    .lesson_btn .lesson_btn_bg{
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      z-index: 0;
    }
  </style>
  
  <body>
    <?php include "part/bar.php" ?>
    
    <div class="main w3-bar">
      Home / Chapter
      <br>
      <h1>Choose Chapter</h1>
      <center>
        <div class="w3-row">
          <?php
            $q = mysqli_query($con, "SELECT * FROM chapter");
            while($row = mysqli_fetch_array($q)){
          ?>
          <a href="chapterchoose.php?id=<?php echo $row['chp_id'] ?>">
            <div class="lesson_btn w3-col l2 s5 w3-card">
              <h2 class="lesson_btn_title"><?php echo $row['chp_name'] ?></h2>
              <div class="lesson_btn_layout"></div>
              <img class="lesson_btn_bg" src="img/btnbg.png">
            </div>
          </a>
          <?php
            }
          ?>
        </div>
      </center>  
    </div>
    
    <?php include "part/footer.php" ?>
  </body>
</html>
<?php
    }
?>