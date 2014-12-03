<?php
  include('/searchDatabase.php');
  $dbh = new PDO('sqlite:users.db');

  if(session_status() == PHP_SESSION_NONE){
  session_start();
}
  $username = $_SESSION['username'];

?>

<!DOCTYPE HTML> 
<html>
<head> 
  <title>Change Password</title> 
  <link rel="stylesheet" type="text/css" href="EditPwcss.css"> 
  <link rel="shortcut icon" href="images/signup.jpg">
</head>
<body>
<!-- New password form -->
<div id="new-password-form-container" class="hide login-form-border-2">
  <span class="login-title-message">Change Password</span>
<div id="login-form" method="POST">
  <p>Current Password:  <input type="password" name="cpassword" id="password" placeholder="current password" class="form-input"/> </p>
  <p></p>
  <p>New Password:  <input type="password" name="npassword1" id="npassword1" placeholder="new password" class="form-input"/></p>
  <p></p>
  <p>Confirm New Password:  <input type="password" name="npassword2" id="npassword2" placeholder="confirm new password" class="form-input"/></p>

  <div class="login-controls">
    <button type="submit">Change Password</button> 
  </div>
</div>
</div>

 <?php 

     $result = getPassword($dbh, $username);
     foreach ($result as $temp) {
      $pw = $temp['password'];
      $pass = sha1($pw);
      $pw = sha1($_POST['cpassword']);
       if($pass == $pw){ 
        echo $pass;
      }
     }  
?>

</body>
</html>