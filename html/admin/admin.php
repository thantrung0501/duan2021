<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/admin/admin.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Trang chủ</title>
  </head>
  <body>
  <?php 
    if(isset($_SESSION["AccountID"])){
      if($_SESSION["AccountType"]!=1) header("location: ../student/studentHomepage.php");
    }else{
      header("location: ../signin.php");
    }
  ?>
    <!-- Side Bar -->
    <div id="mySidenav" class="sidenav">
      <a href="adminManageExam.php">Quản lý lịch thi</a>
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="statistics.php">Thống kê lượt đăng ký</a>
      <a href="adminWriteNotice.php">Viết thông báo</a>
    </div>

    <div id="main" class="main">
      <!-- Top Navigation Bar -->
      <ul class="navbar">
        <li><button class="side-bar-toggle" id="sideBarBtn">&#9776;</button></li>
        <li><a class="logo-container" href="./admin.php"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
        <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
        <li class="dropdown" style="float:right">
          <a href="javascript:void(0)" class="dropbtn">
          <?php 
            if(isset($_SESSION["Username"])) echo $_SESSION["Username"];
            else echo "Có lỗi xảy ra"
            ?>
          </a>
          <div class="dropdown-content">
            <a href="adminChangePassword.php">Đổi mật khẩu</a>
            <a href="../../action/logout.php">Đăng xuất</a>
          </div>
        </li>
      </ul>

      <div class="container">
        <div class="guide-row">
          <div class="button-container">
            <a href="adminManageExam.php" class="slideButton btn1"><span>Quản lý lịch thi</span></a>
          </div>
          <div class="button-container">
            <a href="#" class="slideButton btn2"><span>Chỉnh sửa lịch thi</span></a>
          </div> 
        </div>
        <div class="guide-row">
          <div class="button-container">
            <a href="adminListStudent.php" class="slideButton btn3"><span>Xem danh sách thí sinh</span></a>
          </div>
          <div class="button-container">
            <a href="statistics.php" class="slideButton btn4"><span>Thống kê số lượng thí sinh</span></a>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="../../js/admin/admin.js"></script>
<script src="../../js/sideNavBar.js"></script>
</html>