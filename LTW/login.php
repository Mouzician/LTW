<?php

	$dbh = new PDO('sqlite:users.db');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$check = 0;
	$stmt = $dbh->prepare('SELECT username, password FROM users WHERE username = ? AND password = ?');
	$stmt->execute(array($username, $password));


	while ($row = $stmt->fetch()) {
 		if (in_array($username, $row)) {
 			if ($password === $row['password']) {
 				$check = 1;
 				include("newuser.html"); //chamar outro ficheiro
    
 				break;
 			}
 			//else echo("asd");
 		}
 		//echo("asd");
	}	
	if($check == 0) {
		echo '<script language="javascript">';
		echo 'alert("Wrong username or password, Try Again pls")';
		echo '</script>';
		include("signin.html");
	}
?>