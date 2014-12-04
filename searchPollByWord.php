<?php
include('/searchDatabase.php');
$dbh = new PDO('sqlite:users.db');

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
        <form action="newvote.php">

         
          <?php foreach ($answ as $resp) { ?>

          <input type="radio" name="answer" value="answer"><?=$resp['content']?><br><br>                

          <?php } ?>

          <br>
          <input type='submit' class='submitvote' name='vote' value='Vote!'>
          
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
    $var = $temp2['id'];
  }
  
  foreach ($result as $temp) {
    $var2 = $temp['idUser']; 
    if ($var == $var2) { 
     if($temp['private'] == 0){ ?>
     <div id="question">
      <h2><?=$temp['question']?><h2>

        <?php
        $answ = getRespostas($dbh, $temp['idPoll']); ?>

        <img src=<?php echo $temp['image'] ?> height="250" width="250">  


        <div id="voting">
          <form action="newvote.php">
           
            <?php foreach ($answ as $resp) { ?>

            <input type="radio" name="answer" value="answer"><?=$resp['content']?><br><br> 
            

            <?php } ?>


            <br>
            <input type='submit' class='submitvote' name='vote1' value='Vote!'>
          </form>
        </div>
        
        
        <?php }
      }
      
    }

  }?>

</body>
</html> 