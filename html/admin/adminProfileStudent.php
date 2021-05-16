<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/admin/adminProfileStudent.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Thông tin người đăng ký</title>
  </head>
  <body>
  <?php 
    if(isset($_SESSION["AccountID"])){
      if($_SESSION["AccountType"]!=1) header("location: ../student/studentHomepage.php");
    }else{
      header("location: ../signin.php");
    }
  ?>
    <div id="mySidenav" class="sidenav">
      <a href="adminManageExam.php">Quản lí lịch thi</a>
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="Statistics.php">Thống kê lượt đăng ký</a>
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
            <a href="adminChangePassword.php">Đổi mật khẩu</a>
            <a href="../../action/logout.php">Đăng xuất</a>
          </div>
        </li>
      </ul>
  <div class="container">
    <a href="adminListStudent.php">Quay lại</a>
    <table class="infoTable">
      <tr><th colspan="4">THÔNG TIN CÁ NHÂN</th></tr>
      <tr>
        <td style="width: 25%">Họ, chữ đệm và tên:</td>
        <td style="width: 28%"><p id="fullName"></p></td>
        <td style="width: 9%">Giới tính:</td>
        <td style="width: 38%"><p id="gender"></p></td>
      </tr>
      <tr>
        <td>Ngày sinh:</td>
        <td><p id="birthday"></p></td>
        <td>Dân tộc:</td>
        <td><p id="nation"></p></td>
      </tr>
      <tr>
        <td>CMND/CCCD:</td>
        <td colspan="3"><p id="CMND"></p></td>
      </tr>
      <tr>
        <td>Hộ khẩu thường trú (Huyện - Tỉnh):</td>
        <td><p id="residence"></p></td>
        <td>Nơi sinh:</td>
        <td><p id="placeOfBirth"></p></td>
      </tr>
    </table>

    <table class="infoTable">
      <tr><th colspan="2">THÔNG TIN LIÊN HỆ</th></tr>
      <tr>
        <td style="width: 15%;">Địa chỉ email:</td>
        <td style="width: 85%;"><p id="email"></p></td>
      </tr>
      <tr>
        <td>Số điện thoại:</td>
        <td><p id="phone"></p></td>
      </tr>
      <tr>
        <td>Địa chỉ (cụ thể):</td>
        <td><p id="address"></p></td>
      </tr>
    </table>

    <table class="infoTable">
      <tr><th colspan="4">THÔNG TIN PHỤC VỤ THI ĐGNL</th></tr>
      <tr>
        <td style="width: 18%">Đội tượng ưu tiên:</td>
        <td style="width: 20%;"><p id="priority"></p></td>
        <td style="width: 9%;">Khu vực:</td>
        <td style="width: 53%;"><p id="area"></p></td>
      </tr>
      <tr><td colspan="4">Trung bình chung học tập:</td></tr>
      <tr>
        <td colspan="4">
          <div>
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
                <td><p id="hk1L10"></p></td>
                <td><p id="hk2L10"></p></td>
                <td><p id="l10"></p></td>
                <td><p id="hk1L11"></p></td>
                <td><p id="hk2L11"></p></td>
                <td><p id="l11"></p></td>
                <td><p id="hk1L12"></p></td>
                <td><p id="hk2L12"></p></td>
                <td><p id="l12"></p></td>
              </tr>
            </table>
          </div> 
        </td>
      </tr>
    </table>

    <table class="infoTable">
      <tr><th colspan="2">THÔNG TIN TỐT NGHIỆP</th></tr>
      <tr>
        <td style="width: 25%;">Năm tốt nghiệp THPT:</td>
        <td style="width: 75%;"><p id="gradYear"></p></td>
      </tr>
      <tr><td colspan="2">Kết quả tốt nghiệp THPT:</td></tr>
      <tr>
        <td colspan="2">
          <div>
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
                <td><p id="math"></p></td>
                <td><p id="liter"></p></td>
                <td><p id="eng"></p></td>
                <td><p id="physic"></p></td>
                <td><p id="chem"></p></td>
                <td><p id="bio"></p></td>
                <td><p id="his"></p></td>
                <td><p id="geo"></p></td>
                <td><p id="GDCD"></p></td>
              </tr>
            </table>
          </div>
        </td>  
      </tr>
    </table>
  </div>    
</div>

</body>
<script src="../../js/admin/adminProfileStudent.js"></script>
<script src="../../js/sideNavBar.js"></script>

</html>
