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
  <title>Go Python Go | Admin Exercise</title>
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
    }
    .main{
      padding: 10vh 10vw;
    }
  </style>
  
  <body>
    <?php include "part/bar.php" ?>
    
    <div class="main w3-bar">
      <a href="adminmain.php">Home(Admin Main Page)</a> / Exercise Page
      <h1>Exercise Page (Administration)</h1>
      <center>
        <table class="w3-table-all w3-hoverable w3-col l8 s12 w3-card">
          <thead>
            <tr class="w3-light-grey">
              <th style="width:10%">No.</th>
              <th style="width:30%">Chapter</th>
              <th style="width:40%">No. of Question</th>
              <th style="width:20%">Task</th>
            </tr>
          </thead>
            <?php
              $no = 1;
              $q1 = mysqli_query($con,"SELECT * FROM chapter");
              while($row1 = mysqli_fetch_array($q1)){
                echo "<tr>";
                echo "<td>" . $no . ".</td>";
                $chp_id = $row1['chp_id'];
                echo "<td><b>" . $row1['chp_name'] . "</b></td>";
                $q2 = mysqli_query($con,"SELECT * FROM exercise_chapter WHERE chp_id = '$chp_id'");
                echo "<td>";
                echo mysqli_num_rows($q2);
                echo "</td>";
                echo "<td><a href='adminexercisesetting.php?chp_id=".$chp_id."'><button>Setting</button></a></td>";
                echo "</tr>";
                $no++;
              }
            ?>
        </table>
      </center>  
    </div>
    
    <?php include "part/footer.php" ?>
  </body>
</html>
<?php
    }
?>