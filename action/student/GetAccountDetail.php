<?php 
	include '../../config.php';
	$accountID = $_SESSION["AccountID"];

	$sql = "SELECT * FROM accountdetail WHERE AccountID = '$accountID'";
	$query = mysqli_query($conn, $sql);

	if(mysqli_num_rows($query) > 0){

		$dataAccountDetail = mysqli_fetch_array($query);
		echo json_encode($dataAccountDetail);
	}

 ?>