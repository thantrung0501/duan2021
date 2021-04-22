<?php 
	session_start();
	include '../config.php';
	$accountID = $_SESSION["AccountID"];
	$accountType = $_SESSION["AccountType"];
	if(isset($_POST["submit"])){
	    $fullName = $_POST["fullName"];
	    $gender = $_POST["gender"];
	    $phoneNumber = $_POST["phone"];
	    $identification = $_POST["cmnd"];
	    $address = $_POST["address"];
	    $email = $_POST["email"];
	    $stringDate = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
    	$dateofBirth = date('Y-m-d',strtotime($stringDate));
    	$jDetail = $_POST["jDetail"];

    	$sql = "UPDATE accountdetail ac SET Address = '$address', DateOfBirth = '$dateofBirth', FullName = '$fullName', Gender = '$gender', PhoneNumber = '$phoneNumber', Identification = '$identification', Email = '$email', JDetail = '$jDetail' WHERE AccountID = '$accountID'";
    	$query = mysqli_query($conn,$sql );
    	if($query){
    		 $_SESSION["notice"] = "Cập nhật thành công";
    		 
    	}
    	else{
    		$_SESSION["notice"] = "Cập nhật thất bại";
    	}

    	if($accountType == 1){
			header("location: ../html/admin/admin.php");
    	}
    	else{
    		header("location: ../html/student/studentChangeProfile.php");
    	}
    	
	}
	
 ?>