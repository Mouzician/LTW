<?php

	$dbh = new PDO('sqlite:users.db');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

		$id1 = $dbh->prepare("SELECT count(*) FROM users");
		$id1->execute();
		$stmt2 = $dbh->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
		$stmt2->execute(array($username, sha1($password), $email));

		printf ("Welcome Poll R Us!", $username);
		include("signin.html");
	}

