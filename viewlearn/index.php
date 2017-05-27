<?php
session_start();
include_once('modules/config.php');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEWLEARN | Simply learn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
     <link href="css/bootstrap.map.css" rel="stylesheet" type="text/css" />
       <link href="css/bootstrap.miin,css" rel="stylesheet" type="text/css" />
         <link href="css/bootstrap.min.css.map" rel="stylesheet" type="text/css" />
           <link href="css/bootstrap.theme.css" rel="stylesheet" type="text/css" />
             <link href="css/bootstrap.theme.css.map" rel="stylesheet" type="text/css" />
               <link href="css/bootstrap.theme.min.css" rel="stylesheet" type="text/css" />
                 <link href="css/bootstrap.theme.min.css.map" rel="stylesheet" type="text/css" />
  
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script> 
  
  <style>
  
   /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;

    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      
    }
 .body{
 background-image: url("icons/bg.JPG"); 
 background-size:120% 100%;
 background-repeat: no-repeat; 
 background-position: center;
 background-attachment: fixed;
 
 }   
 .col-sm-3 h1{
 text-shadow:2px 2px 2px black;
 color: white;
 font-family: fantasy;
 }
 
 .error{
 padding:20px;
 background: linen;
 text-align: center;
 }
 
 
 
 .pattern{
background: rgba(0, 0, 0, 0.7);
padding:20px;
min-height:450px;
-moz-border-radius-topright: 3px;
-webkit-border-top-right-radius: 3px;
/*border radius left*/  
border-top-left-radius: 3px;
-moz-border-radius-topleft: 3px;
-webkit-border-top-left-radius: 3px;      

/*border radius right*/ 
border-bottom-right-radius: 3px;
-moz-border-radius-bottomright: 3px;
-webkit-border-bottom-right-radius: 3px;
/*border radius left*/  
border-bottom-left-radius: 3px;
-moz-border-radius-bottomleft: 3px;
-webkit-border-bottom-left-radius: 3px;
color:white;
font-size:17px;
 }   
 .round,.round img,.latest_trend div{
border-top-right-radius: 40px;
-moz-border-radius-topright: 40px;
-webkit-border-top-right-radius:40px;
/*border radius left*/  
border-top-left-radius: 40px;
-moz-border-radius-topleft: 40px;
-webkit-border-top-left-radius: 40px;      

/*border radius right*/ 
border-bottom-right-radius: 40px;
-moz-border-radius-bottomright: 40px;
-webkit-border-bottom-right-radius: 40px;
/*border radius left*/  
border-bottom-left-radius: 40px;
-moz-border-radius-bottomleft: 40px;
-webkit-border-bottom-left-radius: 40px;    
}   
    
.col-sm-3 img{
border:solid 5px white;
}    
    
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><strong>VIEWLEARN</strong></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Support</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
	if($_SESSION['ID']!=""){
$config=new config;
$user=$config->return_user();	   
       
       
 echo('<li><a href="#">('.ucfirst($user['fname']).' '.ucfirst($user['lname']).')</a></li>');      
 echo('<li><a href="?ref_content='.md5('logout_learnview').'"></span> Logout</a></li>');
	}elseif($_SESSION['ID']==""){
	echo('<li><a href="?ref_content=register">Register</a></li>
        <li><a href="?ref_content=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>');   
	}
?>
      
      
      
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron" style="background:#27AE60;color:white;margin-bottom: 0;">
  <div class="container text-center">
    <h1 style="font-family: fantasy;text-shadow:2px 2px 4px black;">WELCOME</h1>      
    <p style="text-shadow:0px 0px 3px black;">Be prepared to learn!</p>
  </div>
</div>





<?php
config::page();	
?>





<footer class="container-fluid text-center" style="background:#27AE60;color:white;">
  <p>&copy; <?php
echo date('Y');
?></p>
</footer>

</body>
</html>
