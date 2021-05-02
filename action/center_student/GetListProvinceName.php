<?php 
// lấy danh sách tỉnh binding lên combo
	include '../../config.php';

	$sql = "SELECT * FROM province ORDER BY province.ProvinceID";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){

		$dataRegist = mysqli_fetch_array($result);
		echo json_encode($dataRegist);
	}


 ?>