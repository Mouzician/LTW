<?php
  if(session_status() == PHP_SESSION_NONE){
  session_start();
  }
  include('/searchDatabase.php');
  require_once('jpgraph-3.5.0b1/src/jpgraph.php');
  //require_once('jpgraph-3.5.0b1/src/jpgraph_pie.php');
  require_once ('jpgraph-3.5.0b1/src/jpgraph_bar.php');
 
  $dbh = new PDO('sqlite:users.db');  
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $idpoll = $_GET['id'];
  $a = array();
  $a1 = array();
  $a2 = array();
 
  //respostas da poll respoectiva
  $answers = getAnswersFromPoll($dbh, $idpoll);
  $question = getPerguntas($dbh, $idpoll);
 
  foreach ($question as $temp2) {
     $questao = $temp2['question'];
  }
  //id das respostas
  foreach ($answers as $temp) {
      $idanswer  = $temp['idAnswer'];
    
     
        $content = getContent($dbh, $idanswer);
      $contentS = (string)$content['content'];
     
      array_push($a, [$content, $count]);
      array_push($a1, $contentS);
      array_push($a2, (int)$count);
      array_push($a, $count);  


     
     }  
      print_r ($a2);
      //print_r ($questao);
     //$graph->SetTheme(new $theme_class());
// Set A title for the plot
 
// Create
 
// Create the graph. These two calls are always required
/*$graph = new Graph(350,220,'auto');
$graph->title->Set("Results for Poll with the question: ".$questao);
$graph->title->SetColor('black');
$graph->SetScale("textlin");
 
//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());
 
// set major and minor tick positions manually
$graph->SetBox(false);
 
//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($a1);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
 
// Create the bar plots
$b1plot = new BarPlot($a2);
 
// ...and add it to the graPH
$graph->Add($b1plot);
 
 
$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
//$graph->title->Set("Poll Results");
 
// Display the graph
$graph->Stroke();*/
// Some data
$datay=array(7,19,11,4,20);
 
// Create the graph and setup the basic parameters
$graph = new Graph(300,200,'auto');    
$graph->img->SetMargin(40,30,40,50);
$graph->SetScale("textint");
$graph->SetFrame(true,'blue',1);
$graph->SetColor('lightblue');
$graph->SetMarginColor('lightblue');
 
// Setup X-axis labels
$a = $a1;
$graph->xaxis->SetTickLabels($a1);
$graph->xaxis->SetFont(FF_FONT1);
$graph->xaxis->SetColor('darkblue','black');
 
// Setup "hidden" y-axis by given it the same color
// as the background (this could also be done by setting the weight
// to zero)
$graph->yaxis->SetColor('lightblue','darkblue');
$graph->ygrid->SetColor('white');
 
// Setup graph title ands fonts
$graph->title->Set('Data results');
$graph->title->SetFont(FF_FONT2,FS_BOLD);
$graph->xaxis->SetTitle('asdasd');
$graph->xaxis->SetTitleMargin(10);
$graph->xaxis->title->SetFont(FF_FONT2,FS_BOLD);
 
// Add some grace to the top so that the scale doesn't
// end exactly at the max value.
$graph->yaxis->scale->SetGrace(0);
 
                             
// Create a bar pot
$bplot = new BarPlot($a2);
$bplot->SetFillColor('darkblue');
$bplot->SetColor('darkblue');
$bplot->SetWidth(0.5);
$bplot->SetShadow('darkgray');
 
// Setup the values that are displayed on top of each bar
// Must use TTF fonts if we want text at an arbitrary angle
$bplot->value->Show();
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$bplot->value->SetFormat('$%d');
$bplot->value->SetColor('darkred');
$bplot->value->SetAngle(45);
$graph->Add($bplot);
 
// Finally stroke the graph
$graph->Stroke();


?>