<?php
  if(session_status() == PHP_SESSION_NONE){
  session_start();
  }
  include('/searchDatabase.php');

  require_once('jpgraph-3.5.0b1/src/jpgraph.php');
  require_once('jpgraph-3.5.0b1/src/jpgraph_pie.php');
  $dbh = new PDO('sqlite:users.db');  
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  $idpoll = $_GET['id'];
  $a = array();
 
  
  //respostas da poll respoectiva
  $answers = getAnswersFromPoll($dbh, $idpoll);
  $question = getPerguntas($dbh, $idpoll);


  
  foreach ($question as $temp2) {
     $questao = $temp2['question'];
  }

  //id das respostas
  foreach ($answers as $temp) {
      $idanswer  = $temp['idAnswer'];
      $count = votesbyAnswer($dbh, $idanswer);
      
        array_push($a, $count['var']);  

     
     }  
      //print_r ($questao);

  $graph = new PieGraph(800, 800);

     //$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->title->Set("Results for Poll with the question: ".$questao);
$graph->title->SetColor('black');

// Create
$p1 = new PiePlot($a);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#FF0000','#0000FF','#FFFF00','#CCEEFF','#BA55D3'));
$graph->Stroke();

     ?>

      

 
