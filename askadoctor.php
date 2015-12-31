<?php
ob_start();
session_start();
if(isset($_SESSION['userid']))
{
require 'connect.php';
require 'nav1.php';
}
else
{
header("Location: notaskadoctor.php");
}
if(isset($_POST['question']) && isset($_POST['detail']))
	{
	if( !empty($_POST['question']) && !empty($_POST['detail']) )
	{
		$q=$_POST['question'];
		$d=$_POST['detail'];
		$query="INSERT INTO questiontable VALUES('NULL',".$_SESSION['userid']." , '".$q."','".$d."')";
		 $_SESSION['userid'];
		if($string=mysql_query($query))
		{
			echo ' <div class="container alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCSESS!!</strong> you question is successfully submitted.</div>';
		}
		else
		{
		echo"wrong";
		}
	}
	else
	{
	echo ' <div class="container alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Please enter all fields</strong>Try again!!!   </div>';
	}
	}
	

?>

<html>


<body>
<br><br><br>
<div class="container">
<form class="form-horizontal" role="form" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Question:</label>
    <div class="col-sm-10">
      <textarea placeholder="Enter question for yourself or anybody else. For e.g. I am 25yr old male and have backache for last 2 months. What should I do?" rows="5" class="form-control" name="question"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Question details:</label>
    <div class="col-sm-10"> 
      <textarea   rows="10" class="form-control" placeholder="Enter question details" name="detail"></textarea>
    </div>
  </div>
 
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default"  >Submit</button>
    </div>
  </div>
</form>










</div>
</body>