<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../../css/admin/statistics.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Thống kê</title>
  </head>
  <body>
    <!-- Sidebar -->
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="#">Mở đăng ký thi</a>
      <a href="#">Hồ sơ người đăng ký</a>
      <a href="#">Thống kê lượt đăng ký</a>
    </div>

    
    <div id="main" class="main">
      <!-- Topbar -->
      <ul class="navbar">
        <li><button class="side-bar-toggle" id="sideBarBtn">&#9776;</button></li>
        <li><a class="logo-container" href="./admin.html"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
        <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
        <li class="dropdown" style="float:right">
          <a href="javascript:void(0)" class="dropbtn">
          <?php 
            if(isset($_SESSION["user"])) echo $_SESSION["user"];
            else echo "Có lỗi xảy ra"
            ?>
          </a>
          <div class="dropdown-content">
            <a href="#">Đổi mật khẩu</a>
            <a href="#">Đăng xuất</a>
          </div>
        </li>
      </ul>

      <!-- Menubar -->
      <ul class="menu-bar">
        <li><h3>Tham số</h3></li>
        <li>
          <div>
              <label for="from">Từ:</label>
                <select name="from" id="from">
                </select>
                <label style="margin-left: 10px;" for="to">Đến:</label>
                <select name="to" id="to">
                </select>
            </div>  
        </li>
        
        <li><a>Tỉnh/Thành phố</a></li>
        <li><a>Khu vực</a></li>
        <li><a>Đối tượng ưu tiên</a></li>
        <li><a>Tình trạng học tập</a></li>
        <li><a id="combiQuery">Tổ hợp điểm</a></li>
        <li><a id="averQuery">Trung bình học tập</a></li>
        <li><a>Trạng thái hồ sơ</a></li>
      </ul>

      <!-- ContentPage -->
      <div class="container">
        <div class="chart-container">
          <div id="chart_div"></div>
        </div>
      </div>
    </div>

    <!-- The Modal -->

    <div id="pointCombination" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-main">
        <h1>Tham số bổ sung</h1>
        <form action="">
          <div>
            <label class="inputLabel" for="combiSum">Tổng điểm:</label>
            <input type="number" name="combiSum" id="combiSum" step=0.01>
          </div>
          <table>
            <tr>
              <td>
                <label  class="box">Toán
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
                </label>
              </td>
              <td>
                <label  class="box">Văn
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label>
              </td>
              <td>
                <label  class="box">Ngoại ngữ
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label>
              </td>
            </tr>
            <tr>
              <td><label  class="box">Lý
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label></td>
              <td><label  class="box">Hóa
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label></td>
              <td><label  class="box">Sinh
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label></td>
            </tr>
            <tr>
              <td><label  class="box">Sử
                <input type="checkbox" name="pick" > 
                <span class="checkmark"></span>
              </label></td>
              <td><label  class="box">Địa
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label></td>
              <td><label  class="box">GDCD
                <input type="checkbox" name="pick" >
                <span class="checkmark"></span>
              </label></td>
            </tr>
          </table>
          <div>
            <button class="cancel-btn" id="cancelBtn1">Hủy</button>
            <button class="query-btn" id="queryBtn1">Truy vấn</button>
          <div>
        </form>
        </div> 
      </div>
    </div>

    <div id="pointAverage" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Tham số bổ sung</h1>
        <form action="">
          <div>
            <label class="inputLabel" for="combiSum">Tổng điểm:</label>
            <input type="number" name="combiSum" id="combiSum">
          </div>
          <div>
            <button class="cancel-btn" id="cancelBtn2">Hủy</button>
            <button class="query-btn" id="queryBtn2">Truy vấn</button>
          <div>  
        </form>
      </div>
    </div>
  </body>
  <script src="../../js/sideNavBar.js"></script>
  <script src="../../js/admin/statistics.js"></script>
</html>