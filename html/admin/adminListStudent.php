<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/w3.css">
    <link rel="stylesheet" href="../../css/admin/adminListStudent.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Danh sách thí sinh đăng ký</title>
  </head>
  <body>
    <!-- Side Bar -->
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="#">Mở đăng ký thi</a>
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="statistics.php">Thống kê lượt đăng ký</a>
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
            <a href="#">Đổi mật khẩu</a>
            <a href="../../action/logout.php">Đăng xuất</a>
          </div>
        </li>
      </ul>

      <!-- Folder Bar -->
      <div id="folder" class="w3-sidebar w3-bar-block w3-light-grey w3-card w3-global-font" style="width:15vw;">
        <h3 class="w3-bar-item">Mục lục</h3>
      </div>

      <!-- Card Area -->
      <div class="w3-container w3-global-font" style="margin-left:15vw">
        <div id="participantList"></div>
      </div>
    </div>
</body>

<script src="../../js/sideNavBar.js"></script>
<script src="../../js/admin/adminListStudent.js"></script>
</html>