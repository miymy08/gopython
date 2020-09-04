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
  <title>Go Python Go | User Subchapter</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link href="https://fonts.googleapis.com/css?family=Fira+Mono" rel="stylesheet">
  <!--python interpret library-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script> 
  <script src="http://www.skulpt.org/js/skulpt.min.js" type="text/javascript"></script> 
  <script src="http://www.skulpt.org/js/skulpt-stdlib.js" type="text/javascript"></script> 
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
    .code_output_header{
      background: #4584b6;
      color: white;
      text-align: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .code_output{
      background-color: black;
      color: #63de00;
      padding: 10px;
      outline: none;
      resize: none;
      font-family: 'Fira Mono';
      border-bottom: 3px solid #4584b6;
      border-left: 3px solid #4584b6;
      border-right: 3px solid #4584b6;
    }
    .code_input_header{
      background: #ffde57;
      color: black;
      text-align: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .code_input{
      outline: none;
      resize: none;
      font-family: 'Fira Mono';
      border-bottom: 3px solid #ffde57;
      border-left: 3px solid #ffde57;
      border-right: 3px solid #ffde57;
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
      //import navigation bar
      include "part/bar.php";
      $q1 = mysqli_query($con, "SELECT * FROM chapter WHERE chp_id = '$_GET[id]'");
      $row1 = mysqli_fetch_array($q1);
    ?>
    
    <div class="main w3-bar">
      Home / Chapter / Chapter Choose (<?php echo $row1['chp_name']?>)
      <br>
      <h1><strong><?php echo $row1['chp_name']?></strong></h1>
      <div class="w3-row">
        <div class="w3-col l9 s12">
          <?php
            $q2 = mysqli_query($con, "SELECT * FROM sub_chapter WHERE chp_id = '$_GET[id]'");
            while($row2 = mysqli_fetch_array($q2)){
          ?>

          <h3>
            <strong>
              <?php 
                echo $row2['subchp_name']
              ?>
            </strong> &nbsp;
            <?php
              if (!empty($_SESSION['username'])){
                $q_p = mysqli_query($con, "SELECT * FROM user_progress WHERE user_id = '$_SESSION[id]' AND subchp_id = '$row2[subchp_id]'");
                if ($row_p = mysqli_fetch_array($q_p)){
                  echo "Done";
                }else{
            ?>
            <form method="post" action="process/progress.php?subchp=<?php echo $row2['subchp_id'] ?>&chp=<?php echo $row1['chp_id']?>">
              <button type="submit" name="check">I Got it!</button>
            </form>
            <?php
                }
              }
            ?>
          </h3>

          <?php
              $q3 = mysqli_query($con, "SELECT * FROM code WHERE subchp_id = '$row2[subchp_id]'");
              while ($row3 = mysqli_fetch_array($q3)){
          ?>

          <!--python intepret function-->
            <script type="text/javascript">
            function outf<?php echo $row3['code_id']?>(text) { 
                var mypre = document.getElementById("output<?php echo $row3['code_id']?>"); 
                mypre.innerHTML = mypre.innerHTML + text; 
            } 
            function builtinRead<?php echo $row3['code_id']?>(x) {
                if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
                        throw "File not found: '" + x + "'";
                return Sk.builtinFiles["files"][x];
            }

            function runit<?php echo $row3['code_id']?>() { 
               var prog = document.getElementById("code<?php echo $row3['code_id']?>").value; 
               var mypre = document.getElementById("output<?php echo $row3['code_id']?>"); 
               mypre.innerHTML = ''; 
               Sk.pre = "output<?php echo $row3['code_id']?>";
               Sk.configure({output:outf<?php echo $row3['code_id']?>, read:builtinRead<?php echo $row3['code_id']?>}); 
               var myPromise = Sk.misceval.asyncToPromise(function() {
                   return Sk.importMainWithBody("<stdin>", false, prog, true);
               });
            } 
          </script> 

            <p><?php echo $row3['code_info'] ?></p>
            <?php
                if (!empty($row3['code'])){
            ?>

            <div class="w3-row" style="width:90%;">
              <div class="w3-half w3-right w3-container">
                <div class="w3-block code_output_header w3-card" >Python Shell</div>
                <textarea class="code_output w3-card" rows="6" id="output<?php echo $row3['code_id'] ?>" style="width:100%;" placeholder="If this message still appear after click the Run button, check back and make sure the code format are correct." disabled></textarea>
              </div>
              <form>
                <div class="w3-half w3-container">
                  <div class="w3-block code_input_header w3-card" >Python Text Editor</div>
                  <textarea class="w3-card code_input" id="code<?php echo $row3['code_id']?>" onkeydown="insertTab(this, event)" rows="8" style="width:100%;"><?php echo $row3['code'] ?></textarea>
                </div>

                <div class="w3-container">
                  <button type="button" onclick="runit<?php echo $row3['code_id']?>()">Run</button>
                </div>
              </form>
            </div>
          <?php
                }else{
                  echo "<br>";
                }
              }
              echo "";
              echo "<br><br>";
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
                      $q_uem = mysqli_query($con, "SELECT * FROM user_exercise_mark WHERE chp_id = '$row[chp_id]' AND user_id = '$_SESSION[id]'");
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
      <form method="post" action="">
        <button type="submit" name="startexercise" class="w3-button w3-border w3-round-large w3-block" style="background:#4584b6;color:white;">Do an exercise.</button>
      </form>
      <?php
      if(isset($_POST['startexercise'])){
        $q_overallprogress = mysqli_query($con, "SELECT * FROM sub_chapter WHERE chp_id = '$_GET[id]'");
        $overallprogress = mysqli_num_rows($q_overallprogress);
        $q_checkprogress = mysqli_query($con, "SELECT * FROM user_progress WHERE user_id = '$_SESSION[id]' AND chp_id = '$_GET[id]'");
        $checkprogress = mysqli_num_rows($q_checkprogress);
        if($checkprogress == $overallprogress){
        ?>
        <script>
          window.location.href='chapterexercise.php?chp_id=<?php echo $_GET['id']?>';
        </script>
        <?php
        }else{
          echo $checkprogress;
        ?>
        <script>
          alert('You still need to learn. If done so, click the I Got it button to proceed to exercise.');
          window.location.href='#';
        </script>
        <?php
        }
      }
      ?>
    </div>
    
    <?php include "part/footer.php" ?>
  </body>
</html>
<?php
    }
?>

<!--tab function-->
<script type="text/javascript">
  function insertTab(o, e)
  {		
      var kC = e.keyCode ? e.keyCode : e.charCode ? e.charCode : e.which;
      if (kC == 9 && !e.shiftKey && !e.ctrlKey && !e.altKey)
      {
          var oS = o.scrollTop;
          if (o.setSelectionRange)
          {
              var sS = o.selectionStart;	
              var sE = o.selectionEnd;
              o.value = o.value.substring(0, sS) + "\t" + o.value.substr(sE);
              o.setSelectionRange(sS + 1, sS + 1);
              o.focus();
          }
          else if (o.createTextRange)
          {
              document.selection.createRange().text = "\t";
              e.returnValue = false;
          }
          o.scrollTop = oS;
          if (e.preventDefault)
          {
              e.preventDefault();
          }
          return false;
      }
      return true;
  }
</script>

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