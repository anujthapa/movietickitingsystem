<?php
	$host="localhost";
	$user="root";
	$pass="";
	$dbname="adminpanel";
	$conn_link=mysql_connect($host,$user,$pass) or die("Failed to connect".mysql_error());
	$db=mysql_select_db($dbname,$conn_link) or die("Failed to connect database".mysql_error());
?>