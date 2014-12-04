<?php

    function getPergunta($db) {

        $stmt = $db->prepare("SELECT question, idPoll, image, private, idUser FROM Polls;");

        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getRespostas($db, $pollid) {

        $stmt = $db->prepare("SELECT content, idPoll, idAnswer FROM Answers WHERE Answers.idPoll = '$pollid';");
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

    function getIDuser($db, $username) {

        $stmt = $db->prepare("SELECT id From users WHERE users.username= '$username';");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getUsername($db, $idPoll) {

        $stmt = $db->prepare("SELECT username From users WHERE users.idpoll= '$idPoll';");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getUsernome($db, $idUser) {

        $stmt = $db->prepare("SELECT username From users WHERE users.id= '$idUser';");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result; 
    }


?>