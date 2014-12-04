<?php
    include('/searchDatabase.php');
    $dbh = new PDO('sqlite:users.db');

    if(session_status() == PHP_SESSION_NONE){
  session_start();
  }
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>

<html>
    <head>
        <title>List My Polls</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="searchPollcss.css">        
    </head>
    
   <body>

     <ul id="navigation">
             <li class="left"><a href="menuinicial.php">Back</a></li>
        </ul>
        <br></br>

         <?php
        $result = getPergunta($dbh);
        $id = getIDuser($dbh, $username);

        foreach ($result as $temp) {
           $var = $temp['idUser'];
           foreach ($id as $temp2) {
               $var2 = $temp2['id'];

               if($var == $var2) { ?>

               <div id="question">
                <h2><?=$temp['question']?><h2>
                </div>

                    <?php
            $answ = getRespostas($dbh, $temp['idPoll']); ?>

            <img src=<?php echo $temp['image'] ?> height="250" width="250">  

    <div id="voting">
        <form name"form1" id="form1" method="POST">

         
          <?php foreach ($answ as $resp) { ?>
        <br>
          <input type="radio" name="answer" value="<?=$resp['idAnswer']?>"><?=$resp['content']?><br><br>           

          <?php } ?>
          <script>
          function submitform(action) {

              document.getElementById('form1').action=action;
              document.getElementById('form1').submit();
          }
          </script>

          <?php $idpoll = $resp['idPoll']; ?>

          <br>
          <input type='button' class='submitvote' name='vote' value='Vote!' onclick="submitform('newvote.php?answer=>?$resp['idAnswer']?>')">
          <input type='button' class='submitvote' name='delete' value='Delete Poll!' onclick="submitform('deletepoll.php?id=<?=$idpoll?>')">
          
        </form>
      </div>



            <?php   }
           }
          } ?>
    


    </body>
</html> 