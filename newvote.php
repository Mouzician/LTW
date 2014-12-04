<?php
	if(session_status() == PHP_SESSION_NONE){
	session_start();
}
	$username = $_SESSION['username'];

	$dbh = new PDO('sqlite:users.db');	
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	//$poll = $_POST['poll'];
	$answer = $_GET['answer'];

	$stmt1 = $dbh->prepare('SELECT id FROM users WHERE username = ?');
	$stmt1->execute(array($username));
	$idU = $stmt1->fetch();

	$stmt1 = $dbh->prepare('SELECT idAnswerUser FROM AnswerUser WHERE idAnswer = ? AND idUser = ?');
	$stmt1->execute(array($answer, $idU));
	$result = $stmt1->fetchAll();

	$check = count($result);
	if($check != 0){

		echo '<script language="javascript">';
		echo 'alert("You already voted in this poll")';
		echo '</script>';

 		include ("newVote.html");
		
 		break;
	}

		

		$stmt = $dbh->prepare('INSERT INTO AnswerUser (idAnswer,idUser) VALUES (?,?)');
		$stmt->execute(array($Answer,$idU);

		echo 'Saved to database';

	include("menuinicial.php");
	exit();

}
?>