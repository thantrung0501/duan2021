<?php 
// lấy thống kê theo khu vực
	session_start();
	include '../../config.php';
	
	$StartYear = $_POST["FindYear"]?$_POST["FindYear"]:1;
	$EndYear = $_POST["EndYear"]?$_POST["EndYear"]:1;
	// lấy dữ liệu thống kê theo tỉnh
	$sql = "CALL Pro_GetData_StatisticalForArea($StartYear,$StartYear)";

	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows($query) > 0){

		$listGroupAccount = mysqli_fetch_array($query);
		echo json_encode($listGroupAccount);
	}

 ?>