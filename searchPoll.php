<?php

	$dbh = new PDO('sqlite:users.db');
    /*
    function getSearchResults($db) {
        
        if( isset($_GET["order_by"]) && "" != $_GET["order_by"]) 
        {
            $orderBy=$_GET['order_by'];
        }
        
        else 
        {
            $orderBy = 'des';
        }
        
        if( isset($_GET["search_this"]) && "" != $_GET["search_this"]) 
        {
            $search=$_GET['search_this'];
        
            if  ($orderBy == 'asc') 
            {
                $stmt = $db->prepare("SELECT asking, img, poll.id FROM question, poll WHERE question.poll_id = poll.id AND asking LIKE '%$search%' ORDER BY poll.id ASC;");
            }
                
            else 
            {
                $stmt = $db->prepare("SELECT asking, img, poll.id FROM question, poll WHERE question.poll_id = poll.id AND asking LIKE '%$search%' ORDER BY poll.id DESC;");
            }
        }
        
        else 
        {   
            if  ($orderBy == 'asc') 
            {
                $stmt = $db->prepare("SELECT asking, img, poll.id FROM question, poll WHERE question.poll_id = poll.id ORDER BY poll.id ASC;");
            }
                
            else 
            {
                $stmt = $db->prepare("SELECT asking, img, poll.id FROM question, poll WHERE question.poll_id = poll.id ORDER BY poll.id DESC;");
            }
        }
        
        $stmt->execute();  
        $result = $stmt->fetchAll();
        return $result; 
    }
    
    function getUserPolls($db, $user_id) {
        $stmt = $db->prepare("SELECT asking, img, poll.id FROM question, poll, user WHERE user.id = '$user_id' AND poll.user_id = user.id AND question.poll_id = poll.id ORDER BY poll.id DESC;");
        
        $stmt->execute();  
        $result = $stmt->fetchAll();
        return $result;
    }
    
    function getAnsweredPolls($db, $user_id) {
        $stmt = $db->prepare("SELECT asking, img, poll.id FROM question, poll, user_question 
                            WHERE user_question.user_id = '$user_id' AND user_question.question_id = question.id
                            AND question.poll_id = poll.id
                            ORDER BY poll.id DESC;");
        
        $stmt->execute();  
        $result = $stmt->fetchAll();
        return $result;
    }
    
    function getPollByID($db, $pollID) {
        $stmt = $db->prepare("SELECT asking, img FROM question, poll WHERE question.poll_id = poll.id AND poll.id = '$pollID';");

        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }
    
    function getAnswersToPolls($db, $pollID) {
        
        $stmt = $db->prepare("SELECT answer.id, response 
                            FROM question, poll, answer WHERE question.poll_id = poll.id AND poll.id = '$pollID' AND answer.question_id = question.id");

        $stmt->execute();  
        $result = $stmt->fetchAll();

        return $result; 
    }
*/
    $id = $_POST['id'];

    	$stmt = $dbh->prepare("SELECT (*) FROM Polls WHERE poll.idPoll = '$id';");

        $stmt->execute();  
        $result = $stmt->fetchAll();

        printf ("ID's!", $result);

        //include("signin.html");