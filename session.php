<?php 
	session_start();
	if($_SESSION["logged"] != true )
	header("location: index.php");
?>