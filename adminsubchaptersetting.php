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
  <title>Go Python Go | Admin Add Subchapter</title>
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
      <a href="adminmain.php">Home(Admin Main Page)</a> / <a href="adminchaptermain.php">Chapter Page</a> / <a href="adminsubchaptermain.php">Sub-Chapter Page</a> / Sub-Chapter Page
      <?php
        $subchp_id = $_GET['subchp_id'];
        $q1 = mysqli_query($con, "SELECT * FROM sub_chapter WHERE subchp_id = '$subchp_id'");
        $row1 = mysqli_fetch_array($q1);
      ?>
      <h1>Sub-Chapter Setting Page - <?php echo $row1['subchp_name'] ?> (Administration)</h1>
      <div class="w3-col l8 s12">
        <form action="" method="post">
          <div class="w3-row">
            <div class="w3-half w3-panel">
              <textarea class="w3-input w3-border" name="info" rows="10" placeholder="Information about subtopic"></textarea>
            </div>
            <div class="w3-half w3-panel">
              <textarea class="w3-input w3-border" name="code" rows="10" placeholder="Python code"></textarea>
            </div>
          </div>
          <button class="w3-block w3-card w3-section" type="submit" name="add_code">Add Chapter</button>
        </form>
      </div>
      <center>
        <table class="w3-table-all w3-hoverable w3-col l8 s12 w3-card">
          <thead>
            <tr class="w3-light-grey">
              <th style="width:10%">No.</th>
              <th style="width:40%">Information</th>
              <th style="width:40%">Python Code</th>
              <th style="width:10%">Task</th>
            </tr>
          </thead>
            <?php
              $no = 1;
              $q1 = mysqli_query($con,"SELECT * FROM code WHERE subchp_id = '$subchp_id'");
              while($row1 = mysqli_fetch_array($q1)){
                $code=$row1['code'];
                $content = preg_replace("/\r\n|\r/", "<br />", $code);
                $content = trim($content);
                ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row1['code_info'] ?></td>
                <td><?php echo $content ?></td>
               <td>
                <!--   <a href="admininfoedit.php?subchp_id=<?php /*echo $subchp_id */?>"><button>Setting</button></a>-->
                <a onclick="return confirm('Do you really want to delete this account?' );"
                   
                href="process/deletesubchaptersetting.php?
                code_id=<?php echo $row1['code_id']?>&subchp_id=<?php echo $row1['subchp_id']?>">
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
if(isset($_POST['add_code'])){
      $info = $_POST['info'];
      $code = $_POST['code'];
      $add_code = mysqli_query($con,"INSERT INTO code (code_info, code, subchp_id) VALUES ('$info', '$code', '$subchp_id')");
      if($add_code){
?>

<script>
  alert('Successfully Add New Code!');
  window.location.href='adminsubchaptersetting.php?subchp_id=<?php echo $subchp_id; ?>';
</script>

<?php
      }else{
        echo mysqli_error($con);
      }
    }
?>