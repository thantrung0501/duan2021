<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../../css/admin/adminWriteNotice.css">
    <link rel="stylesheet" href="../../css/w3.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Viết thông báo</title>
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

      <div class="container w3-global-font">
        <div class="form-container">
          <h1 class="w3-text-indigo">Thông báo</h1>
          <form action="">
            <div class="form-element">
              <label for="title">Tiêu đề</label>
              <input type="text" id="title">
            </div>
            <div class="form-element">
              <textarea name="content" id="content"></textarea>
            </div> 
            <div class="form-element">
              <button type="reset" class="w3-button w3-red w3-right w3-ripple">Hủy</button>
              <button type="button" class="w3-button w3-green w3-right w3-ripple" onclick="noticeSubmitHandler()">Đăng tải</button>
            </div> 
          </form>
        </div>
        <div class="horizon"></div>
        <div class="form-container place-to-pay">
          <h1 class="w3-text-indigo">Địa điểm thanh toán</h1>
          <div class="form-element">
            <textarea id="payPlace" name="payPlace"></textarea>
          </div>
          <div class="form-element">
            <button type="reset" class="w3-button w3-red w3-right w3-ripple">Hủy</button>
            <button type="button" class="w3-button w3-green w3-right w3-ripple">Lưu thay đổi</button>
          </div>   
        </div>
      </div>
    </div>
</body>
<script src="../../js/admin/adminWriteNotice.js"></script>
<script src="../../js/sideNavBar.js"></script>
</html>