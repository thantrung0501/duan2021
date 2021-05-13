<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="../../js/serializeJSONPlugin.js"></script>
    <link rel="stylesheet" href="../../css/student/studentChangePassword.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
  </head>
  <body>
  <?php if(isset($_SESSION["notice"])){
		echo '<script>  alert("'.$_SESSION["notice"].'");</script>';
		unset($_SESSION["notice"]);	
	}  
	?>
    <!-- Side Bar -->
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="adminOpened.php">Mở đăng ký thi</a>
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="statistics.php">Thống kê lượt đăng ký</a>
    </div>

    <div id="main" class="main">
      <!-- Top Navigation Bar -->
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
        <div class="form-container">
          <form id="pwform" name="pwform" action="../../action/center_student/ChangePassword.php" method="POST">
            <div class="form-element">
              <label for="oldpw">Mật khẩu cũ:</label>
              <input type="password" name="passwordOld" id="oldpw">
            </div>
            <div class="form-element">
                <label for="newpw">Mật khẩu mới:</label>  
                <input type="password" name="passwordNew" id="newpw">
            </div>
            <div class="form-element">
                <label for="renewpw">Nhập lại mật khẩu mới:</label>
                <input type="password" name="rePassword" id="renewpw">
            </div>
            <div class="form-element">
                <button type="submit" name="submit" id="savebtn" class="savebtn" onclick="return validateForm()">Lưu</button> 
                <button type="reset" name="rsbtn" id="rsbtn" class="rsbtn">Hủy</button>
            </div>        
          </form>
        </div>
      </div>
    </div>
</body>
  <script src="../../js/student/studentChangePassword.js"></script>
  <script src="../../js/sideNavBar.js"></script>
</html>