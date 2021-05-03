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
    <link rel="stylesheet" href="../../css/admin/adminChange.css">
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
            if(isset($_SESSION["user"])) echo $_SESSION["user"];
            else echo "Có lỗi xảy ra"
            ?>
          </a>
          <div class="dropdown-content">
            <a href="#">Đổi mật khẩu</a>
          </div>
        </li>
      </ul>

      <button class="side-bar-toggle" id="sideBarBtn">&#9776;</button>

    <table class="table table-bordered table-hover" id="tblSample">
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
                <td><input type="text" id="address" name="address"></td>
                <td><input type="text" id="date" name="date"></td>
                <td><input type="text" id="poetry" name="poetry"></td>
                <td><input type="text" id="time" name="time"></td>
                <td><input type="text" id="number" name="number"></td>
                <td>
                    <a href="#" class="btn-link">
                        <img src="../../images/common/printer.png" width="30px" height="30px">
                    </a>
                </td>
                <td><input type="checkbox" name="selcet"></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td><input type="text" id="address" name="address"></td>
                <td><input type="text" id="date" name="date"></td>
                <td><input type="text" id="poetry" name="poetry"></td>
                <td><input type="text" id="time" name="time"></td>
                <td><input type="text" id="number" name="number"></td>
                <td>
                    <a href="#" class="btn-link">
                        <img src="../../images/common/printer.png" width="30px" height="30px">
                    </a>
                </td>
                <td><input type="checkbox" name="selcet"></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td><input type="text" id="address" name="address"></td>
                <td><input type="text" id="date" name="date"></td>
                <td><input type="text" id="poetry" name="poetry"></td>
                <td><input type="text" id="time" name="time"></td>
                <td><input type="text" id="number" name="number"></td>
                <td>
                    <a href="#" class="btn-link">
                        <img src="../../images/common/printer.png" width="30px" height="30px">
                    </a>
                </td>
                <td><input type="checkbox" name="selcet"></td>
            </tr>
        </tbody>
    </table>
    <div class="add">
        <button onclick="add('tblSample')" class="btn-primary" id="addInfor">
    <img src="../../images/common/add.jpg" width="30px" height="30px">
  </button>
    </div>

    <div class="change">
        <button type="button" id="btnSuccess">Xác nhận</button>
        <button type="button" id="btnCancel">Hủy</button>
    </div>



</body>

<script src="../../js/sideNavBar.js"></script>

<script>
	function add(myTable){
 var table = document.getElementById(myTable);
//var row = document.getElementById("myTable");
var row = table.getElementsByTagName('tr');
var row = row[row.length-1].outerHTML;
table.innerHTML = table.innerHTML + row;
var row = table.getElementsByTagName('tr');
    var row = row[row.length-1].getElementsByTagName('td');
    for(i=0; i<row.length; i++) {
        row[i].innerHTML = '';
    } 
}
</script>
</html>
