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
  <title>Go Python Go | Admin Chapter</title>
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
      <a href="adminmain.php">Home(Admin Main Page)</a> / Chapter Page
      <h1>Chapter Page (Administration)</h1>
      <div class="w3-col l8 s12">
        <form action="" method="post">
          <input class="w3-input w3-border" name="chapter" placeholder="Insert new chapter">
          <button class="w3-block w3-card w3-section" type="submit" name="add_chapter">Add Chapter</button>
        </form>
      </div>
      <center>
        <table class="w3-table-all w3-hoverable w3-col l8 s12 w3-card">
          <thead>
            <tr class="w3-light-grey">
              <th style="width:10%">No.</th>
              <th style="width:30%">Chapter</th>
              <th style="width:40%">Sub-Chapter</th>
              <th style="width:20%">Task</th>
            </tr>
          </thead>
            <?php
              $no = 1;
              $q1 = mysqli_query($con,"SELECT * FROM chapter");
              while($row1 = mysqli_fetch_array($q1)){
            ?>
            
                <tr>
                <td><?php echo $no ?></td>
                
                <?php $chp_id = $row1['chp_id']; ?>
               <td><b><?php echo $row1['chp_name'] ?></b></td>
                <?php
                $q2 = mysqli_query($con,"SELECT * FROM sub_chapter WHERE chp_id = '$chp_id'");
                ?>
                    
                <td class='w3-small'>
                <?php
                  
                while($row2 = mysqli_fetch_array($q2)){
                  echo $row2['subchp_name'] ?><br>
                <?php } ?>
                </td>
                <td><a href="adminsubchaptermain.php?chp_id=<?php echo $chp_id ?>"><button>Setting</button></a>
                
                
                <a onclick="return confirm('Do you really want to delete this chapter?');"
                   
                href="process/deletechapter.php?chp_id=<?php echo $row1['chp_id'] ?>">
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
if(isset($_POST['add_chapter'])){
      $chapter = $_POST['chapter'];
      $add_chapter = mysqli_query($con,"INSERT INTO chapter (chp_name) VALUES ('$chapter')");
      if($add_chapter){
?>

<script>
  alert('Successfully Add New Chapter!');
  window.location.href='adminchaptermain.php';
</script>

<?php
      }else{
        echo "Fail";
      }
    }
?>