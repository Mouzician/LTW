<?php

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
	$username = $_SESSION['username'];
	$question = $_POST['Question'];
	$options = $_POST['options'];
	$image = $_POST['image'];

	$new_url = get_tiny_url($image);



	$stmt = $dbh->prepare('SELECT id FROM users WHERE username = ?');
	$stmt->execute(array($username));
	$row = $stmt->fetch();


	$stmt = $dbh->prepare('INSERT INTO Polls (id,Question,Image) VALUES (?, ?, ?)');
	$stmt->execute(array($row['id'], $question,$new_url));



	$stmt = $dbh->prepare('SELECT idPoll FROM Polls  WHERE Question = ?');
	$stmt->execute(array($question));
	$row = $stmt->fetch();

foreach ($option as $temp) {
    $stmt = $dbh->prepare('INSERT INTO Answer (idPoll,content) VALUES (?, ?)');
	$stmt->execute(array($row['idPoll'], $temp));

exit();
?>