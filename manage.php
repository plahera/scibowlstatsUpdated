<?php 

session_start();
 if ((isset($_SESSION))&&($_SESSION["login"] =="yes") )
 {
    header('Location: userpage.php');
 }
    
?>

<?php 

$sucess=false;

if($_POST['username'] == "Submit") 
    {
    $sucess=false;
    
    $email = $_POST["email"];
    $errorMessage = "";
       if(empty($email)) {
      $errorMessage= $errorMessage. "\n You forgot to enter your email.\n <br>";
            $sucess = false;
    }

   $db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" ); 
$rows = $db->query("SELECT * FROM usersTab"); 
        foreach ($rows as $row){
         if ($row["email"]==$email)
         {  
             $username= $row["username"];
            
             $sucess=true;
            $autoResponseSubject = "HW scibowlstats Account Username";
           $autoResponseMessage = "Hello,         
           
           Your username is: \"$username\"
          
           Thank you.";
          mail($email, $autoResponseSubject, $autoResponseMessage);
         }
        }
   
    if((!empty($email))&& ($sucess ==false))
    {
        $errorMessage= $errorMessage. "\n The username you entered does not exist. If you believe this is an error please email me at paula@tester.me to resolve this.\n <br> <br>";
    }
   mysql_close($db);
     
}

if($_POST['pswd'] == "Submit") 
    {
    $sucess=false;
    $username = $_POST["username"];
    $errorMessage = "";
        if(empty($username)) {
      $errorMessage= $errorMessage. "\n You forgot to enter your username.\n <br>"; 
        $sucess = false;
    }
        
   $db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" ); 
$rows = $db->query("SELECT * FROM usersTab"); 
        foreach ($rows as $row){
         if ($row["username"]==$username)
         {  
             $password= $row["password"];
             $email = $row["email"];
            
             $sucess=true;
            $autoResponseSubject = "HW scibowlstats Account Password";
           $autoResponseMessage = "Hello,         
           
           Your password is: \"$password\"
          
           Thank you.";
          mail($email, $autoResponseSubject, $autoResponseMessage);
         }
        }
    if((!empty($username))&& ($sucess ==false))
    {
        $errorMessage= $errorMessage. "\n The username you entered does not exist. If you believe this is an error please email me at paula@tester.me to resolve this.\n <br><br>";
    }
   mysql_close($db);
    
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
				
				</div>
			<p><?php if ($sucess ==true)
    {
         ?> <p>Thank you! Your password or username has been emailed to you at the email that you have on file.</p>
     <?php }
        else{
            echo $errorMessage;
?>
                        Forgot your username?
                        <form method="post" action="manage.php" >
           Email: <input type="text" name="email" maxlength="100" value="" />
           <br>           
          <input type="submit" name="username" value="Submit" />
        </form> 
                        <br><br><br>
                                     Forgot your password?
                        <form method="post" action="manage.php" >
           Username: <input type="text" name="username" maxlength="100" value="" />
           <br>           
          <input type="submit" name="pswd" value="Submit" />
        </form> 
                       <?php } ?> 
</p>
		</div>
	</div>

</div>

<div id="copyright" class="container">
	<p>Copyright (c) 2015 Paula Lahera. All rights reserved. | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
</div>
</body>
</html>
