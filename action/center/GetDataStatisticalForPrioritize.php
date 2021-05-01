<?php 
	// lấy dữ liệu theo mức độ ưu tiên
	session_start();
	include '../../config.php';


	$StartYear = $_POST["FindYear"]?$_POST["FindYear"]:1;
	$EndYear = $_POST["EndYear"]?$_POST["EndYear"]:1;

	$sql = "Call Pro_GetData_StaticForPrioritize($StartYear, $EndYear)";
	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows($query) > 0){

		$listGroupAccount = mysqli_fetch_array($query);
		echo json_encode($listGroupAccount);
	}



 ?>