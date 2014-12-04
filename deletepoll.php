<?php
  if(session_status() == PHP_SESSION_NONE){
  session_start();
}

$dbh = new PDO('sqlite:users.db');
$delete = $_GET["id"];

$stmt = $dbh->prepare("DELETE FROM Polls WHERE idPoll = '$delete'");
$stmt->execute();

include("mypolls.php");

?>