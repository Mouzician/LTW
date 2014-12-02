<?php 
    session_start();
?>

<?php

    function getPergunta($db) {

        $stmt = $db->prepare("SELECT question, idPoll, image FROM Polls;");

        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getRespostas($db, $pollid) {

        $stmt = $db->prepare("SELECT content FROM Answers WHERE Answers.idPoll = '$pollid';");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

?>