<?php
require  'connect.php';
session_start();
if(isset($_SESSION['userid']))
	require 'nav1.php';
	
else
	require 'nav.php';
?>

<html>
<head>

</head>
<body>
<div class="container">
<span style="font-family:normal; font-size:200%;">Consult with highly qualified doctors anytime, anywhere.</span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp <button type="button" style="float:right; margin-right:15%;" class="btn btn-lg btn-danger"><a href="askadoctor.php" style="text-decoration:none; color:white;">ASK DOCTOR</a></button>
</div>
<div class="container-fluid">
<br><br>
<img src="doctor.jpg" width="100%" height="80%" style="height:70%;">
</div>

</body>
</html>