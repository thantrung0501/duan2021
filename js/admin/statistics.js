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
var finalProvinceResult;
$("#fetchForProvince").click(function (e) { 
  e.preventDefault();
  $.when(
    $.ajax({
      type: "GET",
      url: "../../action/center_student/GetListProvinceName.php",
      data: [],
      dataType: "json",
    }),
    $.ajax({
      type: "POST",
      url: "../../action/center/GetDataStatisticalForProvince.php",
      data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
      dataType: "json",
    })
  ).then(function (pList, rep) {
    /* Clear screen */
    $("#tableContainer table").remove();
    $("#curve_chart").css("display", "none");
    $("#tableContainer h1").remove();
    /* Establish content table */
    finalProvinceResult = processProvinceData(pList[0], rep[0]);
    $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Tỉnh/Thành phố</th style='width: 30%'><th>Số lượng</th></tr></table>");
    for (let i = 0; i < finalProvinceResult.length; i++) {
      if(i%63==0){
        $("#tableContainer tr:last").after('<tr><td id='+finalProvinceResult[i].year+' rowspan="63" style="text-align:center;">'+finalProvinceResult[i].year+"</td><td>"+finalProvinceResult[i].province+'</td><td>'+finalProvinceResult[i].amount+'</td></tr>');
      }else{
        $("#tableContainer tr:last").after('<tr><td>'+finalProvinceResult[i].province+'</td><td>'+finalProvinceResult[i].amount+'</td></tr>');
      }
    }
  });
});

function processProvinceData (province, data) { 
  var after = [];
  var year = parseInt($("#from").val());
  var i = 0;
  while (year<parseInt($("#to").val())+1) {
    var filter = data.find(function (item) { return (item.Year==year && item.ProvinceName==this); }, province[i].ProvinceName);
    if(filter){
      after.push({year: String(year), province: province[i].ProvinceName, amount: filter.Number});
    }else{
      after.push({year: String(year), province: province[i].ProvinceName, amount: 0});
    }
    if(i==62){
      i=0;
      year++;
    }
    else i++;
  }
  return after; 
}

var finalAreaResult;
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
      /* Establish content of chart and table */
      $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Khu vực</th><th style='width: 30%'>Số lượng</th></tr></table>");
      finalAreaResult=processAreaData(response);
      var column = [];
      for (let i = 0; i < finalAreaResult.length; i++) {
        if(i%4==0){
          if (i/4%2==0) {
            $("#tableContainer tr:last").after('<tr><td id='+finalAreaResult[i].year+' rowspan="4" style="text-align:center;">'+finalAreaResult[i].year+"</td><td>"+finalAreaResult[i].area+'</td><td>'+finalAreaResult[i].amount+'</td></tr>');
            column.push(finalAreaResult[i].year);
            column.push(parseInt(finalAreaResult[i].amount));
          }else{
            $("#tableContainer tr:last").after('<tr><td id='+finalAreaResult[i].year+' rowspan="4" style="text-align:center; background-color: white;">'+finalAreaResult[i].year+"</td><td>"+finalAreaResult[i].area+'</td><td>'+finalAreaResult[i].amount+'</td></tr>');
            column.push(finalAreaResult[i].year);
            column.push(parseInt(finalAreaResult[i].amount));
          }
        }else{
          $("#tableContainer tr:last").after('<tr><td>'+finalAreaResult[i].area+'</td><td>'+finalAreaResult[i].amount+'</td></tr>');
          column.push(parseInt(finalAreaResult[i].amount));
          if (i%4==3) {
            property.data.push(column);
            column=[];
          }
        }
      }
      property.data.unshift(['Year', 'KV1', 'KV2-NT', 'KV2', 'KV3']);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(function(){drawChart(property.data)});
      $("#curve_chart").css("display", "block");      
    }
  });
});

function processAreaData (data) { 
  var after = [];
  var year = parseInt($("#from").val());
  var i = 1;
  while (year<parseInt($("#to").val())+1) {
    var filter = data.find(function (item) { return (item.Year==year && item.Area==this); }, i);
    if(filter){
      after.push({year: String(year), area: convertArea(i), amount: filter.Number});
    }else{
      after.push({year: String(year), area: convertArea(i), amount: 0});
    }
    if(i==4){
      i=1;
      year++;
    }
    else i++;
  }
  return after; 
}

function convertArea(n) {
  switch (n) {
    case 1:
      return 'KV1';
    case 2:
      return 'KV2-NT';
    case 3:
      return 'KV2';
    case 4:
      return 'KV3';
    default:
      return "";
  }
}

var finalPriorityResult;
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
      /* Establish content of chart and table */
      finalPriorityResult = processPriorityData(response);
      var column = [];
      $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Khu vực</th><th style='width: 30%'>Số lượng</th></tr></table>");
      for (let i = 0; i < finalPriorityResult.length; i++) {
        if(i%2==0){
          if (i/2%2==0) {
            $("#tableContainer tr:last").after('<tr><td id='+finalPriorityResult[i].year+' rowspan="2" style="text-align:center;">'+finalPriorityResult[i].year+"</td><td>"+finalPriorityResult[i].priority+'</td><td>'+finalPriorityResult[i].amount+'</td></tr>');
            column.push(finalPriorityResult[i].year);
            column.push(parseInt(finalPriorityResult[i].amount));
          }else{
            $("#tableContainer tr:last").after('<tr><td id='+finalPriorityResult[i].year+' rowspan="2" style="text-align:center; background-color: white">'+finalPriorityResult[i].year+"</td><td>"+finalPriorityResult[i].priority+'</td><td>'+finalPriorityResult[i].amount+'</td></tr>');
            column.push(finalPriorityResult[i].year);
            column.push(parseInt(finalPriorityResult[i].amount));
          }
        }else{
          $("#tableContainer tr:last").after('<tr><td>'+finalPriorityResult[i].priority+'</td><td>'+finalPriorityResult[i].amount+'</td></tr>');
          column.push(parseInt(finalPriorityResult[i].amount));
          property.data.push(column);
          column=[];
        }
      }
      property.data.unshift(['Year', 'Có ưu tiên', 'Không ưu tiên']);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(function(){drawChart(property.data)});
      $("#curve_chart").css("display", "block");
    }
  });
});

function processPriorityData (data) { 
  var after = [];
  var year = parseInt($("#from").val());
  var i = 1;
  while (year<parseInt($("#to").val())+1) {
    var filter = data.find(function (item) { return (item.Year==year && item.Prioritize==this); }, i);
    if(filter){
      after.push({year: String(year), priority: convertPriority(i), amount: filter.Number});
    }else{
      after.push({year: String(year), priority: convertPriority(i), amount: 0});
    }
    if(i==2){
      i=1;
      year++;
    }
    else i++;
  }
  return after; 
}


function convertPriority(p) {
  switch (p) {
    case 1:
      return "Có ưu tiên";
    case 2:
      return "Không ưu tiên";
    default:
      return "";
  }
}

var finalGraduateResult;
$("#fetchForGraduating").click(function (e) { 
  e.preventDefault();
  $.when(
    $.ajax({
      type: "POST",
      url: "../../action/center/GetDataStatisticalForGraduating.php",
      data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
      dataType: "json",
    }),
    $.ajax({
      type: "POST",
      url: "../../action/center/GetDataStatisticalForNotGraduating.php",
      data: "FindYear="+ $("#from").val() +"&EndYear=" + $("#to").val(),
      dataType: "json",
    })
  ).then(function (rep1, rep2) {
      /* Clear screen */
      $("#tableContainer table").remove();
      $("#tableContainer h1").remove();
      /* Clear chart property */
      property.data = [];
      /* Establish content of chart and table */
      finalGraduateResult = processGraduateData(rep1[0], rep2[0]);
      var column = [];
      $("#tableContainer").append("<table><tr><th style='width: 25%'>Thời gian</th><th style='width: 45%'>Tình trạng học tập</th><th style='width: 30%'>Số lượng</th></tr></table>");
      for (let i = 0; i < finalGraduateResult.length; i++) {
        if(i%2==0){
          if (i%4==2) {
            $("#tableContainer tr:last").after('<tr><td id='+finalGraduateResult[i].year+' rowspan="2" style="text-align:center; background-color:white">'+finalGraduateResult[i].year+"</td><td>Đã tốt nghiệp</td><td>"+finalGraduateResult[i].amount+'</td></tr>');
            column.push(finalGraduateResult[i].year);
            column.push(parseInt(finalGraduateResult[i].amount));
          } else {
            $("#tableContainer tr:last").after('<tr><td id='+finalGraduateResult[i].year+' rowspan="2" style="text-align:center;">'+finalGraduateResult[i].year+"</td><td>Đã tốt nghiệp</td><td>"+finalGraduateResult[i].amount+'</td></tr>');
            column.push(finalGraduateResult[i].year);
            column.push(parseInt(finalGraduateResult[i].amount));
          }
        }else{
          $("#tableContainer tr:last").after('<tr><td>Chưa tốt nghiệp</td><td>'+finalGraduateResult[i].amount+'</td></tr>');
          column.push(parseInt(finalGraduateResult[i].amount));
          property.data.push(column);
          column=[];
        }
      }
      property.data.unshift(['Year', 'Đã tốt nghiệp', 'Chưa tốt nghiệp']);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(function(){drawChart(property.data)});
      $("#curve_chart").css("display", "block"); 
  }); 
});

function processGraduateData (a, b) { 
  var after = [];
  var i = 0;
  var start = false;
  for (let year = parseInt($("#from").val()); year < (parseInt($("#to").val())+1); year++) {
      if(a[i].Year == year) {
        after.push({year: String(year), amount: a[i].Number, isGraduate: true});
        start = true;
      }else{
        after.push({year: String(year), amount: 0, isGraduate: true});
      }
      if(b[i].Year == year) {
        after.push({year: String(year), amount: b[i].Number, isGraduate: false});
        start = true;
      }else{
        after.push({year: String(year), amount: 0, isGraduate: false});
      }
      if (start) i++;
  }
  return after; 
}

$("#queryBtn01").click(function (e) { 
  e.preventDefault();
  if(validateCombiForm()){
    var input = $("#combiForm").serialize().split(/&|=/);
    var i=0;
    while (i<input.length) {
      if(input[i]=="on" || input[i]=="combi") input.splice(i,1);
      i++
    }
    console.log("SumSubject="+input[0]+"&Subject1="+input[1]+"&Subject2="+input[2]+"&Subject3="+input[3]);
    $.ajax({
      type: "POST",
      url: "../../action/center/GetDataStatisticalForSubject.php",
      data: "Subject1="+input[1]+"&Subject2="+input[2]+"&Subject3="+input[3]+"&SumSubject="+input[0],
      dataType: "json",
      success: function (res) {  
        console.log(res);
      }
    });
/*     $.when(
      $.ajax({
        type: "POST",
        url: "../../action/center/GetDataStatisticalForSubject.php",
        data: "SumSubject="+input[0]+"&Subject1="+input[1]+"&Subject2="+input[2]+"&Subject3="+input[3],
        dataType: "json",
      }),
      $.ajax({
        type: "POST",
        url: "../../action/center/GetDataStatisticalForSubject.php",
        data: "SumSubject="+input[0]+"&Subject1="+input[1]+"&Subject2="+input[2]+"&Subject3="+input[3],
        dataType: "json",
      })
    ).then(function (rep1, rep2) {  
      console.log(rep1[0]);
      console.log(rep2[0]);
    }); */
  }
});

function validateCombiForm () {  
  if($("#combi").val()<0 || $("#combi").val()>30 || $("#combi").val()==""){
    alert("Tổng điểm phải nằm trong khoảng 0-30");
    return false;
  }
  var checkedList = document.querySelectorAll(".check:checked");
  if (checkedList.length != 3) {
    alert("Vui lòng chọn đủ 3 môn thành phần");
    return false;
  }
  return true;
}

$("#queryBtn02").click(function (e) { 
  e.preventDefault();
  if (validateAverForm()) {
    $.when(
      $.ajax({
        type: "POST",
        url: "../../action/center/GetDataStatisticalForMediumCore.php",
        data: $("#averForm").serialize(),
        dataType: "json",
      }),
      $.ajax({
        type: "POST",
        url: "../../action/center/GetDataStatisticalForNotMediumCore.php",
        data: $("#averForm").serialize(),
        dataType: "json",
      })
    ).then(function (rep1, rep2) {  
      console.log(rep1[0]);
      console.log(rep2[0]);
    });
  }
});

function validateAverForm() {  
  if($("#average").val()<0 || $("#average").val()>10 || $("#average").val()==""){
    alert("Điểm trung bình phải nằm trong khoảng 0-10");
    return false;
  }
  return true;
}