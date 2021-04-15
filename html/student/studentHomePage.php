<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
body {
  margin: 0;
}

ul.navbar {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #219653;
}

li {
  float: left;
}

li a, .dropbtn {
  display: block;
  color: white;
  text-align: center;
  padding: 16px 16px;
  text-decoration: none;
}

li a.logo-container {
  padding: 4px 4px 4px 4px;
}

.logo {
  border-radius: 50%;
  width: 38px;
  height: 38px;
}

div.web-name {
  color: white;
  font-size: 1.5em;
  padding-left: 6px;
  margin-top: 11px;
  margin-bottom: 10px;
}

.dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.container {
  margin-top: 10px;
  margin-left: 20px;
  margin-right: 20px;
}

.time-stamp {
  display: inline-block;
  margin-top: 10px;
  margin-left: 25px;
}

.time-stamp img {
  display: inline-block;
  width: 30px;
  height: 30px;
}

.time-stamp p {
  display: inline-block;
  position: relative;
  bottom: 10px;
  padding-left: 6px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border: 2px solid #111;
}

th {
  border: 2px solid #111;
  text-align: center;
  padding: 8px;
}

td {
  border-top: 1px solid #dddddd;
  border-left: 2px solid #111;
  border-right: 2px solid #111;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.odn {
  width: 2%;
}

.place {
  width: 47%;
}

.exam-date {
  width: 25%;
}

.amount {
  width: 15%;
}

.registry {
  width: 1%;
}

.cf-btn, .cancel-btn, .exit-btn, .ok-btn {
  float: right;
  height: 30px;
  margin-left: 10px;
  margin-top: 15px;
  border-radius: 6px;
}

.cf-btn {
  background-color: #219653;
  color: white;
  width: 6%
}

.cf-btn:hover {
  background-color: #1c7d46;
}

.cancel-btn {
  background-color: #ff3333;
  color: white;
  width: 4%
}

.cancel-btn:hover {
  background-color: #cc0000;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  overflow: hidden;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 25%;
}

div.modal-content > h1 {
  font-family: Arial, Helvetica, sans-serif;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.exit-btn {
  width: 13%
}

.exit-btn:hover {
  background-color: #cccccc;
}

.ok-btn {
  background-color: #219653;
  color: white;
  width: 10%
}

.ok-btn:hover {
  background-color: #1c7d46;
}
</style>
<body>
  <ul class="navbar">
    <li><a class="logo-container" href="#home"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
    <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
    <li class="dropdown" style="float:right">
      <a href="javascript:void(0)" class="dropbtn">Student</a>
      <div class="dropdown-content">
        <a href="#">Đổi mật khẩu</a>
        <a href="#">Cập nhật thông tin</a>
        <a href="#">Xem giấy báo dự thi</a>
      </div>
    </li>
  </ul>

  <div class="container">
    <div class="time-stamp">
      <img src="../../images/common/clock.png" />
      <p>Hệ thống mở đăng ký đến 24:00 ngày </p>
    </div>
    <div class="container">
      <form>
        <table>
          <tr>
            <th class="odn">STT</th>
            <th class="place">Địa điểm</th>
            <th class="exam-date">Ngày thi</th>
            <th class="amount">Số lượng</th>
            <th class="registry">ĐK</th>
          </tr>
          <tr>
            <td>1</td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="radio" id="1" name="registry" value="1"/></td>
          </tr>
          <tr>
            <td>2</td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="radio" id="2" name="registry" value="2"/></td>
          </tr>
        </table>
        <button type="reset" class="cancel-btn">Hủy</button>
        <button type="submit" class="cf-btn" id="cfBtn">Xác nhận</button>
        <!-- The Modal -->
        <div id="cfModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Đăng ký thành công</h1>
            <div>
            <button class="exit-btn" id="exitBtn">Thoát</button>
            <button class="ok-btn" id="okBtn">OK</button>
            <div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<script>
// Get the modal
var modal = document.getElementById("cfModal");

// Get the button that opens the modal
var btn = document.getElementById("cfBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var exitBtn = document.getElementById("exitBtn");
var okBtn = document.getElementById("okBtn");

// When the user clicks the button, open the modal 
btn.onclick = function(event) {
  event.preventDefault();
  modal.style.display = "block";
}

exitBtn.onclick = () => modal.style.display = "none";
okBtn.onclick = () => modal.style.display = "none";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>