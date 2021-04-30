<?php 
	session_destroy();
	session_unset();
	unset($_SESSION["AccountID"]);
	unset($_SESSION["Username"]);
	$_SESSION = array();
	header("location: ../html/signin.php");

 ?>