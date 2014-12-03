<?php
    include('/searchDatabase.php');
    $dbh = new PDO('sqlite:users.db');

    $check=0;
    $user = $_POST['searchU'];
    $word = $_POST['searchW'];

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Found Polls</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="searchPollcss.css">        
    </head>
    
   <body>
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

   if($check == 0){  

        $result = getPergunta($dbh);

        foreach ($result as $temp) {
           $var = $temp['question']; 
            if ($booleano = stripos($var, $word)) { ?>
            <div id="poll_item">
            <h2><?=$temp['question']?><h2>

            <?php
            $answ = getRespostas($dbh, $temp['idPoll']); ?>

            <img src=<?php echo $temp['image'] ?> height="250" width="250">  


          <form>
            <div class="selectresp">
           
        <?php foreach ($answ as $resp) { ?>

                <input type="checkbox" id="answer" value="on"><?=$resp['content']?><br>
                

        <?php } ?>


        </div> 
          </form>                  
         <input type='submit' class='btn btn-success' name='submite_ans' value='Submit'>
                
            
        <?php }
    }
    } ?>
    </body>
</html>
         