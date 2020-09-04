<?php
  include "../dbcon.php";
  $user_id = $_GET['user_id'];
  $q = mysqli_query($con,"DELETE FROM user WHERE user_id = '$user_id';");
  if($q){
    echo "<SCRIPT LANGUAGE='Javascript'>
    confirm('Succesfully Delete Account')
    window.location.href='../adminusermain.php'
    </SCRIPT>";
  }