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
  </head>
  <body>
  <?php if(isset($_SESSION["notice"])){
		echo '<script>  alert("'.$_SESSION["notice"].'");</script>';
		unset($_SESSION["notice"]);	
	}  
	?>
    <ul class="navbar">
      <li><a class="logo-container" href="./studentHomepage.php"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
      <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
      <li class="dropdown" style="float:right">
        <a href="javascript:void(0)" class="dropbtn">
        <?php 
        if(isset($_SESSION["Username"])) echo $_SESSION["Username"];
        else echo "Có lỗi xảy ra";
        ?>
        </a>
        <div class="dropdown-content">
          <a href="studentChangePassword.php">Đổi mật khẩu</a>
          <a href="studentChangeProfile.php">Cập nhật thông tin</a>
          <a href="entranceExaminationPaper.php">Xem giấy báo dự thi</a>
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
  </body>
  <script src="../../js/student/studentChangePassword.js"></script>
</html>