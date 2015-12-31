<?php

if(@!mysql_connect("localhost","root","")  || @!mysql_select_db("example"))
{
	die("cannt connect to server sry!!!");
}


?>