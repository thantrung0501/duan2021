<?php 
	session_start();
	unset($_SESSION["AccountID"]);
	unset($_SESSION["Username"]);
	header("location: ../html/signin.php");

 ?>