<?php
 
require 'connect.php';
$name="profile";
$query="SELECT username FROM loginpage WHERE id=".$_SESSION['userid'];
if($string=mysql_query($query))
{
$name=mysql_result($string,0,'username');
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <title>ASK A DOCTOR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar " style="border-bottom:1px solid gray;">
  <div class="container-fluid">
    <div >
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border:1px solid blue;">
        <span class="icon-bar" style="background-color:blue;"></span>
        <span class="icon-bar" style="background-color:blue;"></span>
        <span class="icon-bar" style="background-color:blue;"></span> 
      </button>
	  </div>
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">AskDoctorOnline</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
		 <li class="active"><a href="complain.php">Complain</a></li>
		 <li><a href="#">Our Initiatives</a></li>
         <li class="active"><a href="askadoctor.php">Ask Doctor</a></li>
		  <li><a href="tp.php">Read</a></li>
		  <li><a href="bing_basic.php">Search Questions</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php  echo $name; ?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  


</body>
</html>
