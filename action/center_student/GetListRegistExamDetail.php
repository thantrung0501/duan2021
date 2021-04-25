<?php
	include '../../config.php';
	session_start();
	// lấy ra id đăng nhập
	$accountID = $_SESSION["AccountID"];

	$sql = "call Pro_Get_ListRegistExamDetail()";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) >0){

		$dataRegist = mysqli_fetch_array($user);
		echo json_encode($dataRegist);
	}else{

		echo("không có bản ghi");
	}

?>