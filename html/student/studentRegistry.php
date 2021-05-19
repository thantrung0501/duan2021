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

  <div class="container w3-global-font">
    <div class="wrapper clearfix">
      <div class="header w3-green w3-row">
        <div class="w3-col m5 l4">
          <h3>Đợt 1 năm 2021</h3>
        </div>
        <div class="w3-col m7 l8">
          <p class="timestamp"><img src="../../images/Time-long-icon.svg" alt="clock"> 24:00 dd/mm/yyyy</p>
        </div>
      </div>
      <div class="schedule-container">
        <form>
          <table class="w3-table-all w3-striped w3-hoverable">
            <tr>
              <th style="width:5%">STT</th>
              <th style="width:33%">Địa điểm</th>
              <th style="width:22%">Ngày thi</th>
              <th style="width:15%">Ca thi</th>
              <th style="width:20%">Số lượng</th>
              <th style="width:5%">ĐK</th>
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
          <div class="button-shelf">
            <button type="reset" class="w3-button w3-red w3-ripple">Hủy</button>
            <button type="submit" class="w3-button w3-green w3-ripple" id="cfBtn">Xác nhận</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="../../js/student/studentRegistry.js"></script>
</html>