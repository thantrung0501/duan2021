<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/w3.css">
  <link rel="stylesheet" href="../../css/student/studentRegistry.css">
  <link rel="stylesheet" href="../../css/topNavBar.css">
	<title>Trang chủ</title>
</head>
<body>
<?php 
  if(isset($_SESSION["AccountID"])){
    if($_SESSION["AccountType"]==1) header("location: ../admin/admin.php");
  }else{
    header("location: ../signin.php");
  }
?>
  <ul class="navbar">
    <li><a class="logo-container" href="./studentHomepage.php"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
    <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
    <li class="dropdown" style="float:right">
      <a href="javascript:void(0)" class="dropbtn">
      <?php 
      if(isset($_SESSION["Username"])) echo $_SESSION["Username"];
      else echo "Có lỗi xảy ra"
      ?>
      </a>
      <div class="dropdown-content">
        <a href="studentRegistry.php">Đăng ký thi</a>
        <a href="./studentChangeProfile.php">Cập nhật thông tin</a>
        <a href="./entranceExaminationPaper.php">Xem giấy báo dự thi</a>
        <a href="../../action/logout.php">Đăng xuất</a>
        <a href="./studentChangePassword.php">Đổi mật khẩu</a>
      </div>
    </li>
  </ul>

  <div class="container w3-global-font" id="container">
  </div>
</body>
<script src="../../js/student/studentRegistry.js"></script>
<script src="../../js/dateSolution.js"></script>
</html>