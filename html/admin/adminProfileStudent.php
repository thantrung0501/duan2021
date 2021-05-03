<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../../css/admin/adminProfileStudent.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Thông tin người đăng ký</title>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="adminOpen.php">Mở đăng ký thi</a>
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="Statistics.php">Thống kê lượt đăng ký</a>
    </div>
    <div id="main" class="main">
      <ul class="navbar">
        <li><button class="side-bar-toggle" id="sideBarBtn">&#9776;</button></li>
        <li><a class="logo-container" href="./admin.html"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
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

    <table class="personal">
      <tr><th colspan="4">THÔNG TIN CÁ NHÂN</th></tr>
      <tr>
        <td style="width: 30%">Họ, chữ đệm và tên:</td>
        <td style="width: 35%"></td>
        <td style="width: 9%">Giới tính:</td>
        <td style="width: 26%"></td>
      </tr>
      <tr>
        <td>Ngày sinh:</td>
        <td></td>
        <td>Dân tộc:</td>
        <td></td>
      </tr>
      <tr>
        <td>CMND/CCCD:</td>
        <td></td>
      </tr>
      <tr>
        <td>Hộ khẩu thường trú (Huyện - Tỉnh):</td>
        <td></td>
        <td>Nơi sinh:</td>
        <td></td>
      </tr>
    </table>

    <table class="contact">
      <tr><th colspan="2">THÔNG TIN LIÊN HỆ</th></tr>
      <tr>
        <td style="width: 15%;">Địa chỉ email:</td>
        <td style="width: 85%;"></td>
      </tr>
      <tr>
        <td>Số điện thoại:</td>
        <td></td>
      </tr>
      <tr>
        <td>Địa chỉ (cụ thể):</td>
        <td></td>
      </tr>
    </table>

    <table class="evaluate">
      <tr><th colspan="4">THÔNG TIN PHỤC VỤ THI ĐGNL</th></tr>
      <tr>
        <td style="width: 25%">Đội tượng ưu tiên:</td>
        <td style="width: 18%;"></td>
        <td style="width: 10%;">Khu vực:</td>
        <td style="width: 47%;"></td>
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
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tr>
      </table>
    </table>
    <table class="graduation">
      <tr><th colspan="2">THÔNG TIN TỐT NGHIỆP</th></tr>
      <tr>
        <td style="width: 50%;">Năm tốt nghiệp THPT:</td>
        <td style="width: 50%;"></td>
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
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </tr>
    </table>
</div>

</body>

<script src="../../js/sideNavBar.js"></script>

</html>