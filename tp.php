<?php
require  'connect.php';
session_start();
if(isset($_SESSION['userid']))
	require 'nav1.php';
	
else
	require 'nav.php';
	
$query="SELECT * FROM questiontable WHERE 1";
if($string=mysql_query($query))
{
	$i=0;
	$t=mysql_num_rows($string);
	for($i=0;$i<$t;$i++)
	{	$q="text".$i;
			if (  isset($_POST[$q])  && !empty($_POST[$q])  )
			{
				$qid=mysql_result($string,$i,'id');
				$ans=$_POST[$q];
				$query="INSERT INTO answertable VALUES('NULL',".$_SESSION['userid'].",".$qid.",'".$ans."')";
				if($string1=mysql_query($query))
					echo"successful done";
			
			
			}
			
	
	}
	
}
	
	
	
?>
<html>
<head>

  <style type="text/css">
  
  </style>
</head>
<body>
<div class="container">
<h1 style="text-align:center; font-family:normal;">Frequently asked questions</h1><br><br>
<?php
$query="SELECT * FROM questiontable WHERE 1";
if($string=mysql_query($query))
{
	$i=0;
	$t=mysql_num_rows($string);
	for($i=0;$i<$t;$i++)
	{
	echo "<span style=\"font-size:35px;\"> Q : ".mysql_result($string,$i,'question')."</span><br>";
	echo "<span style=\"font-size:15px;\">".mysql_result($string,$i,'detail')."</span>";
		echo" &nbsp;<button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#myModal".$i."\">write answer</button>    ";
		echo" &nbsp; <button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#Modal".$i."\">read answer</button><br><hr><br>";
		echo '

<!-- Modal -->
<div id="myModal'.$i.'" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  Q : '.mysql_result($string,$i,'question').'</h4>
      </div>
	  <form method="POST" action="tp.php">
      <div class="modal-body">
        <textarea class="form-control" name="text'.$i.'" rows="10"></textarea>
      </div>
      <div class="modal-footer">
		<input type="submit" class="btn btn-default" value="submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>';
		$qid=mysql_result($string,$i,'id');
		$querya1="SELECT answer,pid FROM answertable WHERE qid=".$qid;
		$answers=mysql_query($querya1);
		$numofans=mysql_num_rows($answers);
		
			
	echo '

<!-- Modal -->
<div id="Modal'.$i.'" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  Q : '.mysql_result($string,$i,'question').'</h4>
      </div>
	  <form method="POST" action="tp.php">
      <div class="modal-body" style=" overflow-y: auto; height:400px;">
       ';
	   
		for($j=0;$j<$numofans;$j++){
		$pid=mysql_result($answers,$j,'pid');
		$querya2="SELECT username,relation FROM loginpage WHERE id=".$pid;
		$person=mysql_query($querya2);
		$check=mysql_result($person,0,'relation');
		$name=mysql_result($person,0,'username');
		if($check=="doctor")
		{
			echo'<img class="img-circle" src="okok.png" width="10%" style="max-width: 70%;"> '.$name.'   <span class="label label-danger">Doctor</span><br>';
		}
		else
		{
		echo"<img class=\"img-circle\" src=\"images.png\" width=\"10%\" style=\"max-width: 70%;\"  /> ".$name."<br>";
		}
	     echo "ANSWER: ".mysql_result($answers,$j,'answer')."<br><br><hr>";
		}
	   echo'
      </div>
      <div class="modal-footer">
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>';
	
	
	
	
		
	}
}
?>



</div>
</body>
</html>

