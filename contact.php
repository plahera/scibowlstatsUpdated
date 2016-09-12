<?php
$submitted=false;
if($_POST['contact'] == "Submit") 
    {
      $submitted=true;
      
        $email=$_POST["email"];
    $message=$_POST["message"];
   mail("paula@tester.me" , "SciBowl Stats Comment from ".$email, $message." from ".$email);
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
				<h2>Contact!</h2>
				</div>

				<?php
				if ($submitted==true)
				{
					echo "Thanks for your feedback!";
					?><br><br> <?php
				}
				?>

				<br>

			 <p>Let me know if there are any glitches or anything I can do to improve the website!</p>
                       
                        
                        <form method="post" action="contact.php" style="vertical-align: top;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E-mail: <input type="text" name="email" maxlength="100" value="" style="width:300px;" />
           <br><br>
            Feedback:
           <input type="text" name="message" maxlength="500" value="" style="height:100px; width: 300px;" />
           <br>
  
           <input type="submit" name="contact" value="Submit" style="width:70px; "/>
        </form>


		</div>
	</div>

</div>

<div id="copyright" class="container">
	<p>Copyright (c) 2015 Paula Lahera. All rights reserved. | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
</div>
</body>
</html>
