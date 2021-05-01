<?php 
// lấy dữ liệu theo tổ hợp môn học

	session_start();
	include '../../config.php';

	$Subject1 = $_POST("Subject1");
	$Grade1 = $_POST("Grade1");
	$Subject2 = $_POST("Subject2");
	$Grade2 = $_POST("Grade2");
	$Subject3 = $_POST("Subject3");
	$Grade3 = $_POST("Grade3");

	$SumSubject = $Grade2 + $Grade3 + $Grade1;

	$sql = "SELECT MONTH(accountdetail.AccountDate) as 'month', COUNT(accountdetail.AccountID) as 'number' FROM accountdetail "
 ?>