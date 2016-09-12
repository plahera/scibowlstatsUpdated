
 <?php 
 $submitted = false;
 $wasError=false;
session_start();
//echo $_SESSION["login"];
/**
 if ((!isset($_SESSION))||($_SESSION["login"] !="yes") )
 {
    header('Location: login.php');
 }
$tablename = $_SESSION["username"]."SETTINGS";
*/
?>  

<?php
if($_POST['playGame'] == "Submit") 
    {
      $submitted=true;
      
      $errorMessage="";
        $sub=$_POST["sub"];
    $player=$_POST["player"];
    $interrupt=$_POST["interrupt"];
    $answer=$_POST["answer"];
    $wasError=false;
   // echo $sub; echo $player; echo $interrupt; echo $answer;
    if(empty($sub)) {
      $errorMessage= $errorMessage. " You forgot to pick the subject.\n \n<br>"; 
        $wasError = TRUE;
    }
    if(empty($player)) {
      $errorMessage= $errorMessage. "You forgot to pick the player.\n \n<br>"; 
        $wasError = TRUE;
    }
    if(empty($interrupt)) {
      $errorMessage= $errorMessage. "You forgot to specify the answer status.\n \n<br>"; 
        $wasError = TRUE;
    }
    if(empty($answer)) {
      $errorMessage= $errorMessage. "You forgot to say if the answer was correct or incorrect.\n  \n<br>"; 
        $wasError = TRUE;
    }
    if($wasError==false)
    {
      $db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" ); 
      $correcttable = $_SESSION["username"].$sub;
    //  echo $correcttable;
    //  echo "INSERT INTO `tester`.`$correcttable` (`player`,`answer`, `interrupt`) VALUES ('$player', '$answer', '$interrupt');";
      $db->query("INSERT INTO `tester`.`$correcttable` (`player`,`answer`, `interrupt`) VALUES ('$player', '$answer', '$interrupt');");
    }

    }
    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Catmint
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130910

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SciBowl Stats</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.slidertron-1.3.js"></script>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">SciBowl Stats</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="/"><a href="index.html" title="">Homepage</a></li>
				<li><a href="login.php" title="">Log In</a></li>
				<li><a href="faq.html" title="">FAQ</a></li>
				<li><a href="contact.php"  title="">Contact</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>Round</h2>
				</div>
        <?php $db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" );  ?>
	
  <?php
  if ($submitted==true)
  {
if($wasError==true)
    {
      echo $errorMessage;
     
    }
  else{
    echo "Information succesfully submitted! \n";
  }
}
  ?>
  <br><br>
                         <form method="post" action="game.php" >   
                   
                         Subject: 
                         <?php 
                         $rows = $db->query("SELECT * FROM $tablename");  
                         foreach ($rows as $row){ 
                          if ($row['key']=="sub")
                          {
                             $thing = $row["name"];
                             ?>
                             <input type ="radio" name = "sub" id = "<?php echo $thing ?>" value="<?php echo $thing ?>"><label for = "<?php echo $thing ?>"><?php echo $thing ?></label>
                         
                            <?php
                          }
                          
                         }
                         ?>
                         <br><br><br>
                         Player: 
                         <?php 
                         $rows = $db->query("SELECT * FROM $tablename");  
                         foreach ($rows as $row){ 
                          if ($row['key']=="player")
                          {
                             $thing = $row["name"];
                             ?>
                             <input type ="radio" name = "player" id = "<?php echo $thing ?>" value="<?php echo $thing ?>"><label for = "<?php echo $thing ?>"><?php echo $thing ?></label>

                            <?php
                          }
                          
                         }
                         ?>
                         <br><br><br>
                         Answer Status: 
                         <input type ="radio" name = "interrupt" id = "N" value="N"><label for = "N">Neither</label>
                         <input type ="radio" name = "interrupt" id = "I" value="I"><label for = "I">Interrupt</label>
                         <input type ="radio" name = "interrupt" id = "B" value="B"><label for = "B">Blurt</label>
                         
                        
                                          <br>
                                          <br><br>
                         Answer: <input type ="radio" name = "answer" id = "c" value="c"><label for = "c">Correct</label>
                        <input type ="radio" name = "answer" id = "i" value="i"><label for = "i">Incorrect</label>
                         <input type ="radio" name = "answer" id = "n" value="n"><label for = "n">Neither</label>
                        
                                          <br>

                               <br><br>  <input type="submit" style="display: inline-block;
  padding: 1em 2em;
  background: #6648B0;
  -moz-transition: opacity 0.25s ease-in-out;
  -webkit-transition: opacity 0.25s ease-in-out;
  -o-transition: opacity 0.25s ease-in-out;
  -ms-transition: opacity 0.25s ease-in-out;
  transition: opacity 0.25s ease-in-out;
  letter-spacing: 0.20em;
  text-decoration: none;
  text-transform: uppercase;
  font-weight: 600; border:none;
  color: #FFF;" name="playGame" value="Submit" />
                                                 </form> 

                                                 <br><br><br><br>


                                                 <a href="userpage.php" class="button">Return to Settings</a>
<br><br><br><br> <br><br><br>
              <form style = "display:inline!important; width:40px;overflow: hidden; height=auto" method="post" action="logout.php" >
                  <input type="submit" name="Log out" value="Log out" />
        </form>

		</div>
	</div>

</div>

<div id="copyright" class="container">
	<p>Copyright (c) 2015 Paula Lahera. All rights reserved. | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
</div>
</body>
<?php mysql_close($db);?>
</html>
