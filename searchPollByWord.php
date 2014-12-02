<?php
    include('/searchDatabase.php');
    $dbh = new PDO('sqlite:users.db');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List all Polls</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">        
    </head>
    
   <body>
        
        <?php 
        $result = getPergunta($dbh);

        foreach ($result as $temp) {
            echo $temp['question']; 
            $var = $temp['question']; 
            $answ = getRespostas($dbh, $temp['idPoll']);
            echo $temp['image'];  
         foreach ($answ as $resp) {
             echo $resp['content'];
         }
            
        }


       //print_r($result);
       //print_r($answ);
       ?>
                
    </body>
</html>
         