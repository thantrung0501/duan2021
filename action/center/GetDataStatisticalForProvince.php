<?php 
  	session_start();
	include '../../config.php';

	$provinceName = $_POST["ProvinceName"];

	$FindYear = $_POST["findYear"]?$_POST["FindYear"]:1;
	// lấy dữ liệu thống kê theo tỉnh
	$sql = "CALL Pro_GetData_StatisticalForProvince($provinceName,$findYear )";

	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows($query) > 0){

		$listGroupAccount = mysqli_fetch_array($query);
		echo json_encode($listGroupAccount);
	}


 ?>