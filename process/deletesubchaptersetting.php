<?php
  include "../dbcon.php";
  $code_id = $_GET['code_id'];
  $subchp_id = $_GET['subchp_id'];
  
  $q = mysqli_query($con,"DELETE FROM code WHERE code_id = '$code_id';");
  if($q){
    echo "<SCRIPT LANGUAGE='Javascript'>
    confirm('Succesfully Delete')
    window.location.href='../adminsubchaptersetting.php?subchp_id=".$subchp_id."'
    </SCRIPT>";
  }