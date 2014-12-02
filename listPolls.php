<?php  
  session_start();
  $username = $_SESSION['username'];

  include('/searchDatabase.php');
  $dbh = new PDO('sqlite:users.db');
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>List all Polls</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="listPollscss.css">        
    </head>
    
   <body>


  <!--<span id="user"> Hi, <?php echo("$username"); ?></span>-->
       <ul id="navigation">
             <li class="left"><a href="menuinicial.php">Back</a></li>
        </ul>
        <br></br>
            
        <h1><u>List of all Polls</u></h1>

        <?php 
        $result = getPergunta($dbh);?>

        <ul class="rolldown-list" id="myList">
    
       <?php foreach ($result as $temp) {
         if($temp['private'] == 0){ ?>
            
            <li><a href=""><?php echo $temp['question'] ?></a></li>      

     <?php } 
   }?>

   </ul>
                
    </body>
</html>
         