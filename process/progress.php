<?php
  if(isset($_POST['check'])){ 
    include("../dbcon.php");
    session_start();
    $chp = $_GET['chp'];
    $subchp = $_GET['subchp'];
    $userid = $_SESSION['id'];
    $upload = mysqli_query($con, "INSERT INTO user_progress (chp_id, subchp_id, user_id) VALUES ('$chp', '$subchp', '$userid')");
    if ($upload){
      header("Location:../chapterchoose.php?id=$chp");
    }else{
      echo "Fail2";
    }
  }else{
    echo "Fail";
  }
?>