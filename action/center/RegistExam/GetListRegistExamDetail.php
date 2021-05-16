<?php 
	// Lấy danh sách các ca thi theo đợt thi gần nhất
	session_start();
	include '../../../config.php';
	// lấy những thằng có IsRegistAll = 1
	$sql = "SELECT * FROM registexamdetail r INNER JOIN registexam r1 on r.RegistExamID = r1.RegistExamID  WHERE r1.IsRegistAll = 1  ORDER BY r.UnitExam";
	$query = mysqli_query($conn, $sql);

		$listRegistExam = [];
		if(mysqli_num_rows($query) > 0){
			while ($row = mysqli_fetch_array($query)) {
				array_push($listRegistExam, $row);
			}
			echo json_encode($listRegistExam);
		}

 ?>