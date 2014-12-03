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
        <link rel="stylesheet" type="text/css" href="style.css">        
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
    }

       //print_r($result);
       //print_r($answ);
       ?>

?>
    </body>
</html>
         