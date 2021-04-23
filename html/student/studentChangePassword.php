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
      <div class="form-container">
        <form id="pwform" name="pwform" action="">
          <table>
            <tr>
              <td><label for="oldpw">Mật khẩu cũ:</label></td>
              <td><input type="password" name="oldpw" id="oldpw"></td>
            </tr>
            <tr>
              <td><label for="newpw">Mật khẩu mới:</label></td>
              <td><input type="password" name="newpw" id="newpw"></td>
            </tr>
            <tr>
              <td><label for="renewpw">Nhập lại mật khẩu mới:</label></td>
              <td><input type="password" name="renewpw" id="renewpw"></td>
            </tr>
            <tr>
              <td colspan="2">
                <button type="reset" name="rsbtn" id="rsbtn" class="rsbtn">Hủy</button>
                <button type="submit" name="savebtn" id="savebtn" class="savebtn">Lưu</button> 
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </body>
  <script src="../../js/student/studentChangePassword.js"></script>
</html>