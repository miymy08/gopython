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
  <title>Go Python Go | User Home</title>
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
      padding: 17vh 10vw;
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
      Home
      <div class="w3-row">
        <div class="w3-half">
          <h1>Go Python Go</h1>
          <h4>Welcome to the <strong>Go Python Go</strong>, an interactive Python tutorial. Whether you are an experienced programmer or not, this website is intended for everyone who wishes to learn the Python programming language.<br><br>This website included <strong>An Interactive Quiz</strong> where you can test your level of understanding by chapter or wholesome of a Python programming language.</h4>
          <br>
          <a href=chapter.php>
          <button class="w3-button w3-border w3-blue">Lets Start!</button></a>
        </div>
        <img src="img/pythonmain.png" style="float:right";>
      </div>
    </div>
    <?php include "part/footer.php" ?>
  </body>
</html>
<?php
    }
?>