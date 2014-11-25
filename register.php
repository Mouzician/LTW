<?php

	$dbh = new PDO('sqlite:users.db');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$check = 0;
	$stmt1 = $dbh->prepare('SELECT username FROM users WHERE username = ?');
	$stmt1->execute(array($username));
	$result = $stmt1->fetchAll();

	foreach ($result as $row) {
		//echo ($row['username']);
 		if (in_array($username, $row)) {
 			$check = 1;
 			echo "That username already exists <br>
 				  Please, choose other";
 			break;
 		}	

 		if (in_array($email, $row['email'])) {
 			$check = 1;
 			echo "That email has already been taken <br>
 				  Please, choose another one";
 			break;
 		}
 			
	}

	if($check == 0) {

		$id1 = $dbh->prepare("SELECT count(*) FROM users");
		$id1->execute();
		$stmt2 = $dbh->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
		$stmt2->execute(array($username, $password, $email));

		printf ("YAY, Welcome to the Big Dick Club %s!", $username);
	}
?>