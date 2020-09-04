<?php
  ob_start();
  session_start();
  if(isset($_POST['submit'])){ 
    include("../dbcon.php");
    if(!empty($_POST['username'])){
      if($_POST['username']=="admin" && $_POST[password]=="123456789"){
        $_SESSION['id'] =  "admin";
        $_SESSION['username'] =  "Administration";
        $_SESSION['fullname'] =  "Admin";
?>

<script>
  alert('Successfully login as admin');
  window.location.href='../adminmain.php';
</script>

<?php
      }
      $query = mysqli_query($con,"SELECT * FROM user WHERE user_usrname = '$_POST[username]' AND user_passw = '$_POST[password]'") or die(mysqli_error($con)); 
      $row = mysqli_fetch_array($query);
      if($row){ 
        $_SESSION['id'] =  $row['user_id'];
        $_SESSION['username'] =  $row['user_usrname'];
        $_SESSION['fullname'] =  $row['user_fullname'];
?>

<script>
  alert('Successfully login');
  window.location.href='../main.php';
</script>

<?php		
	}else { 
?>

<script>
  alert('Wrong Username or Password had been entered!');
  window.location.href='../login.php';
</script>

<?php
	} 
  }
  echo "error" ;
} 
?>