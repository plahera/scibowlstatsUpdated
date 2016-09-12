<!--

Answer Options:

correct

Incorrect

Incorrect Interupt

Correct Interrupt

Blurt (neither)



labels are the players ->"January","February","March","April","May","June","July"

-->
 


 <?php 
$db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" ); 

$wasError=false;

echo $wasError;
session_start();
 if ((!isset($_SESSION))||($_SESSION["login"] !="yes") )
 {
    header('Location: login.php');
 }
$tablename = $_SESSION["username"]."SETTINGS";
?>  

<?php
if($_POST['makegraph'] == "Submit") 
    {

    $subjects=$_POST["subject"];
    $playerstemp=$_POST["players"];
    $players = "";
    print_r($players);
    $allplayers=false;



    if ($subjects[0]=="all")
    {
      unset($subjects);
      $subjects=array();
      $rows = $db->query("SELECT * FROM $tablename");
                        $i=0;
                         foreach ($rows as $row){ 
                          
                         if ($row['key']=="sub")
                       {
                        
                        $subjects[$i] = $row["name"];
                        $i++;
                     //   echo $i;
                       } 
                        
                         
                    }
    }

    if ($playerstemp[0]=="all")
    {
      unset($playerstemp);
      $playerstemp=array();
      $rows = $db->query("SELECT * FROM $tablename");
                        $i=0;
                         foreach ($rows as $row){ 
                          
                         if ($row['key']=="player")
                       {
                        
                        $playerstemp[$i] = $row["name"];
                        $i++;
                     //   echo $i;
                       } 
                        
                         
                    }
    }

    if ($playerstemp[0]!="all"){
    for ($i =0; $i<count($playerstemp); $i++)
    {
      
      $players = $players. " \" ".$playerstemp[$i]." \", ";
      //echo players. " \"".$playerstemp[$i]."\", ";

    }
     $players = substr($players,0,strlen($players)-2);
   }
     else
     {
      $players="";
      $rows = $db->query("SELECT * FROM $tablename");

                         foreach ($rows as $row){ 
                          $i=0;
                         if ($row['key']=="player")
                       {
                        
                        $players = $players. " \" ".$row["name"]." \", ";
                        $playerstemp[$i] = $row["name"];
                        $i = $i+1;

                       } 
                        
                         
                    }
     }


     $answer = array();

     for ( $i = 0; $i < count($playerstemp)*5; $i++)
     {
      $answer[$i]=0;
     }

//Swap over and make one huge array with numbers for all players: i.e. 1 2 3 4 5 will all be for player one and 6 7 8 9 10 for player two and so on

      $rows = $db->query("SELECT * FROM $tablename"); 
      $table = " ";
      $prevtable="";
        for ($j = 0; $j < count($subjects); $j++){
                        
                       $table = " ".$_SESSION["username"].$subjects[$j];  
                    //   echo $table;  

                      
                             for ($i =0; $i<count($playerstemp); $i++)
                        {
                      //    echo $playerstemp[$i];
                            $rowsTemp = $db->query("SELECT * FROM $table WHERE player = '$playerstemp[$i]'");              
                        
                             foreach ($rowsTemp as $rowTemp) {
                         
                           
                              $spot = $i*5;
                              

                              if ($rowTemp["answer"]=="c")
                              {
                                  if ($rowTemp["interrupt"]=="N")
                                  {   
        
                            
                                     $answer[$spot]= $answer[$spot]+1;
                                     
                                  }
                                  if ($rowTemp["interrupt"]=="I")
                                  {
            
                                    $spot = $spot + 3;
                           
                                    $answer[$spot]= $answer[$spot]+1;
                                  }
                              }
                              else if ($rowTemp["answer"]=="i"){
                                if ($rowTemp["interrupt"]=="N")
                                  {

  
                                    $spot = $spot + 1;
                        
                                    $answer[$spot]= $answer[$spot]+1;
                                  }
                                  if ($rowTemp["interrupt"]=="I")
                                  {


                                    $spot = $spot + 2;
                               
                                    $answer[$spot]= $answer[$spot]+1;
                                  }
                              }
                              else if ($rowTemp["answer"]=="n")
                              {
                                if ($rowTemp["interrupt"]=="B")
                                  {

                                    $spot = $spot + 4;
                             
                                    $answer[$spot]= $answer[$spot]+1;
                                  }
                              }
                            }
                        }
                       }
          //            print_r($answer);


//randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()
      $cor = "";

      $inc="";

      $incint="";

      $corint="";

      $blurt="";


      for ($i = 0; $i<count($answer); $i++)
      {
        if ($i%5==0)
        {   //echo $answer[$i];
            $cor= $cor . ",". $answer[$i];
        }
        if ($i%5==1)
        {
          //echo $answer[$i];
          $inc= $inc . ",". $answer[$i];
        }
        if ($i%5==2)
        {
          //echo $answer[$i];
          $incint= $incint . ",". $answer[$i];
        }
        if ($i%5==3)
        {
          //echo $answer[$i];
          $corint= $corint . ",". $answer[$i];
        }
        if ($i%5==4)
        {//echo $answer[$i];
          $blurt= $blurt . ",". $answer[$i];
        }
      }
     // echo "cor";
      $cor = substr($cor,1,strlen($cor));
     // echo $cor;

//echo "inc";
   $inc=substr($inc,1,strlen($inc));
    //  echo $inc;
//echo "ii";
      $incint=substr($incint,1,strlen($incint));
     // echo $incint;
//echo "ci";
      $corint=substr($corint,1,strlen($corint));
     // echo $corint;
//echo "b";
      $blurt=substr($blurt,1,strlen($blurt));
     // echo $blurt;

}



 $db = new PDO("mysql:dbname=tester;host=localhost","tester","tester" ); 

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
<script src="Chart.js"></script>
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
				<h2></h2>
				</div>
		
<?php echo "Subjects: " ;
foreach ($subjects as $sub) {
  echo $sub. " ";
}?>
<br>
        <canvas id="canvas" height="400" width="600"></canvas>


        
       <script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels : [<?php echo $players; ?>],
    datasets : [
      {
        label: "Correct",
        fillColor : "rgba(255,153,204,0.5)",
        strokeColor : "rgba(255,153,204,0.8)",
        highlightFill: "rgba(255,153,204,0.75)",
        highlightStroke: "rgba(255,153,204,1)",
        data : [<?php echo $cor; ?>]
      },
      {
        label: "Incorrect",
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        data : [<?php echo $inc; ?>]
      },
      {
        label: "Incorrect Interrupt",
        fillColor : "rgba(89,143,76,0.5)",
        strokeColor : "rgba(89,143,76,0.8)",
        highlightFill: "rgba(89,143,76,0.75)",
        highlightStroke: "rgba(89,143,76,1)",
        data : [<?php echo $incint; ?>]
      },
      {
        label: "Correct Interrupt",
        fillColor : "rgba(109,95,210,0.5)",
        strokeColor : "rgba(109,95,210,0.8)",
        highlightFill: "rgba(109,95,210,0.75)",
        highlightStroke: "rgba(109,95,210,1)",
        data : [<?php echo $corint; ?>]
      },
      {
        label: "Blurt",
        fillColor : "rgba(232,174,88,0.5)",
        strokeColor : "rgba(232,174,88,0.8)",
        highlightFill: "rgba(232,174,88,0.75)",
        highlightStroke: "rgba(232,174,88,1)",
        data : [<?php echo $blurt; ?>]
      }
      
    ]

  }
  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");


    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : false,
      multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
    });
  }

  </script>








<br><br><br>
  <h4>Generate New Graph</h4>
                         <form method="post" action="graph.php" >   
                          Graph Subjects:  
             
                          <input type="checkbox" id = "all" name="subject[]" value="all"><label for = "all">All Subjects</label>
                         <?php $rows = $db->query("SELECT * FROM  $tablename"); 
                         $count = 0; 
                         foreach ($rows as $row){ 
                         if ($row['key']=="sub")
                       {
                        $count++;
                        $thing = $row["name"];
                        ?> 
                         <input type="checkbox" id ="<?php echo $thing ?>" name="subject[]" value="<?php echo $thing ?>"><label for = "<?php echo $thing ?>"><?php echo $thing ?> </label>
                       
                         <?php
                         if ($count >5)
                         {
                          $count = 0;
                          ?> <br><?php
                         }
                       } ?>
                        
                         
                         <?php }
                        
                         ?>
                        
                     <br>
                           Players:  
                        
                          <input type="checkbox" id = "allsub" name="players[]" value="all"><label for = "allsub">All Players</label>
                         <?php $rows = $db->query("SELECT * FROM $tablename"); 
                         $count=0; 
                         foreach ($rows as $row){ 
                         if ($row['key']=="player")
                       {
                        $thing = $row["name"];
                        $count++;
                        ?> 
                         <input type="checkbox" id ="<?php echo $thing ?>" name="players[]" value="<?php echo $thing ?>"><label for = "<?php echo $thing ?>"><?php echo $thing ?> </label>
                       
                         <?php
                         if ($count >5)
                         {
                          $count = 0;
                          ?> <br>
                           <?php
                         }
                       } ?>
                        
                         
                         <?php }
                        
                         ?>
                           
<br>
                                 <input type="submit" name="makegraph" value="Submit" />
                                                 </form> 

                                                 <br><br><br><br><br><br><br>
                                                 <a href="userpage.php" class="button">Return to your stuff!</a>

		</div>
	</div>

</div>

<div id="copyright" class="container">
	<p>Copyright (c) 2015 Paula Lahera. All rights reserved. | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
</div>
</body>
<?php mysql_close($db);?>
</html>
