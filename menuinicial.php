<?php
  if(session_status() == PHP_SESSION_NONE){
  session_start();
}
  $username = $_SESSION['username'];
?>

<!DOCTYPE HTML> 
<html>
<head> 
  <title>MenuInicial</title> 
  <link rel="stylesheet" type="text/css" href="menuinicialcss.css"> 
  <link rel="shortcut icon" href="images/signup.jpg">
</head>
<body>

<!--<span id="user"> Hi, <?php echo("$username"); ?></span>-->

  <div id="fb-root">
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
    </script>
</div>
  <div class="toolBar">
    <div class="toolWrap">
      <form class='form' method="POST" action="searchPollByWord.php">
        <div id="logo"></div>
        <nav>
            <ul>
                <li><a href="createpoll.html">Create a Poll</a></li>

                <li><a href="">Search a Poll</a>

                    <ul>
                        <li>
                          <div id="SearchU">
                          <input type='text' name='searchU' placeholder='Search by User'>
                          <input type="submit" class="submit" value="Search Polls!">
                        </div>
                        </li>
                        <li>
                          <div id="SearchW">
                          <input type='text' name='searchW' placeholder='Search by User'>
                          <input type="submit" class="submit" value="Search Polls!">
                        </div>
                        </li>
                    </ul>
                </li>
                <li><a href="listPolls.php">List all Polls</a>
                </li>
                 <li><a href="EditPW.php">Change Password</a>
                </li>
                <li><a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="aboutus">
      <h1> About Us </h1> <br>
      <p> Faculdade de Engenharia da Universidade do Porto </p> <br>
      <p> Projecto de Ltw 2014/2015 </p> <br>
      <p> Turma 3</p> <br>
      <p> Desenvolvido por: </p> <br>
      <p> Andre Regado </p> <br>
      <p> Francisco Couto </p> <br>
      <p> Mario Ferreira </p>
    </div>
    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
</div>
 
</body>
</html>