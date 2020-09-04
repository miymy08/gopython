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

  <title>Go Python Go | Admin Home</title>

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

      padding: 19vh 10vw;

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

      Home(Admin Main Page)

      <h1>What you want to do today, admin?</h1>

      <center>

      <div class="w3-row">

        <a href="adminchaptermain.php">

          <div class="lesson_btn w3-col l2 s5 w3-card">

            <h2 class="lesson_btn_title">Chapter</h2>

            <div class="lesson_btn_layout"></div>

            <img class="lesson_btn_bg" src="img/btnbg.png">

          </div>

        </a>

        <a href="adminexercisemain.php">

          <div class="lesson_btn w3-col l2 s5 w3-card">

            <h2 class="lesson_btn_title">Exercise</h2>

            <div class="lesson_btn_layout"></div>

            <img class="lesson_btn_bg" src="img/btnbg.png">

          </div>

        </a>

        <a href="adminusermain.php">

          <div class="lesson_btn w3-col l2 s5 w3-card">

            <h2 class="lesson_btn_title">User</h2>

            <div class="lesson_btn_layout"></div>

            <img class="lesson_btn_bg" src="img/btnbg.png">

          </div>

        </a>

      </div>

      </center>  

    </div>

    

    <?php include "part/footer.php" ?>

  </body>

</html>

<?php

    }

?>