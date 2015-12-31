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
header("Location:notaskadoctor.php");
}
if(isset($_POST['complain']) && isset($_POST['state'] ) && isset($_POST['village'] ))
{
		if(!empty($_POST['complain']) &&  !empty($_POST['state'])  && !empty($_POST['village'] ))
		{
		$query="INSERT INTO complaintable VALUES('NULL',".$_SESSION['userid'].",'".$_POST['complain']."','".$_POST['village']."','".$_POST['state']."')";
		
		if($string=mysql_query($query))
		{ 
		echo ' <div class="container alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCSESS!!</strong> you complain is successfully submitted.</div>';
		}
		}
		else
		{ 
		echo ' <div class="container alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Fill all field!!</strong> please try again</div>';
		}

}
?>
<html>



<body>
<div class="container">
<br><br><br><br>
<form role="form" method="POST">
<div class="form-group">
<label class="control-label">Complain</label>
<textarea name="complain" placeholder="eg-There are sanitary problems due to lack of toilets in xyz village in maharashtra due to which we suffering from health issues" rows="3" class="form-control"></textarea>
</div>
<div class="form-group">
<label class="control-label">Village name</label>
<input type="text" placeholder="eg- Akola" class="form-control" name="village">
</div>
<div class="form-group">
<label class="control-label">State name</label>
<input type="text"  placeholder="eg- Maharashtra"class="form-control" name="state">
</div>
<input type="submit" class="btn btn-primary">
</form>
</div>
</body>










</html>
