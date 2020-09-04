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
  <title>Go Python Go | Admin Subchapter</title>
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
      padding: 4vh 10vw;
    }
  </style>
  
  <body>
    <?php include "part/bar.php" ?>
    
    <div class="main w3-bar">
      <a href="adminmain.php">Home(Admin Main Page)</a> / <a href="adminchaptermain.php">Chapter Page</a> / Sub-Chapter Page
      <?php
        $chp_id = $_GET['chp_id'];
        $q1 = mysqli_query($con, "SELECT * FROM chapter WHERE chp_id = '$chp_id'");
        $row1 = mysqli_fetch_array($q1);
      ?>
      <h1>Add Sub-Chapter Page - <?php echo $row1['chp_name'] ?> (Administration)</h1>
      <div class="w3-col l8 s12">
        <form action="" method="post">
          <input class="w3-input w3-border" name="subchapter" placeholder="Insert new sub-chapter">
          <button class="w3-block w3-card w3-section" type="submit" name="add_subchapter">Add Sub-Chapter</button>
        </form>
      </div>
      <center>
        <table class="w3-table-all w3-hoverable w3-col l8 s12 w3-card">
          <thead>
            <tr class="w3-light-grey">
              <th style="width:10%">No.</th>
              <th style="width:40%">Sub-Chapter</th>
              <th style="width:20%">Task</th>
            </tr>
          </thead>
            <?php
              $no = 1;
              $q1 = mysqli_query($con,"SELECT * FROM sub_chapter WHERE chp_id = '$chp_id'");
              while($row1 = mysqli_fetch_array($q1)){
              ?>
               <tr>
                <td><?php echo $no ?></td>
                <td><b><?php echo $row1['subchp_name'] ?></b></td>
                <td><a href="adminsubchaptersetting.php?subchp_id= <?php echo $row1['subchp_id'] ?>"><button>Setting</button></a>
                
                <a onclick="return confirm('Do you really want to delete this subchapter? ');" 
                   
                href="process/deletesubchapter.php?subchp_id=<?php echo $row1['subchp_id']?> &chp_id=<?php echo $chp_id ?>">
                <button>Delete</button></a></td>
                </tr>
            <?php    
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
    if(isset($_POST['add_subchapter'])){
      $subchapter = $_POST['subchapter'];
      $add_subchapter = mysqli_query($con,"INSERT INTO sub_chapter (subchp_name, chp_id) VALUES ('$subchapter', '$chp_id')");
      if($add_subchapter){
?>

<script>
  alert('Successfully Add New Sub-Chapter!');
  window.location.href='adminsubchaptermain.php?chp_id=<?php echo $chp_id; ?>';
</script>

<?php
      }else{
        echo "Fail";
      }
    }
?>