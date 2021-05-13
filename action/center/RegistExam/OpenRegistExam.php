<?php 
	// mở đăng ký thi
	session_start();
	include '../../../config.php';

	$registExamID = $_POST["RegistExamID"];

	$stringDate = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];

	$finishDate = date('Y-m-d',strtotime(str_replace('/', '-', $stringDate)));
	$startedDate = date("Y-m-d H:i:s");

	$sql = "UPDATE registExam r set r.StartedDate = '$startedDate', r.FinishDate = '$finishDate', r.IsRegist = 1 WHERE r.RegistExamID = '$registExamID'";
	$query = mysqli_query($conn, $sql);
	echo json_encode($query);
 ?>