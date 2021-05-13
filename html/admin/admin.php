<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/admin/admin.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Trang chủ admin</title>
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
            <a href="adminChangePassword.php">Đổi mật khẩu</a>
            <a href="../../action/logout.php">Đăng xuất</a>
          </div>
        </li>
      </ul>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Ngày thi</th>
                <th scope="col">Ca thi</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Số lượng</th>
                <th scope="col">DS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="../admin/admin_print.html" class="btn-link">
                        <img src="../../images/common/printer.png" width="30px" height="30px">
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="../admin/admin_print.html" class="btn-link">
                        <img src="../../images/common/printer.png" width="30px" height="30px">
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="../admin/admin_print.html" class="btn-link">
                        <img src="../../images/common/printer.png" width="30px" height="30px">
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

</div>

</body>

<script src="../../js/sideNavBar.js"></script>

</html>