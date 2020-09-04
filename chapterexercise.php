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
  <title>Go Python Go | User Exercise</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link href="https://fonts.googleapis.com/css?family=Fira+Mono" rel="stylesheet">
  <!--python interpret library-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script> 
  <script src="http://www.skulpt.org/static/skulpt.min.js" type="text/javascript"></script> 
  <script src="http://www.skulpt.org/static/skulpt-stdlib.js" type="text/javascript"></script>
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
      padding: 4vh 10vw;
    }
    #quiz input {
      vertical-align: middle;
    }

    #quiz ol {
       margin: 0 0 10px 20px;
    }

    #quiz ol li {
       margin: 0 0 20px 0;
    }

    #quiz ol li div {
       padding: 4px 0;
    }

    #quiz h3 {
       font-size: 17px; margin: 0 0 1px 0; color: #666;
    }

    #results {
        font: 44px Georgia, Serif;
    }
    .profile_user_top{
      position:relative;
      height:200px;
      z-index: 1;
    }
    .profile_user_top .profile_user_layout{
      position:absolute;
      background:linear-gradient(0deg, rgb(255, 255, 255) 0%, rgba(255, 255, 255, 0.14) 50%, rgba(255, 255, 255, 0) 80%);
      width:100%;
      height:100%;
      top:0;
    }
    .profile_user_top .profile_user_bg{
      height:100%;
      width:100%;
    }
    .profile_pic_base{
      position:absolute;
      margin-top:-150px;
      z-index:2;
      width: 100%;
      padding: 20px;
      overflow: auto;
    }
    .profile_pic_base .profile_pic{
      float:left;
      margin-right:5px;
    }
    ul .acc:hover{
      cursor: pointer;
    }
  </style>
  
  <body>
    <?php
    $chp_id = $_GET['chp_id'];
    $id = $_SESSION['id'];
    
      //import navigation bar
      include "part/bar.php";
      $q1 = mysqli_query($con, "SELECT * FROM chapter WHERE chp_id = '$chp_id'");
      $row1 = mysqli_fetch_array($q1);
    ?>
    
    <div class="main w3-bar">
      Home / Chapter / Chapter Choose (<?php echo $row1['chp_name']?>) / Exercise
      <br>
      <h1><strong>Exercise - <?php echo $row1['chp_name']?></strong></h1>
      <div class="w3-row">
        <div class="w3-col l9 s12">
          <form entype="multipart/form-data" method="post" id="grade" name="grade">
            <ol>
              <?php
                $no = 1;
                $q_quiz = mysqli_query($con, "SELECT * FROM exercise_chapter WHERE chp_id = '$chp_id'");
                $num_row_quiz = mysqli_num_rows($q_quiz);
                while ($row_quiz = mysqli_fetch_array($q_quiz)){
              ?>
              <li>
                <h3><?php echo $row_quiz['exchp_question'] ?></h3>

                <div>
                    <input type="radio" name="question<?php echo $no ?>" required value="A" />
                    <label for="question<?php echo $no ?>A">A. <?php echo $row_quiz['exchp_opt1'] ?></label>
                </div>

                <div>
                    <input type="radio" name="question<?php echo $no ?>" required value="B" />
                    <label for="question<?php echo $no ?>B">B. <?php echo $row_quiz['exchp_opt2'] ?></label>
                </div>

                <div>
                    <input type="radio" name="question<?php echo $no ?>" required value="C" />
                    <label for="question<?php echo $no ?>C">C. <?php echo $row_quiz['exchp_opt3'] ?></label>
                </div>

                <div>
                    <input type="radio" name="question<?php echo $no ?>" required value="D" />
                    <label for="question<?php echo $no ?>D">D. <?php echo $row_quiz['exchp_opt4'] ?></label>
                </div>

              </li>
              <?php
                $no++;
                }
              ?>
            </ol>
            <input type="submit" name="grade" value="Submit Quiz" />
          </form>
          <?php
          
         
          
          ?>
          
          
          
          
          
    
          <?php
          if(isset($_POST['grade'])){
            
            
            
           $totalCorrect = 0;
            $x = 1;
            $answer = array();
            $realanswer = array();
            $q_quiz = mysqli_query($con, "SELECT * FROM exercise_chapter WHERE chp_id = '$chp_id'");
            while ($row_quiz = mysqli_fetch_array($q_quiz) ){
              array_push($answer,$_POST['question'.$x]);
              array_push($realanswer,$row_quiz['exchp_answer']);
              $x++;
            }
            
            $count_array = count($answer);
            for ($i = 0; $i < $count_array; $i++){
              if ($answer[$i] == $realanswer[$i]){
                $totalCorrect++;
              }
            }

        
            
        $mai ="INSERT INTO user_exercise_mark (chp_id, user_id, uem_mark) VALUES ('$chp_id','$id', '$totalCorrect')";
        
        $q_uem = mysqli_query($con, $mai);
            
        if($q_uem){
              echo "<h1>Total marks: " . $totalCorrect . "/" . $count_array . "</h1>";
            }
 
 
 
            
        
          }
          ?>
        </div>
        <div class="pofile_panel w3-col l3 s10 w3-white w3-card" style="position:relative">
          
          <?php
          if (empty($_SESSION['id'])){
          ?>
          <div style="position:absolute;top:0;left:0;width:100%;height:100%;background:#dddddd;z-index:3;display:flex;align-items:center;justify-content:center">
            <div style="margin:0;padding:20px;">
              <center>
                <span>This panel only available if you login in this website by click Sign In button below.</span><br>
                <button>Sign In</button><br>
                <span>What is the feature for this panel?</span>
              </center>  
            </div>
          </div>
          <?php
          }
          $q_user = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$_SESSION[id]'");
          $row_user = mysqli_fetch_array($q_user);
          $q_pp = mysqli_query($con, "SELECT * FROM profile_pic WHERE pp_id = '$row_user[pp_id]'");
          $row_pp = mysqli_fetch_array($q_pp);
          ?>
          <div class="profile_user_top">
            <div class="profile_user_layout"></div>
            <img class="profile_user_bg" src="img/profilebg/<?php echo $row_user['user_bg'] ?>">
          </div>
          <div class="profile_pic_base">
            <img class="profile_pic" src="img/profiledefault/<?php echo $row_pp['pp_name'] ?>">
            <div style="margin:20px 0 0 0;">
              <?php
                $q_pts = mysqli_query($con, "SELECT * FROM user_progress WHERE user_id = '$_SESSION[id]'");
                $num_pts = mysqli_num_rows($q_pts);
                $pts = $num_pts * 50;
                $q_tier = mysqli_query($con, "SELECT * FROM tier_progress");
                while ($row_tier = mysqli_fetch_array($q_tier)){
                  if ($pts <= $row_tier['tp_point']){
                    $tier_name = $row_tier['tp_tier'];
                    $tier_point = $row_tier['tp_point'];
                    $tier_logo = $row_tier['tp_pic'];
                    break;
                  }
                }
              ?>
              <h3 style="margin:0;"><img src="img/tierlogo/<?php echo $tier_logo; ?>" style="width:50px;"><strong><?php echo $tier_name; ?></strong></h3>
              <p style="margin:0;">
                <strong>
                  <?php                    
                    $percent_pts = ($pts / $tier_point) * 100;
                    echo $pts . "/" . $tier_point . " points";
                  ?>
                </strong>
              </p>
              <div style="width:50%;background:#ffde57;float:right;margin-right:18px;">
                <div style="height:5px;width:<?php echo $percent_pts; ?>%;background:#4584b6;"></div>
              </div>
            </div>
          </div>
          <ul class="w3-ul" style="margin-top:-20px;">
            <li><h4><b><?php echo $_SESSION['fullname']?></b> | Beginner</h4></li>
            <li>Statistic<span style="float:right;">▼</span></li>
            <li class="acc" onclick="myFunction('Demo1')">Chapter Progress<span style="float:right;">▼</span></li>
              <div id="Demo1" class="w3-container" style="background:#dddddd;">
              <?php
                $q = mysqli_query($con, "SELECT * FROM chapter");
                while ($row = mysqli_fetch_array($q)){
              ?>
                <p>
                  &nbsp; ► 
                  <?php echo $row['chp_name']?>
                  <span style="float:right">
                    <?php
                      $q_dsc = mysqli_query($con, "SELECT * FROM user_progress WHERE chp_id = '$row[chp_id]' AND user_id = '$_SESSION[id]'");
                      $num_dsc = mysqli_num_rows($q_dsc);
                      $q_sc = mysqli_query($con, "SELECT * FROM sub_chapter WHERE chp_id = '$row[chp_id]'");
                      $num_sc = mysqli_num_rows($q_sc);
                      echo $num_dsc . "/" . $num_sc . "&nbsp;&nbsp;&nbsp;";
                    ?>
                  </span>
                </p>
              <?php
                }
              ?>
            </div>
            <li>Exercise Progress<span style="float:right;">▼</span></li>
            <div id="Demo2" class="w3-container" style="background:#dddddd;">
              <?php
                $q = mysqli_query($con, "SELECT * FROM chapter");
                while ($row = mysqli_fetch_array($q)){
              ?>
                <p>
                  &nbsp; ► 
                  <?php echo $row['chp_name']?>
                  <span style="float:right">
                    <?php
                      $q_uem = mysqli_query($con, "SELECT * FROM user_exercise_mark WHERE chp_id = '$row[chp_id]' AND user_id = '$_SESSION[id]' order by uem_id DESC ");
                      if (empty ($row_uem = mysqli_fetch_array($q_uem))){
                        echo "Not Yet";
                      }else{
                        echo $row_uem['uem_mark'] . "/5&nbsp;&nbsp;&nbsp;";
                      }
                    ?>
                  </span>
                </p>
              <?php
                }
              ?>
            </div>
          </ul>
        </div>
      </div>
    </div>
    
    <?php include "part/footer.php" ?>
  </body>
</html>
<?php
    }
?>

<!--accordian function-->
<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>