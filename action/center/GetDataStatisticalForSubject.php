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

	$sql = "SELECT YEAR(accountdetail.AccountDate) as 'Year', COUNT(accountdetail.AccountID) as 'Number' FROM accountdetail WHERE $Subject1 + $Subject2 + $Subject3 >= $SumSubject GROUP BY YEAR(accountdetail.AccountDate) ORDER BY YEAR(accountdetail.AccountDate) DESC";
	
	$query = mysqli_query($conn, $sql);
	$listGroupAccount = array();
	if(mysqli_num_rows($query) > 0){
		while ($row = mysqli_fetch_array($query)) {
			array_push($listGroupAccount, $row);
		}
		echo json_encode($listGroupAccount);
	}
 ?>