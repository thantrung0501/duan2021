<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/admin/adminListStudent.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Danh sách thí sinh đăng ký</title>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="#">Mở đăng ký thi</a>
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="statistics.php">Thống kê lượt đăng ký</a>
    </div>
    <div id="main" class="main">
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

      <div class="container">
          <h1 style="text-align: center; font-family: Verdana, Geneva, Tahoma, sans-serif">Danh sách thí sinh đã đăng ký</h1>
          <table>
            <tr>
              <td style="width: 30%">
                <label for="year">Năm:</label>
                <select name="year" id="year"></select>
                <label for="month">Tháng:</label>
                <select name="month" id="month"></select>
              </td>
              <td  style="width: 70%">
                <button type="button" id="sbbtn" name="sbbtn" class="sbbtn">Truy vấn</button>
              </td> 
            </tr>
            <tr>
              <td colspan="3">
                <ul id="participantList" class="list"></ul>
              </td>
            </tr>
          </table>
      </div>

    </div>
</body>

<script src="../../js/sideNavBar.js"></script>
<script src="../../js/admin/adminListStudent.js"></script>
</html>