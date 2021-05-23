<?php 
	// đóng đăng ký thi
	session_start();
	include '../../../config.php';

	$registExamID = $_POST["RegistExamID"];

	$sqlGetAllRegist = "SELECT r.RegistExamDetailID FROM registexamdetail r WHERE r.RegistExamID = '$registExamID'";

	$queryGetAllRegist = mysqli_query($conn, $sqlGetAllRegist);

	if(mysqli_num_rows($queryGetAllRegist) > 0){
		while ($row = mysqli_fetch_array($queryGetAllRegist)) {
			$sqlGetAccount = "SELECT * FROM registexaminfor r WHERE r.RegistExamDetailID = '".$row["RegistExamDetailID"]."'";
			$queryGetAccount = mysqli_query($conn,$sqlGetAccount);
				
			if(mysqli_num_rows($queryGetAccount) > 0){
				 	 $i = 0;
				while ($row1 = mysqli_fetch_array($queryGetAccount)) {
				 	$i = $i+1;
				 	$sqlUpdate = "UPDATE registexaminfor r set r.IdentificationNumber = $i WHERE r.AccountID = '".$row1["AccountID"]."'";
				 	$queryUpdate = mysqli_query($conn, $sqlUpdate);

				}
				 	

			}
		}
			
	}

	// Đóng bang MasterDATE

	
	$sql = "UPDATE registexam r SET r.IsRegistAll = 0 WHERE r.RegistExamID = '$registExamID' ";
	$query = mysqli_query($conn, $sql);

	// đóng tất cả các ca thi trong đợt thi đó

	$sql1 = "UPDATE registexamdetail r SET r.IsRegist = 0 WHERE r.RegistExamID = '$registExamID'";

	$query1 = mysqli_query($conn, $sql1);

	echo json_encode($query1);
 ?>