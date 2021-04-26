<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/student/entranceExaminationPaper.css">
  <link rel="stylesheet" href="../../css/topNavBar.css">
	<title>Giấy báo dự thi</title>
</head>
<body>
  <ul class="navbar">
    <li><a class="logo-container" href="./studentHomepage.php"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
    <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
    <li class="dropdown" style="float:right">
      <a href="javascript:void(0)" class="dropbtn">Student</a>
      <div class="dropdown-content">
        <a href="./studentChangePassword.php">Đổi mật khẩu</a>
        <a href="./studentChangeProfile.php">Cập nhật thông tin</a>
        <a href="./entranceExaminationPaper.php">Xem giấy báo dự thi</a>
      </div>
    </li>
  </ul>
  <div class="container">
    <table class="exam">
      <tr><th colspan="4">THÔNG TIN DỰ THI</th></tr>
      <tr>
        <td style="width: 10%">UID:</td>
        <td style="width: 40%">123456789</td>
      </tr>
      <tr>
        <td>Ngày thi:</td>
        <td>1/1/2021</td>
        <td style="width: 8%">Ca thi:</td>
        <td style="width: 42%">Sáng(08:00)</td>
      </tr>
      <tr>
        <td>Địa điểm:</td>
        <td>Trung tâm ABC</td>
      </tr>
    </table>
    <table class="personal">
      <tr><th colspan="4">THÔNG TIN CÁ NHÂN</th></tr>
      <tr>
        <td style="width: 30%">Họ, chữ đệm và tên:</td>
        <td style="width: 35%">Đặng Văn A</td>
        <td style="width: 9%">Giới tính:</td>
        <td style="width: 26%">Nam</td>
      </tr>
      <tr>
        <td>Ngày sinh:</td>
        <td>2/6/2004</td>
        <td>Dân tộc:</td>
        <td>Kinh</td>
      </tr>
      <tr>
        <td>CMND/CCCD:</td>
        <td>0012224445566</td>
      </tr>
      <tr>
        <td>Hộ khẩu thường trú (Huyện - Tỉnh):</td>
        <td>Đông Anh, Hà Nội</td>
        <td>Nơi sinh:</td>
        <td>Hà Nội</td>
      </tr>
    </table>
    <table class="contact">
      <tr><th colspan="2">THÔNG TIN LIÊN HỆ</th></tr>
      <tr>
        <td style="width: 15%;">Địa chỉ email:</td>
        <td style="width: 85%;">dangvana2605@gmail.com</td>
      </tr>
      <tr>
        <td>Số điện thoại:</td>
        <td>0913456733</td>
      </tr>
      <tr>
        <td>Địa chỉ (cụ thể):</td>
        <td>Số 134, Cầu Giấy, phường Quan Hoa, quận Cầu Giấy, thành phố Hà Nội</td>
      </tr>
    </table>
    <table class="evaluate">
      <tr><th colspan="4">THÔNG TIN PHỤC VỤ THI ĐGNL</th></tr>
      <tr>
        <td style="width: 25%">Đội tượng ưu tiên:</td>
        <td style="width: 18%;">Có ưu tiên</td>
        <td style="width: 10%;">Khu vực:</td>
        <td style="width: 47%;">KV1</td>
      </tr>
      <tr><td>Trung bình chung học tập:</td></tr>
      <tr>
        <table class="final-score">
          <tr>
            <th colspan="3">Lớp 10</th>
            <th colspan="3">Lớp 11</th>
            <th colspan="3">Lớp 12</th>
          </tr>
          <tr>
            <td>HKI</td>
            <td>HKII</td>
            <td>Cả năm</td>
            <td>HKI</td>
            <td>HKII</td>
            <td>Cả năm</td>
            <td>HKI</td>
            <td>HKII</td>
            <td>Cả năm</td>
          </tr>
          <tr>
            <td>9</td>
            <td>10</td>
            <td>9.5</td>
            <td>8</td>
            <td>10</td>
            <td>9</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
          </tr>
        </tr>
      </table>
    </table>
    <table class="graduation">
      <tr><th colspan="2">THÔNG TIN TỐT NGHIỆP</th></tr>
      <tr>
        <td style="width: 50%;">Năm tốt nghiệp THPT:</td>
        <td style="width: 50%;">2022</td>
      </tr>
      <tr><td>Kết quả tốt nghiệp THPT:</td></tr>
      <tr>
        <table class="final-score">
          <tr>
            <td>Toán</td>
            <td>Văn</td>
            <td>Ngoại ngữ</td>
            <td>Lý</td>
            <td>Hóa</td>
            <td>Sinh</td>
            <td>Sử</td>
            <td>Địa</td>
            <td>GDCD</td>
          </tr>
          <tr>
            <td>10</td>
            <td>9</td>
            <td>9</td>
            <td>8.5</td>
            <td>10</td>
            <td>9</td>
            <td>10</td>
            <td>9.5</td>
            <td>10</td>
          </tr>
        </table>
      </tr>
    </table>
  </div>
</body>
<script src="../../js/student"></script>
</html>