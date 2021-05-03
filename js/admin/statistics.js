/* Declare chart property */
var property = {
  data: [],
}

/* Init chart */
function drawChart(data) {
  var data = google.visualization.arrayToDataTable(data);
  var options = {
    title: 'BIỂU ĐỒ THỐNG KÊ SỐ LƯỢNG HỌC SINH ĐĂNG KÝ',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart.draw(data, options);
}

/* Render option */
$().ready(function () {
  var thisYear = new Date().getFullYear();
  for(i=thisYear; i>2009; i--){
    $("#from").append($('<option/>', { 
        value: i,
        text : i 
    }));
    $("#to").append($('<option/>', { 
      value: i,
      text : i 
    }));
  }
});

/* Control modal */
// Get the modal

var modalparent = document.getElementsByClassName("modal_multi");

// Get the button that opens the modal

var modal_btn_multi = document.getElementsByClassName("myBtn_multi");

// Get the <span> element that closes the modal
var span_close_multi = document.getElementsByClassName("close_multi");

// When the user clicks the button, open the modal
function setDataIndex() {

    for (i = 0; i < modal_btn_multi.length; i++)
    {
        modal_btn_multi[i].setAttribute('data-index', i);
        modalparent[i].setAttribute('data-index', i);
        span_close_multi[i].setAttribute('data-index', i);
    }
}



for (i = 0; i < modal_btn_multi.length; i++)
{
    modal_btn_multi[i].onclick = function() {
        var ElementIndex = this.getAttribute('data-index');
        modalparent[ElementIndex].style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span_close_multi[i].onclick = function() {
        var ElementIndex = this.getAttribute('data-index');
        modalparent[ElementIndex].style.display = "none";
    };

}

window.onload = function() {

    setDataIndex();
};

window.onclick = function(event) {
    if (event.target === modalparent[event.target.getAttribute('data-index')]) {
        modalparent[event.target.getAttribute('data-index')].style.display = "none";
    }
};

/* Control checkbox */
var checks = document.querySelectorAll(".check");
var max = 3;
for (var i = 0; i < checks.length; i++)
  checks[i].onclick = selectiveCheck;
function selectiveCheck (event) {
  var checkedChecks = document.querySelectorAll(".check:checked");
  if (checkedChecks.length >= max + 1)
    return false;
}

/* Control fetching */
$("#fetchForProvince").click(function (e) { 
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../action/center/GetDataStatisticalForProvince.php",
    data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
    dataType: "json",
    success: function (response) {
      /* Clear screen */
      $("#tableContainer table").remove();
      $("#curve_chart").css("display", "none");
      $("#tableContainer h1").remove();
      /* Establish content table */
      var year;
      $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Tỉnh/Thành phố</th style='width: 30%'><th>Số lượng</th></tr></table>");
      for (let i = 0; i < response.length; i++) {
        if(response[i].Year != year){
          year=response[i].Year;
          $("#tableContainer tr:last").after('<tr><td id='+year+' style="text-align:center;">'+year+"</td><td>"+convertProvince(response[i].ProvinceName)+'</td><td>'+response[i].Number+'</td></tr>');
        }else{
          $("#tableContainer tr:last").after('<tr><td>'+convertProvince(response[i].ProvinceName)+'</td><td>'+response[i].Number+'</td></tr>');
        }
      }
      year = 0;
      var count = 0;
      for (let x = 0; x < response.length; x++) {
        if(response[x].Year != year){
          if(year == 0){
            year = response[x].Year;
            count++;
          }else{
            $("#"+year).attr("rowspan", count);
            year = 0;
            count = 0;
          }
        }else{
          count ++;
        }
        if(x==response.length-1){
          $("#"+year).attr("rowspan", count);
        }
      }
    }
  });
});

function convertProvince(p) {
  if(p!=""){
    return p;
  }else{
    return "Chưa điền";
  }
}

$("#fetchForArea").click(function (e) { 
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../action/center/GetDataStatisticalForArea.php",
    data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
    dataType: "json",
    success: function (response) {
      /* Clear screen */
      $("#tableContainer table").remove();
      $("#tableContainer h1").remove();
      /* Clear chart property */
      property.data = [];
      property.element = [];
      /* Refill chart property */
      property.element.push("KV3");
      property.element.push("KV2");
      property.element.push("KV2-NT");
      property.element.push("Chưa điền");
      property.element.push("KV1");
      /* Establish content of chart and table */
      var year;
      $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Khu vực</th><th style='width: 30%'>Số lượng</th></tr></table>");
      for (let i = 0; i < response.length; i++) {
        if(response[i].Year != year){
          year=response[i].Year;
          $("#tableContainer tr:last").after('<tr><td id='+year+' style="text-align:center;">'+year+"</td><td>"+convertArea(response[i].Area)+'</td><td>'+response[i].Number+'</td></tr>');
        }else{
          $("#tableContainer tr:last").after('<tr><td>'+convertArea(response[i].Area)+'</td><td>'+response[i].Number+'</td></tr>');
        }
      }
      year = 0;
      var count = 1;
      var column = [];
      for (let x = 0; x < response.length; x++) {
        if(response[x].Year != year){
          if(year == 0){
            year = response[x].Year;
            column.push(year);
            column.push(parseInt(response[x].Number));
          }else{
            $("#"+year).attr("rowspan", count);
            if(count == 4) column.splice(4, 0, 0);
            property.data.push(column);
            year = response[x].Year;
            column = [year, response[x].Number];
            count = 1;
          }
        }else{
          column.push(parseInt(response[x].Number));
          count ++;
        }
        if(x==response.length-1){
          $("#"+year).attr("rowspan", count);
          if(count == 4) column.splice(4, 0, 0);
          property.data.push(column);
        }
      }
      property.data.unshift(['Year', 'KV3', 'KV2', 'KV2-NT', 'Chưa điền', 'KV1']);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(function(){drawChart(property.data)});
      $("#curve_chart").css("display", "block");
    }
  });
});

function convertArea(n) {
  switch (n) {
    case "1":
      return 'KV1';
    case "2":
      return 'KV2-NT';
    case "3":
      return 'KV2';
    case "4":
      return 'KV3';
    case "0":
      return 'Chưa điền'     
    default:
      return "";
  }
}

$("#fetchForPriority").click(function (e) { 
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../action/center/GetDataStatisticalForPrioritize.php",
    data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
    dataType: "json",
    success: function (response) {
      /* Clear screen */
      $("#tableContainer table").remove();
      $("#tableContainer h1").remove();
      /* Clear chart property */
      property.data = [];
      property.element = [];
      /* Refill chart property */
      property.element.push("Có ưu tiên");
      property.element.push("Không ưu tiên");
      property.element.push("Chưa điền");
      /* Establish content of chart and table */
      var year;
      $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Khu vực</th><th style='width: 30%'>Số lượng</th></tr></table>");
      for (let i = 0; i < response.length; i++) {
        if(response[i].Year != year){
          year=response[i].Year; 
          $("#tableContainer tr:last").after('<tr><td id='+year+' style="text-align:center;">'+year+"</td><td>"+convertPriority(response[i].Prioritize)+'</td><td>'+response[i].Number+'</td></tr>');
        }else{
          $("#tableContainer tr:last").after('<tr><td>'+convertPriority(response[i].Prioritize)+'</td><td>'+response[i].Number+'</td></tr>');
        }
      }
      year = 0;
      var count = 1;
      var column = [];
      for (let x = 0; x < response.length; x++) {
        if(response[x].Year != year){
          if(year == 0){
            year = response[x].Year;
            column.push(year);
            column.push(parseInt(response[x].Number));
          }else{
            $("#"+year).attr("rowspan", count);
            if(count == 2) column.splice(2, 0, 0);
            property.data.push(column);
            year = response[x].Year;
            column = [year, response[x].Number];
            count = 1;
          }
        }else{
          column.push(parseInt(response[x].Number));
          count ++;
        }
        if(x==response.length-1){
          $("#"+year).attr("rowspan", count);
          if(count == 2) column.splice(2, 0, 0);
          property.data.push(column);
        }
      }
      property.data.unshift(['Year', 'Có ưu tiên', 'Không ưu tiên', 'Chưa điền']);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(function(){drawChart(property.data)});
      $("#curve_chart").css("display", "block");
    }
  });
});

function convertPriority(p) {
  switch (p) {
    case "0":
      return "Chưa điền";
    case "1":
      return "Có ưu tiên";
    case "2":
      return "Không ưu tiên";
    default:
      return "";
  }
}

$("#fetchForGraduating").click(function (e) { 
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "../../action/center/GetDataStatisticalForGraduating.php",
    data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
    dataType: "json",
    success: function (response) {
      console.log(response);
    }
  }); 
});

$("#queryBtn02").click(function (e) { 
  e.preventDefault();
  if (validateAverForm()) {
    $.ajax({
      type: "POST",
      url: "../../action/center/GetDataStatisticalForMediumCore.php",
      data: $("#averForm").serialize(),
      dataType: "json",
      success: function (response) {
        console.log(response);
      }
    });
  }else{
    alert("Điểm không hợp lệ");
  } 
});

function validateAverForm() {  
  if($("#average").val()<0 || $("#average").val()>10 || $("#average").val()=="") return false;
  else{
    return true;
  }
}