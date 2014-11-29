<?php

	$dbh = new PDO('sqlite:users.db');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$check = 0;
	$stmt1 = $dbh->prepare('SELECT `username`, `email` FROM users WHERE username = ? or email = ?');
	$stmt1->execute(array($username, $email));
	$result = $stmt1->fetchAll();

	foreach ($result as $row) {
		//echo ($row['username']);
 		if (in_array($username, $row)) {
 			$check = 1;
 			
			echo '<script language="javascript">';
			echo 'alert("That username already exists. Please, choose other")';
			echo '</script>';

 			include ("newuser.html");
			
 			break;
 		}	

 		if (in_array($email, $row)) {
 			$check = 1;

 			echo '<script language="javascript">';
			echo 'alert("That email has already been taken. Please, choose another one")';
			echo '</script>';
			
			include ("newuser.html");
 			break;
 		}
 			
	}

	if($check == 0) {

		$id1 = $dbh->prepare("SELECT count(*) FROM users");
		$id1->execute();
		$stmt2 = $dbh->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
		$stmt2->execute(array($username, sha1($password), $email));

		//printf ("Welcome to Polls R Us!", $username);
		include("signin.html");
	}

