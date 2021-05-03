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
      <a href="adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="statistics.php">Thống kê lượt đăng ký</a>
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
            <a href="#">Đổi mật khẩu</a>
            <a href="../../action/logout.php">Đăng xuất</a>
          </div>
        </li>
      </ul>

      <div class="container">
        <form>
          <label for="">Danh sách đăng ký:</label>
          <select name="month">
            <option value="january">Tháng 1</option>
            <option value="february">Tháng 2</option>
            <option value="march">Tháng 3</option>
            <option value="aprial">Tháng 4</option>
            <option value="may">Tháng 5</option>
            <option value="june">Tháng 6</option>         
            <option value="july">Tháng 7</option>
            <option value="august">Tháng 8</option>
            <option value="september">Tháng 9</option>
            <option value="october">Tháng 10</option>
            <option value="november">Tháng 11</option>
            <option value="december">Tháng 12</option>

          </select>
          <select name="year">
            <option value="2019">Năm 2019</option>
            <option value="2020">Năm 2020</option>
            <option value="2021">Năm 2021</option>

          </select>

          <button class="search" id="search">Tìm kiếm</button>
        </form>
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

<script src="../../js/sideNavBar.js"></script>
<script src="../../js/admin/adminListStudent.js"></script>
</html>