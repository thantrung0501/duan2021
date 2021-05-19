<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <link rel="stylesheet" href="../../css/student/entranceExaminationPaper.css">
  <link rel="stylesheet" href="../../css/topNavBar.css">
	<title>Giấy báo dự thi</title>
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
        <a href="studentChangeProfile.php">Cập nhật thông tin</a>
        <a href="entranceExaminationPaper.php">Xem giấy báo dự thi</a>
        <a href="studentChangePassword.php">Đổi mật khẩu</a>
        <a href="../../action/logout.php">Đăng xuất</a>
      </div>
    </li>
  </ul>
  <div class="container">
    <button class="sidebtn pdf-btn" id="export">PDF</button>
    <button class="sidebtn pay-btn"><img src="../../images/coin-dollar.svg" alt="Coin"></button>
    <div class="warrning-container">
      <img src="../../images/alert.png" alt="warrning">
      <div>Giấy báo dự thi có thể không có hiệu lực nếu bạn chưa điền đủ thông tin cá nhân trong phần hồ sơ.</div> 
    </div>
    <div class="paper" id="paper-content">
      <div class="paperHeader">
        <div>ĐẠI HỌC QUỐC GIA THÀNH PHỐ HÀ NỘI</div>
        <div><strong>TRUNG TÂM KHẢO THÍ VÀ ĐÁNH GIÁ CHẤT LƯỢNG ĐÀO TẠO</strong></div>
      </div>
      
      <div class="paperName">
        <div><strong>GIẤY BÁO DỰ THI</strong></div>
        <div><strong>KỲ THI ĐÁNH GIÁ NĂNG LỰC ĐHQGHN</strong></div>
      </div>

      <div class="info-block exam">
        <h3>THÔNG TIN DỰ THI</h3>
        <div class="info-row">
          <label for="id">Số báo danh:</label><div id="id"></div>
        </div>
        <div class="info-row">
          <label for="examDate">Ngày giờ thi:</label><div id="examDate"></div>
        </div>
        <div class="info-row">
          <label for="examPlace">Địa điểm thi:</label><div id="examPlace"></div>
        </div>
        <div class="info-row">
          <label for="room">Phòng thi:</label><div id="room"></div>
        </div>
        <div class="info-row">
          <label for="registryCode">Mã đăng ký:</label><div id="registryCode"></div>
        </div>
      </div>
      
      <p class="notice">Thí sinh phải có mặt trước giờ thi 30 phút. <br>
      Thí sinh phải mang theo giấy báo dự thi (bản in từ trang web đăng ký hoặc bản nhận được qua bưu điện) và Chứng mình nhân dân/Căn cước công dân/Hộ chiếu.
      </p>

      <div class="info-block personal">
        <h3>THÔNG TIN CÁ NHÂN</h3>
        <div class="info-row">
          <label for="name">Họ và tên thí sinh:</label><div id="name"><strong></strong></div>
        </div>
        <div class="info-row">
          <label for="birthday">Ngày, tháng, năm sinh:</label><div id="birthday"></div>
          <label for="placeOfBirth" class="label2">Nơi sinh:</label><div id="placeOfBirth"></div>
        </div>
        <div class="info-row">
          <label for="gender">Giới tính:</label><div id="gender"></div>
        </div>
        <div class="info-row">
          <label for="cmnd">Số CMND/Căn cước công dân:</label><div id="cmnd"></div>
        </div>
      </div>

      <div class="info-block contract">
        <h3>THÔNG TIN LIÊN LẠC</h3>
        <div class="info-row">
          <label for="name2">Họ và tên thí sinh:</label><div id="name2"><strong></strong></div>
        </div>
        <div class="info-row">
          <label for="address">Địa chỉ liên lạc:</label><div id="cmnd"></div>
        </div>
        <div class="info-row">
          <label for="phone">Số điện thoại:</label><div id="phone"></div>
        </div>
        <div class="info-row">
          <label for="email">Email:</label><div id="email"></div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="../../js/student/entranceExaminationPaper.js"></script>
</html>