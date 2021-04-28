<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../../js/serializeJSONPlugin.js"></script>
  <link rel="stylesheet" href="../../css/student/studentHomepage.css">
  <link rel="stylesheet" href="../../css/topNavBar.css">
	<title>Trang chủ</title>
</head>
<body>
  <ul class="navbar">
    <li><a class="logo-container" href="./studentHomepage.php"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
    <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
    <li class="dropdown" style="float:right">
      <a href="javascript:void(0)" class="dropbtn">
      <?php 
      if(isset($_SESSION["user"])) echo $_SESSION["user"];
      else echo "Có lỗi xảy ra"
      ?>
      </a>
      <div class="dropdown-content">
        <a href="./studentChangePassword.php">Đổi mật khẩu</a>
        <a href="./studentChangeProfile.php">Cập nhật thông tin</a>
        <a href="./entranceExaminationPaper.php">Xem giấy báo dự thi</a>
      </div>
    </li>
  </ul>

  <div class="container">
    <div class="time-stamp">
      <img src="../../images/common/clock.png" />
      <p><strong>Hệ thống mở đăng ký đến 24:00 ngày</strong></p>
    </div>
    <div class="schedule-container">
      <form>
        <table>
          <tr>
            <th class="odn">STT</th>
            <th class="place">Địa điểm</th>
            <th class="exam-date">Ngày thi</th>
            <th class="exam-shift">Ca thi</th>
            <th class="amount">Số lượng</th>
            <th class="registry">ĐK</th>
          </tr>
          <tr>
            <td>1</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="radio" id="1" name="registry" value="1"/></td>
          </tr>
          <tr>
            <td>2</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="radio" id="2" name="registry" value="2"/></td>
          </tr>
        </table>
        <button type="reset" class="cancel-btn">Hủy</button>
        <button type="submit" class="cf-btn" id="cfBtn">Xác nhận</button>
      </form>
    </div>
  </div>
  <!-- The Modal -->
  <div id="cfModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Đăng ký thành công</h1>
    <div>
    <button class="exit-btn" id="exitBtn">Thoát</button>
    <button class="ok-btn" id="okBtn">OK</button>
    <div>
  </div>
  </div>
</body>
<script src="../../js/student/studentHomePage.js"></script>
</html>