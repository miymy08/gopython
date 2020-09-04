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
  <title>W3.CSS Template</title>
  
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
      Home(Admin Main Page) / Exercise Page / Exercise Setting Page
      <?php
        $chp_id = $_GET['chp_id'];
        $q1 = mysqli_query($con, "SELECT * FROM chapter WHERE chp_id = '$chp_id'");
        $row1 = mysqli_fetch_array($q1);
      ?>
      <h1>Exercise Setting Page - <?php echo $row1['chp_name'] ?> (Administration)</h1>
      <div class="w3-col l8 s12">
        <form action="" method="post">
          <div class="w3-row">
            <div class="w3-half w3-panel">
              <textarea type="text" class="w3-input w3-border w3-section" name="question" rows="4" placeholder="Question" required></textarea>
              <select class="w3-input w3-border w3-section" name="answer" required>
                <option value="" disabled selected>Choose the answer</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div>
            <div class="w3-half w3-panel">
              <input type="text" class="w3-input w3-border w3-section" name="opt_a" placeholder="Option A" required>
              <input type="text" class="w3-input w3-border w3-section" name="opt_b" placeholder="Option B" required>
              <input type="text" class="w3-input w3-border w3-section" name="opt_c" placeholder="Option C" required>
              <input type="text" class="w3-input w3-border w3-section" name="opt_d" placeholder="Option D" required>
            </div>
          </div>
          <button class="w3-block w3-card w3-section" type="submit" name="add_question">Add Question</button>
        </form>
      </div>
      <center>
        <table class="w3-table-all w3-hoverable w3-col l8 s12 w3-card">
          <thead>
            <tr class="w3-light-grey">
              <th style="width:10%">No.</th>
              <th style="width:30%">Question</th>
              <th style="width:10%">Option A</th>
              <th style="width:10%">Option B</th>
              <th style="width:10%">Option C</th>
              <th style="width:10%">Option D</th>
              <th style="width:10%">Answer</th>
              <th style="width:10%">Delete</th>
            </tr>
          </thead>
            <?php
              $no = 1;
              $q1 = mysqli_query($con,"SELECT * FROM exercise_chapter WHERE chp_id = '$chp_id'");
              while($row1 = mysqli_fetch_array($q1)){
              
              ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row1['exchp_question'] ?></td>
                <td><?php echo $row1['exchp_opt1'] ?></td>
                <td><?php echo $row1['exchp_opt2'] ?></td>
                <td><?php echo $row1['exchp_opt3'] ?></td>
           	    <td><?php echo $row1['exchp_opt4'] ?></td>
                <td><?php echo $row1['exchp_answer'] ?></td>
                <td><a href="process/deletequestion.php?exchp_id=<?php echo 
                  $row1['exchp_id'] ?> &chp_id=<?php echo $chp_id ?>"></a>
                
                
                <a onclick="return confirm('Do you really want to delete this exercise?');" 
                   
                href="process/deletesubchaptersetting.php?subchp_id=<?php echo $row1['subchp_id']?> &chp_id=<?php echo $chp_id ?>">
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
if(isset($_POST['add_question'])){
      $question = $_POST['question'];
      $answer = $_POST['answer'];
      $opt_a = $_POST['opt_a'];
      $opt_b = $_POST['opt_b'];
      $opt_c = $_POST['opt_c'];
      $opt_d = $_POST['opt_d'];
      $add_question = mysqli_query($con,"INSERT INTO exercise_chapter (exchp_question, exchp_answer, exchp_opt1, exchp_opt2, exchp_opt3, exchp_opt4, chp_id) VALUES ('$question', '$answer', '$opt_a', '$opt_b', '$opt_c', '$opt_d', '$chp_id')");
      if($add_question){
?>

<script>
  alert('Successfully Add New Question!');
  window.location.href='adminexercisesetting.php?chp_id=<?php echo $chp_id; ?>';
</script>

<?php
      }else{
        echo mysqli_error($con);
      }
    }
?>