<?php
include('/searchDatabase.php');
$dbh = new PDO('sqlite:users.db');

$var11=0;
$check=0;
$check2=0;
$user = $_POST['searchU'];
$word = $_POST['searchW'];

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>

<html>
<head>
  <title>Found Polls</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="searchPollcss.css">  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script language="javascript" type="text/javascript" src="pollsjquery.js"> </script>          
</head>

<body>

 <ul id="navigation">
   <li class="left"><a href="menuinicial.php">Back</a></li>
 </ul>
 <br></br>

 <?php
 if(($user == "") && ($word == "")){

  echo '<script language="javascript">';
  echo 'alert("There was no search parameter!")';
  echo '</script>';
  $check = 1;
  
        //include("menuinicial.php");
  header("Location:menuinicial.php");
  break;

} 

   //distinguir se é procurar por user ou word
if($user == "") { $check2 =1;}

   //procura por word
if($check == 0 && $check2 == 1){  

  $result = getPergunta($dbh);

  foreach ($result as $temp) {
   $var = $temp['question']; 
   if ($booleano = stripos($var, $word)) 
    if($temp['private'] == 0){{ ?>
  <div id="question">
    <h2><?=$temp['question']?><h2>

      <?php
      $answ = getRespostas($dbh, $temp['idPoll']); ?>

      <img src=<?php echo $temp['image'] ?> height="250" width="250">  


      <div id="voting">
          <form name"form1" id="form1" method="POST">

         
          <?php foreach ($answ as $resp) { ?>

         <input type="radio" name="answer" value="<?=$resp['idAnswer']?>"><?=$resp['content']?><br><br>               

          <?php } ?>

         <script>
          function submitform(action) {

              document.getElementById('form1').action=action;
              document.getElementById('form1').submit();
          }
          </script>

          <?php $idpoll = $resp['idPoll'];
            //print_r ("$idpoll");
           ?>


            <br>
            <input type='button' class='submitvote' name='vote' value='Vote!' onclick="test()">
            <input type='button' class='submitvote' name='results' value='Show Results!' onclick="submitform('showresults.php?id=<?=$idpoll?>')">
          </form>
        </div>

      <?php }

    }
  }
  
}

if($check == 0 && $check2 == 0) {

        //id do user a procurar
  $result = getPergunta($dbh);
  $iduser = getIDuser($dbh, $user);
  foreach ($iduser as $temp2) {  
      $var11 = $temp2['id'];
  }
  foreach ($result as $temp) {
    $var2 = $temp['idUser']; 
    if ($var11 == $var2) { 
     if($temp['private'] == 0){ ?>
     <div id="question">
      <h2><?=$temp['question']?><h2>

        <?php
        $answ = getRespostas($dbh, $temp['idPoll']); ?>

        <img src=<?php echo $temp['image'] ?> height="250" width="250">  


        <div id="voting">
            <form name"form1" id="form1" method="POST">
           
            <?php foreach ($answ as $resp) { ?>

            <input type="radio" name="answer" value="<?=$resp['idAnswer']?>"><?=$resp['content']?><br><br> 

            <?php
         } ?>
      

          <script>
          function submitform(action) {

              document.getElementById('form1').action=action;
              document.getElementById('form1').submit();
          }
          </script>

          <?php $idpoll = $resp['idPoll'];
            //print_r ("$idpoll");
           ?>


            <br>
            <input type='button' class='submitvote' name='vote' value='Vote!' onclick="test()">
            <input type='button' class='submitvote' name='results' value='Show Results!' onclick="submitform('showresults.php?id=<?=$idpoll?>')">
          </form>
        </div>
        
        
        <?php }
      }
      
    }

  }?>

</body>
</html> 