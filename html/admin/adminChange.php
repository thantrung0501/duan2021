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

<style>#tab{display: none;}</style>

  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="./adminManageExam.php">Quản lý lịch thi</a>
      <a href="./adminChange.php">Chỉnh sửa lịch thi</a>
      <a href="./adminListStudent.php">Hồ sơ người đăng ký</a>
      <a href="./statistics.php">Thống kê lượt đăng ký</a>
    </div>
    <div id="main" class="main">
      <ul class="navbar">
        <!--<li><button class="side-bar-toggle" id="sideBarBtn">&#9776;</button></li>-->
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
          </div>
        </li>
      </ul>

      <button class="side-bar-toggle" id="sideBarBtn">&#9776;</button>

    <table class="table table-bordered table-hover" id="tblSample">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Đợt thi</th>
                <th scope="col">Ca thi</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Ngày thi</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody id="dataList">
        
        </tbody>
    </table>

    <div id="tab">
      <h1 id="notify">Thông tin đợt thi mới</h1>
      <b>Đợt thi:</b><input type="number" id="exam"><br>
      <b>Ca thi:</b><input type="number" id="poetry"><br>
      <b>Địa điểm:</b><input type="text" id="address"><br>
      <b>Ngày thi:</b> <input type="date" id="date"><br>
      <b>Thời gian:</b> <input type="time" id="time"><br>
      <b>Số lượng:</b> <input type="number" id="number"><br>
      <button id="addCa" onclick="addRow();">Xác nhận</button>
    </div>
    

  <button id="openTab" class="addDot">Thêm ca thi</button>

  <div id="container"></div>
	
  	<button value="Tạo table" onclick="return createTable()">

  	<button value="Them id" onclick="createId()">
  



</body>

<script src="../../js/sideNavBar.js"></script>

<script language="javascript">


//an hien thong bao;

document.getElementById("openTab").onclick = function () {
  document.getElementById("tab").style.display = 'block';
  document.getElementById("openTab").style.display = 'none';
};

//them hang ca thi
var dataList = [];
function addRow(){
  var exam = document.getElementById('exam').value;
  var poetry = document.getElementById('poetry').value;
  var address = document.getElementById('address').value;
  var date = document.getElementById('date').value;
  var time = document.getElementById('time').value;
  var number = document.getElementById('number').value;
  

  var dataListTag = document.getElementById('dataList');

  var list = {
    "exam": exam,
    "poetry": poetry,
    "address": address,
    "date": date,
    "time": time,
    "number": number
  };

  if(curIndex == -1){
    addTag(list)
  }else {
    dataList[curIndex] = list;
    curIndex = -1;
    diplayAll()
  }

  document.getElementById("tab").style.display = 'none';
  document.getElementById("openTab").style.display = 'block';
 
}

function diplayAll(){

  var dataListTag = document.getElementById('dataList');
  dataListTag.innerHTML = "";
  for(i=0; i<dataList.length; i++){
    var list = dataList[i];

    dataListTag.innerHTML += "<tr id="+i+">"
          +"<td>"+(i+1)+"</td>"
          +"<td>"+list.exam+"</td>"
          +"<td>"+list.poetry+"</td>"
          +"<td>"+list.address+"</td>"
          +"<td>"+list.date+"</td>"
          +"<td>"+list.time+"</td>"
          +"<td>"+list.number+"</td>"
          +"<td><button onclick='edit("+i+")'>Sửa</button></td>"
          +"<td><button onclick='delete("+i+")'>Xóa</button></td>"
          +"</tr>";
  }
}

function addTag(list){

  var dataListTag = document.getElementById('dataList');
  dataList.push(list);
  console.log(dataList.length)

  dataListTag.innerHTML += "<tr id="+(dataList.length-1)+">"
          +"<td>"+dataList.length+"</td>"
          +"<td>"+list.exam+"</td>"
          +"<td>"+list.poetry+"</td>"
          +"<td>"+list.address+"</td>"
          +"<td>"+list.date+"</td>"
          +"<td>"+list.time+"</td>"
          +"<td>"+list.number+"</td>"
          +"<td><button onclick='edit("+(dataList.length-1)+")'>Sửa</button></td>"
          +"<td><button onclick='delete("+(dataList.length-1)+")'>Xóa</button></td>"
          +"</tr>";
}

var curIndex = -1;

function edit(index){

  curIndex = index;
  var list = dataList[index];
  document.getElementById("exam").value = list.exam
  document.getElementById("poetry").value = list.poetry
  document.getElementById("address").value = list.address
  document.getElementById("date").value = list.date
  document.getElementById("time").value = list.time
  document.getElementById("number").value = list.number
  document.getElementById("addCa").innerHTML = "Cập nhật"
  document.getElementById("notify").innerHTML = "Sửa thông tin đợt thi"

  document.getElementById("tab").style.display = 'block';
  document.getElementById("openTab").style.display = 'none';

}

function createTable() {
  
  var container = document.getElementById("container");

  
  var tagTable = document.createElement("table");
  
  

  for (var i = 0; i < 1; i++) {
      var tagRow = document.createElement("tr");
      tagTable.appendChild(tagRow);
      
    for(var j = 0; j < 7; j++) {
      
      if(j=1){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("STT");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }
      if(j=2){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("Đợt thi");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }
      if(j=3){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("Ca thi");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }
      if(j=4){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("Địa điểm");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }
      if(j=5){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("Ngày thi");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }
      if(j=6){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("Thời gian");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }
      if(j=7){
        var tagColumn = document.createElement("th");
        var textNode = document.createTextNode("Số lượng");
        tagColumn.appendChild(textNode);
        tagRow.appendChild(tagColumn);
      }

    }
  }

  container.appendChild(tagTable);


  return true;
  
}


function createId(){
 for(var i=0; i<100; i++){
     var tableNew = document.querySelector('table')[i];
     tableNew.id = 'i';
}
} 
          


</script>
</html>
