<!DOCTYPE HTML> 
<html>

<head> 
  <title>Change Password</title> 
  <link rel="stylesheet" type="text/css" href="EditPwcss.css"> 
  <link rel="shortcut icon" href="images/signup.jpg">
</head>

<body>

<ul id="navigation">
    <li class="left"><a href="menuinicial.php">Back</a></li><br>
</ul>

<div class="box">

<h1> Change Password </h1>

<form method="POST" action="ChangePW.php">

  <p>Current Password: <br><br><input type="password" name="cpassword" placeholder="Enter your current password..."/> </p>

  <p>New Password:<br><br> <input type="password" name="npassword1" placeholder="Enter your new password..." /></p>

  <p>Confirm New Password:<br><br> <input type="password" name="npassword2" placeholder="Confirm your new password..." /></p>

  <input type="submit" class="submit" value="Submit the request!">

</form>
</div>

</body>
</html>