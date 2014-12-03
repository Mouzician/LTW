<?php
  if(session_status() == PHP_SESSION_NONE){
  session_start();
}
  $dbh = new PDO('sqlite:users.db');

  $username = $_SESSION['username'];
  $password = $_POST['cpassword'];
  $npassword = $_POST['npassword1'];
  $vpassword = $_POST['npassword2'];
  $fpassword = sha1($vpassword);

  $check = 0;
  $stmt = $dbh->prepare('SELECT username, password FROM users WHERE username = ? AND password = ?');
  $stmt->execute(array($username, sha1($password)));

  //$stmt2 = $dbh->prepare('UPDATE users SET password = '$fpassword' WHERE username = '$username'');
  $stmt2 = $dbh->prepare("UPDATE users SET password = ? WHERE username = ?");

  while ($row = $stmt->fetch()) {
    if (in_array($username, $row)) {
      if (sha1($password) === $row['password']) {
        if($npassword === $vpassword){
              $check = 1;
              $stmt2->execute(array($fpassword, $username));
              session_destroy();
              include("signin.html");
        }
        else {
          echo '<script language="javascript">';
          echo 'alert("New password is not equal, Try Again pls")';
          echo '</script>';

          include("EditPW.php");
        }  
      }
      else {
        echo '<script language="javascript">';
        echo 'alert("Wrong Current Password, Try Again pls")';
        echo '</script>';

        include("EditPw.php");
      }
      
    }
  } 

 /* if($check == 0) {
    echo '<script language="javascript">';
    echo 'alert("Wrong input of values, Try Again pls")';
    echo '</script>';
    include("signin.html");
  }*/
?>