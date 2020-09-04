<?php
  include "../dbcon.php";
  $subchp_id = $_GET['subchp_id'];
  $chp_id = $_GET['chp_id'];
  $q = mysqli_query($con,"DELETE FROM sub_chapter WHERE subchp_id = '$subchp_id';");
  if($q){
    echo "<SCRIPT LANGUAGE='Javascript'>
    confirm('Succesfully Delete')
    window.location.href='../adminsubchaptermain.php?chp_id=".$chp_id."'
    </SCRIPT>";
  }