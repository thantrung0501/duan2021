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
    <link rel="stylesheet" href="../../css/admin/adminListStudent.css">
    <link rel="stylesheet" href="../../css/topNavBar.css">
    <link rel="stylesheet" href="../../css/sideNavBar.css">
    <title>Danh sách thí sinh đăng ký</title>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="#">Chỉnh sửa lịch thi</a>
      <a href="#">Mở đăng ký thi</a>
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

      <div class="container">
        <h2>Danh sách người đăng ký</h2>
          <div class="month1">
            <h4>Tháng 1</h4>

            <form>
              <table>
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên thí sinh</th>
                    <th>Thời gian đăng ký</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </form>
        </div>

        <div class="month2">
              <h4>Tháng 2</h4>

              <form>
                <table>
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên thí sinh</th>
                      <th>Thời gian đăng ký</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  <tr>
                      <td>2</td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </form>
          </div>

          <div class="month3">
                <h4>Tháng 3</h4>

                <form>
                  <table>
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên thí sinh</th>
                        <th>Thời gian đăng ký</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
          </div>
      </div>

    </div>
</body>

<script src="../../js/sideNavBar.js"></script></html>