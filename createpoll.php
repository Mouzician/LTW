<?php

	$dbh = new PDO('sqlite:users.db');	
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$username = $_SESSION['usernameOn'];
	$quest = $_POST['Question'];
	$option = $_POST['myInputs'];
	$image = $_POST['queryImage'];

	$new_url = get_tiny_url($image);



	$stmt = $dbh->prepare('SELECT idUser FROM User WHERE username = ?');
	$stmt->execute(array($username));
	$row = $stmt->fetch();


	$stmt = $dbh->prepare('INSERT INTO UserQuery (idUser,Question,Image) VALUES (?, ?, ?)');
	$stmt->execute(array($row['idUser'], $quest,$new_url));



	$stmt = $dbh->prepare('SELECT idUserQuery FROM UserQuery  WHERE Question = ?');
	$stmt->execute(array($quest));
	$row = $stmt->fetch();

foreach ($option as $temp) {
    $stmt = $dbh->prepare('INSERT INTO Answer (idPoll,Content) VALUES (?, ?)');
	$stmt->execute(array($row['idPoll'], $temp));

header( 'Location: ../html/createPoll.php' );
exit();
?>