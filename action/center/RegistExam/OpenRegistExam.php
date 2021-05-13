<?php 
	// mở đăng ký thi
	session_start();
	include '../../../config.php';

	$registExamID = $_POST["RegistExamID"];

	$startedDate = $_POST["startedDate"];
	$finishDate = $_POST["finishDate"]
	$sql = "UPDATE registExam r set r.StartedDate = '$startedDate', r.FinishDate = '$finishDate', r.IsRegist = 1 WHERE r.RegistExamID = '$registExamID'";
	$query = mysqli_query($conn, $sql);
	echo json_encode($query);
 ?>