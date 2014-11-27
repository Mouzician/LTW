<?php

	$dbh = new PDO('sqlite:users.db');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$check = 0;
	$stmt = $dbh->prepare('SELECT username, password FROM users WHERE username = ? AND password = ?');
	$stmt->execute(array($username, sha1($password)));


	while ($row = $stmt->fetch()) {
 		if (in_array($username, $row)) {
 			if (sha1($password) === $row['password']) {
 				$check = 1;
 				include("menuinicial.html"); //chamar outro ficheiro
    
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