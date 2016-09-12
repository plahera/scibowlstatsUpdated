<?php session_start(); ?>
<?php 

if ((isset($_SESSION))&&($_SESSION["login"] =="yes") )
{
  header('Location: userpage.php');
}
$show=TRUE;
if($_POST['formSub'] == "Submit") 
    {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errorMessage = "";
        if(empty($username)) {
      $errorMessage= $errorMessage. "\n You forgot to enter your username.\n <br>"; 
        $show = TRUE;
    }
        if(empty($password)) {
      $errorMessage= $errorMessage. "\n You forgot to enter your email.\n <br>";
            $show = TRUE;
    }
   $db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" ); 
$rows = $db->query("SELECT * FROM usersTab"); 
        foreach ($rows as $row){
         if ($row["password"]==$password&&$row["username"]==$username)
         {
             $show=FALSE;
             $_SESSION['login'] = "yes";
             $_SESSION['username'] = $username;
             $_SESSION['password'] = $password;

         }
        }
        mysql_close($db);
    if($show==FALSE)
    {
        header('Location: userpage.php');
    }
   
    
}
    ?>

!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
				<h2>Welcome!</h2>
				</div>
			<?php

    
if ($show==TRUE)
{

            ?>
                         <h1>Sign in</h1> 
                        <?php echo $errorMessage;?>
Please try again.
        <form method="post" action="check.php" >
           Username: <input type="text" name="username" maxlength="100" value="" />
           <br>
           Password: <input type="password" name="password" maxlength="100" value="" />
           <br>
           
  
           <input type="submit" name="formSub" value="Submit" />
        </form>
                        <a href="reset.php"> <p>I forgot my password or username! </p></a>
                       <a href="createaccount.php">  <p>Make an account! </p></a>
    <?php
}
       


?>             
		</div>
	</div>

</div>

<div id="copyright" class="container">
	<p>Copyright (c) 2015 Paula Lahera. All rights reserved. | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
</div>
</body>
</html>
