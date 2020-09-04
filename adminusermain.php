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
  <title>Go Python Go | Admin User Lists</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="loginbtn.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
      padding: 13vh 10vw;
    }
  </style>
  
  <body>
    <?php include "part/bar.php" ?>
    
    <div class="main w3-bar">
      <a href="adminmain.php">Home(Admin Main Page)</a> / User Page
      <h1>User Page (Administration)</h1>
      <center>
        <table class="w3-table-all w3-hoverable w3-col l8 s12 w3-card">
          <thead>
            <tr class="w3-light-grey">
              <th style="width:10%">No.</th>
              <th style="width:30%">Profile Picture</th>
              <th style="width:40%">Fullname</th>
              <th style="width:20%">Task</th>
            </tr>
          </thead>
            <?php
              $no = 1;
              $q1 = mysqli_query($con,"SELECT * FROM user");
              while($row1 = mysqli_fetch_array($q1)){
                echo "<tr>";
                echo "<td>" . $no . ".</td>";
                $q2 = mysqli_query($con, "SELECT * FROM profile_pic WHERE pp_id = '$row1[pp_id]'");
                $row2 = mysqli_fetch_array($q2);
                echo "<td><img src='img/profiledefault/" . $row2['pp_name'] . "' style='width:60px;'></td>";
                echo "<td>";
                echo $row1['user_fullname'];
                echo "</td>";
                echo "<td><a href='adminuserdetail.php?user_id=".$row1['user_id']."'><button>Detail</button></a><a onclick='return confirm(Do you really want to delete this account? );' href='process/deleteuser.php?user_id=".$row1['user_id']."'><button>Delete</button></a></td>";
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
