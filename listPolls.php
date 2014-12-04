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
       <div id="navigation">
             <p class="left"><a href="menuinicial.php">Back</a></p>
        </div>
        <br></br>
            
        <h1>List of all Polls</h1>

        <?php 
        $result = getPergunta($dbh);
        $nomeuser;

        ?>
        <table class="flat-table">
        <tbody>
        <tr>
        <th> Questions </th>
        <th> Author </th>
        </tr>
       <?php foreach ($result as $temp) {
         if($temp['private'] == 0){ 
            $nameuser = $temp['idUser'];
            $usernome = getUsernome($dbh, $nameuser);
            foreach ($usernome as $temp2) {
              $nomeuser = $temp2['username'];
            }
            ?>
            <tr>
            <td>
            <?php echo $temp['question'] ?>
            </td>
            <td>
            <?php print_r($nomeuser); ?>
            </td>   
            </tr>  

     <?php } 
   }?>
</tbody>
   </table>
                
    </body>
</html>
         