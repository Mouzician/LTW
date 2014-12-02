<?php
	if(session_status() == PHP_SESSION_NONE){
	session_start();
}
	$username = $_SESSION['username'];

	function get_tiny_url($url)  {  
		$ch = curl_init();  
		$timeout = 5;  
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
		$data = curl_exec($ch);  
		curl_close($ch);  
		return $data;  
	}
 
	$dbh = new PDO('sqlite:users.db');	
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 
	$option = array();
	$question = $_POST['question'];
	$option = $_POST['myInputs'];
	$image = $_POST['image'];

	$new_url = get_tiny_url($image);

	$check = 0;
	$stmt1 = $dbh->prepare('SELECT question FROM Polls WHERE question = ?');
	$stmt1->execute(array($question));
	$result = $stmt1->fetchAll();

	foreach ($result as $row) {
		//echo ($row['username']);
 		if (in_array($question, $row)) {
 			$check = 1;
 			
			echo '<script language="javascript">';
			echo 'alert("A poll with that question already exists. Please, choose another")';
			echo '</script>';

 			include ("createpoll.html");
			
 			break;
 		}	
 	}



if($check == 0) {
	//$stmt = $dbh->prepare('SELECT id FROM users WHERE username = ?');
	//$stmt->execute(array($username));
	//$row = $stmt->fetch();

	$stmt = $dbh->prepare('INSERT INTO Polls (Question,Image) VALUES (?, ?)');
	$stmt->execute(array( $question,$new_url));

	//$ole = $dbh->prepare('SELECT * FROM  Polls WHERE idPoll = (SELECT MAX(idPoll)  FROM Polls)');

	$stmt = $dbh->prepare('SELECT idPoll FROM Polls  WHERE Question = ?');
	$stmt->execute(array($question));
	$row = $stmt->fetch();

foreach ($option as $temp) {
    $stmt = $dbh->prepare('INSERT INTO Answers (idPoll,content) VALUES (?,?)');
	$stmt->execute(array($row['idPoll'],$temp));
}

//session_destroy();
include("menuinicial.php");
exit();

}
?>