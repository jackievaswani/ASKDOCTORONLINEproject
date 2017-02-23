<?php 
session_start();
require 'connect.php';
require 'nav1.php';

$query="SELECT username FROM loginpage WHERE id=".$_SESSION['userid'];
if($string=mysql_query($query))
{
$name=mysql_result($string,0,'username');
}
$query="SELECT firstname FROM loginpage WHERE id=".$_SESSION['userid'];
if($string=mysql_query($query))
{
$firstname=mysql_result($string,0,'firstname');
}

$query="SELECT lastname FROM loginpage WHERE id=".$_SESSION['userid'];
if($string=mysql_query($query))
{
$lastname=mysql_result($string,0,'lastname');
}
$pic="images.png";
if(isset($_SESSION['doctor']) && !empty($_SESSION['doctor']) )
{
if($_SESSION['doctor']==1)
$pic="okok.png";
}
?>

<html>
<body>
<div class="container">
<div class="row" style="border-bottom:2px solid gray; ">
  <div class="col-md-4">
	<img class="img-circle" src="<?php echo "$pic";?>" width="45%"/>
  </div>
   <div class="col-md-7" style="font-size:30px; ">
  Username :  <?php echo $name;?>
  <br>
  First name : <?php echo $firstname;?>
  <br>
  Last name : <?php echo $lastname;?>
  <br>
	<button type="button" class="btn btn-primary">change details</button>
	<button type="button"  class="btn btn-danger"><a href="askadoctor.php" style="text-decoration:none; color:white;">ASK DOCTOR</a></button>
  <br><br>
  
  </div>
  </div>
  <br>
  <span style="font-size:35px; font-family:normal;   " width="100%"><p style="text-align:center;">YOUR ACTIVITY:</p></span><br>
  <span style="font-size:35px; font-family:normal;">
  <?php
	$query="SELECT question, detail  FROM questiontable WHERE userid=".$_SESSION['userid'];
	if($string=mysql_query($query))
	{
		$num=mysql_num_rows($string);
		for($i=0 ; $i<$num ; $i++)
		{	$question=mysql_result($string,$i,'question');
			echo "<span style=\"font-size:30px; \">Q : ".$question."</span><br>" ;
			$detail=mysql_result($string,$i,'detail');
			echo "<span style=\"font-size:16px; \">".$detail."</span>";
			echo" &nbsp;<button class=\"btn btn-default\">write answer</button>    ";
		echo" &nbsp; <button class=\"btn btn-default\">read answer</button><hr>";
		}
	
	}
	else
	echo "not cool";
  
  ?>
  </span>
  
</div>
</body>

</html>