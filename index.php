<!DOCTYPE html>
<html>
  <title>Go Python Go | Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="loginbtn.css">
  <style>
    h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    body {

      background-image: url('img/homepage.jpg');
      background-size: 100%;
      background-repeat: no-repeat;
      
    }
    .main{
      padding: 16vh 10vw;
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
   .row1{
     width: 500px;
     height: auto;
     margin: auto;
     
     
   }
  </style>
    <?php include "part/bar.php" ?>
  <body>
    <div class="main w3-bar w3-center">
      <h2 style="color:White; text-shadow: 2px 2px #000000">Welcome To our Python Learning Website</h2>
      <div class="w3-row">
      <h1 style="color:White; text-shadow: 2px 2px #000000">Go Python Go</h1><br>
        <div class= "row1">
          
          <h4 style="color:White;  text-shadow: 2px 2px #000000">Welcome to the <strong>Go Python Go</strong>, an interactive Python tutorial. This website is intended for everyone who wishes to learn basic of Python.<br><br>
          <br>
        </div>
        <a href=login.php>
          <button class="w3-button w3-border w3-blue">Lets Start!</button></a>
        <!--<img src="img/pythonmain.png" style="float:right";> -->
      </div>
    </div>
    <?php include "part/footer.php" ?>
  </body>
</html>
