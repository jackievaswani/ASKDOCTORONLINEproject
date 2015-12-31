<?php 
require  'connect.php';

ob_start();
session_start();

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["a"]))
{
$username=$_POST["username"];
$password=md5($_POST["password"]);
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$relation=$_POST["a"];

	if(!empty($_POST["username"]) && !empty($_POST["password"])  && !empty($_POST["firstname"])  && !empty($_POST["lastname"]) && !empty($_POST["a"]))
		{
			$query="select username FROM loginpage WHERE username='".$username."'";
			if($string=mysql_query($query))
			{
					$num=mysql_num_rows($string);
				if($num==1)
				{
					echo "usename has been takin by other";
				}
				
				
				
					if($num==0)
					{	$query="INSERT INTO loginpage VALUES ('', '".$username."', '".$password."', '".$firstname."', '".$lastname."', '".$relation."')";	
							if($string1=mysql_query($query))
							{ $_SESSION['register']=1;
								
							header("Location: login.php");
							}
							else
							{
							echo "try again";
							}
					}
				
			}
		}
		
	else{
				echo "invalid data";
		}
			
}
		

	
	



?>
<html>
<head>
<meta charset="utf-8">
<title>Best Login Page design in html and css</title>
<style type="text/css">
body {
background-color: #f4f4f4;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 16px;
line-height: 1.5em;
}
a { text-decoration: none; }
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }

/* ---------- LOGIN ---------- */
#login {
margin: 50px auto;
width: 300px;
}
form fieldset input[type="text"], input[type="password"] {
background-color: #e5e5e5;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 280px;
-webkit-appearance:none;
}
form fieldset input[type="submit"] {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
text-transform: uppercase;
width: 300px;
-webkit-appearance:none;
}
form fieldset a {
color: #5a5656;
font-size: 10px;
}
form fieldset a:hover { text-decoration: underline; }
.btn-round {
background-color: #5a5656;
border-radius: 50%;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
color: #f4f4f4;
display: block;
font-size: 12px;
height: 50px;
line-height: 50px;
margin: 30px 125px;
text-align: center;
text-transform: uppercase;
width: 50px;
}
.facebook-before {
background-color: #0064ab;
border-radius: 3px 0px 0px 3px;
-moz-border-radius: 3px 0px 0px 3px;
-webkit-border-radius: 3px 0px 0px 3px;
color: #f4f4f4;
display: block;
float: left;
height: 50px;
line-height: 50px;
text-align: center;
width: 50px;
}
.facebook {
background-color: #0079ce;
border: none;
border-radius: 0px 3px 3px 0px;
-moz-border-radius: 0px 3px 3px 0px;
-webkit-border-radius: 0px 3px 3px 0px;
color: #f4f4f4;
cursor: pointer;
height: 50px;
text-transform: uppercase;
width: 250px;
}
.twitter-before {
background-color: #189bcb;
border-radius: 3px 0px 0px 3px;
-moz-border-radius: 3px 0px 0px 3px;
-webkit-border-radius: 3px 0px 0px 3px;
color: #f4f4f4;
display: block;
float: left;
height: 50px;
line-height: 50px;
text-align: center;
width: 50px;
}
.twitter {
background-color: #1bb2e9;
border: none;
border-radius: 0px 3px 3px 0px;
-moz-border-radius: 0px 3px 3px 0px;
-webkit-border-radius: 0px 3px 3px 0px;
color: #f4f4f4;
cursor: pointer;
height: 50px;
text-transform: uppercase;
width: 250px;
}
</style>
</head>
<body>
<div id="login">
<h1><strong>Welcome.</strong> Please login.</h1>
<form method="POST">
<fieldset>
<p><input type="text" required  placeholder="username" name="username"></p>
<p><input type="password" required  placeholder="pasword" name="password"></p>
<p><input type="text" required  placeholder="firstname" name="firstname"></p>
<p><input type="text" required  placeholder="lastname" name="lastname"></p>
<p><input type="radio" name="a" value="doctor">Doctor
<input type="radio"  name="a" value="patient">Patient</p>

<p><a href="#">Forgot Password?</a></p>
<p><input type="submit" value="Login"></p>

</fieldset>
</form>

</div> <!-- end login -->

</body>
</html>