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
            $answ = getRespostas($dbh, $temp['idPoll']); ?>

            <img src=<?php echo $temp['image'] ?> alt="Smiley face" height="100" width="100">  
        <?php foreach ($answ as $resp) { ?>
            <br>
            <?php
             echo $resp['content']; ?>
             <br>
             <?php
         }
            
        }


       //print_r($result);
       //print_r($answ);
       ?>
                
    </body>
</html>
         