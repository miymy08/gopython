<?php
  include "../dbcon.php";
  $chp_id = $_GET['chp_id'];
  $q = mysqli_query($con,"DELETE FROM chapter WHERE chp_id = '$chp_id';");
  if($q){
    echo "<SCRIPT LANGUAGE='Javascript'>
    confirm('Succesfully Delete')
    window.location.href='../adminchaptermain.php?chp_id=".$chp_id."'
    </SCRIPT>";
  }