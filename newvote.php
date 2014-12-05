<?php
	if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
	include('/searchDatabase.php');
	$dbh = new PDO('sqlite:users.db');	
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$username = $_SESSION['username'];
	$answerid = $_POST['answer1'];
	

	$idU = getIDuser($dbh, $username);

	foreach ($idU as $temp) {
		$idUser = $temp['id'];
	}

	$stmt = $dbh->prepare('INSERT INTO AnswerUser (idAnswer,idUser) VALUES (?,?)');
	$stmt->execute(array($answerid,$idUser));

	

?>