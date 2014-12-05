<?php

    function getPergunta($db) {

        $stmt = $db->prepare("SELECT question, idPoll, image, private, idUser FROM Polls;");

        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getPerguntas($db, $idpoll) {

         $stmt = $db->prepare("SELECT question FROM Polls WHERE Polls.idpoll = '$idpoll';");

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

    function getidanswer($db, $idAnswer) {

        $stmt = $db->prepare("SELECT content, idPoll, idAnswer FROM Answers WHERE Answers.idAnswer = '$idAnswer';");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getPollID($db, $idAnswer){

        $stmt = $db->prepare("SELECT idPoll FROM Answers WHERE Answers.idAnswer = '$idAnswer';");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getVote($db, $iduser) {

        $stmt = $db->prepare("SELECT idAnswer, idUser FROM AnswerUser WHERE AnswerUser.idUser = '$iduser';");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }

    function getAnswersFromPoll($db, $idPoll){

        $stmt = $db->prepare("SELECT idAnswer FROM Answers WHERE Answers.idPoll = '$idPoll';");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 

    }


    function votesbyAnswer($db, $idAnswer){

        $stmt = $db->prepare("SELECT COUNT(idAnswer) as var FROM AnswerUser WHERE AnswerUser.idAnswer = '$idAnswer';");
        $stmt->execute();  
        $result = $stmt->fetch();

        return $result; 

    }

    function getContent($db, $idAnswer){

        $stmt = $db->prepare("SELECT content FROM Answers WHERE Answers.idAnswer = '$idAnswer';");
        $stmt->execute();  
        $result = $stmt->fetch();

        return $result; 

    }

   /* function answeruser($db, $iduser){

        $stmt = $db->prepare("SELECT idAnswer FROM AnswerUser WHERE AnswerUser.idUser = '$iduser';");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }*/

?>