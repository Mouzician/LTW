<!DOCTYPE HTML> 
<html>

<head> 
  <title>Change Password</title> 
  <link rel="stylesheet" type="text/css" href="EditPwcss.css"> 
  <link rel="shortcut icon" href="images/signup.jpg">
</head>

<body>
<!-- New password form -->
 <h1> Change Password </h1>

<form method="POST" action="ChangePW.php">

  <p>Current Password:  <input type="password" name="cpassword" placeholder="Enter your current password..."/> </p>

  <p>New Password:  <input type="password" name="npassword1" placeholder="Enter your new password..." /></p>

  <p>Confirm New Password:  <input type="password" name="npassword2" placeholder="Confirm your new password..." /></p>

  <input type="submit" class="submit" value="Submit the request!">

</form>

</body>
</html>