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
    <link rel="stylesheet" href="../../css/admin/adminPrint.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Trang chủ admin</title>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="../../html/admin/adminOpen.php">Mở đăng ký thi</a>
      <a href="#">Hồ sơ người đăng ký</a>
      <a href="#">Thống kê lượt đăng ký</a>
    </div>
    <div id="main" class="main">
      <ul class="navbar">
        <!--<li><button class="side-bar-toggle" id="sideBarBtn">&#9776;</button></li>-->
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
          </div>
        </li>
      </ul>

      <button class="side-bar-toggle" id="sideBarBtn">&#9776;</button>

    <h3 class="list">Danh sách thí sinh</h3>
    <div class="list-group">
        <h5>Địa điểm:</h5>
        <h5>Ngày thi:</h5>
        <h5>Ca thi:</h5>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ tên thí sinh</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Ký tên</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>


            </tr>
            <tr>
                <th scope="row">2</th>
                <td></td>
                <td></td>
                <td></td>


            </tr>
            <tr>
                <th scope="row">3</th>
                <td></td>
                <td></td>
                <td></td>


            </tr>
        </tbody>
    </table>

    <div class="bt-print">
        <button class="btn btn-success">In(PDF)</button>
        <button class="btn btn-light">Quay lại</button>
    </div>

</body>
<script src="../../js/sideNavBar.js"></script>
</html>