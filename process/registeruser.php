<?php
  include("../dbcon.php");
  ob_start();
  session_start();
  if(isset($_POST['submit'])){ 
    if($_POST['password1']==$_POST['password2']){ 
      $reg_username = $_POST['username'];
      $reg_fullname = $_POST['fullname'];
      $reg_pic = $_POST['profile_pic'];
      $reg_password = $_POST['password1'];
      $register = mysqli_query($con,"INSERT INTO user (user_fullname, user_usrname, user_passw, pp_id, user_bg) VALUES ('$reg_fullname', '$reg_username', '$reg_password', '$reg_pic', 'defaultuserbg1.jpg')") or die(mysqli_error($con)); 
      if($register){ 
?>

<script>
  alert('Successfully Register!');
  window.location.href='../login.php';
</script>

<?php		
	}else { 
?>

<script>
  alert('Problem in query.');
  window.location.href='../login.php';
</script>

<?php
	} 
  }else {
?>

<script>
  alert('Password are not same.');
  window.location.href='../login.php';
</script>

<?php
  }
}else{
  echo "Error";
}    
?>