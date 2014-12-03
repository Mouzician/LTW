<?php

    function getPergunta($db) {

        $stmt = $db->prepare("SELECT question, idPoll, image, private FROM Polls;");

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

    function getPassword($db, $username) {

        $stmt = $db->prepare("SELECT username, password From users WHERE users.username= '$username';");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result; 
    }

?>