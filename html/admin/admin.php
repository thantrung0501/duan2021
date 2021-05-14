<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/w3.css">
    <link rel="stylesheet" href="../../css/admin/admin.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Quản lí ca thi</title>
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
      <div class="table-container w3-card-4 top-rounded">
        <div class="w3-green top-rounded table-header clearfix">
          <h3>Đợt 1 năm 2021</h3>
          <a href="" class="config-btn"><img src="../../images/config.svg" alt="Sửa"></a>
          <div class="openForm" id="openForm">
            <form>
              <label for="from">Từ: </label>
              <input type="date" name="openFrom" id="from">
              <label for="to">Đến: </label>
              <input type="date" name="openTo" id="to">
              <button type="submit" class="mybutton" id="openRegistry" name="openRegistry">Mở đăng ký</button>
            </form>
          </div>
          <div class="afterOpen" id="afterOpen"><div>dd/mm/yyyy - dd/mm/yyyy</div><button class="mybutton" id="closeRegistry">Đóng ngay</button></div>
        </div>
        <table class="w3-table-all w3-hoverable w3-striped">
            <tr>
              <th style="width:5%">STT</th>
              <th style="width:35%">Địa điểm</th>
              <th style="width:24%">Ngày thi</th>
              <th style="width:18%">Ca thi</th>
              <th style="width:15%">Số lượng</th>
              <th style="width:3%">DS</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="../admin/admin_print.html" class="btn-link">
                  <img src="../../images/export.svg" alt="In">
                </a>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="../admin/admin_print.html" class="btn-link">
                  <img src="../../images/export.svg" alt="In">
                </a>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>   
              <td></td>
              <td></td>
              <td>
                <a href="../admin/admin_print.html" class="btn-link">
                  <img src="../../images/export.svg" alt="In">
                </a>
              </td>
            </tr>
        </table> 
      </div>
    </div> 
</div>
</body>
<script src="../../js/admin/admin.js"></script>
<script src="../../js/sideNavBar.js"></script>
</html>