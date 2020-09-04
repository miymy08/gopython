<?php
  include "../dbcon.php";
  $exchp_id = $_GET['exchp_id'];
  $chp_id = $_GET['chp_id'];
  $q = mysqli_query($con,"DELETE FROM exercise_chapter WHERE exchp_id = '$exchp_id';");
  if($q){
    echo "<SCRIPT LANGUAGE='Javascript'>
    confirm('Succesfully Delete')
    window.location.href='../adminexercisesetting.php?chp_id=".$chp_id."'
    </SCRIPT>";
  }