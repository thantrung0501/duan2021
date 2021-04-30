// Get the modal
var pointCombiModal = document.getElementById("pointCombination");
var pointAverModal = document.getElementById("pointAverage");

// Get the button that opens the modal
var combiQuery = document.getElementById("combiQuery");
var averQuery = document.getElementById("averQuery");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];

var cancelBtn1 = document.getElementById("cancelBtn1");
var queryBtn1 = document.getElementById("queryBtn1");

var cancelBtn2 = document.getElementById("cancelBtn2");
var queryBtn2 = document.getElementById("queryBtn2");

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

// When the user clicks the button, open the modal 
combiQuery.onclick = function(event) {
  event.preventDefault();
  pointCombiModal.style.display = "block";
}

averQuery.onclick = function(event) {
  event.preventDefault();
  pointAverModal.style.display = "block";
}

cancelBtn1.onclick = () => pointCombiModal.style.display = "none";
queryBtn1.onclick = () => pointCombiModal.style.display = "none";

cancelBtn2.onclick = () => pointAverModal.style.display = "none";
queryBtn2.onclick = () => pointAverModal.style.display = "none";

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  pointCombiModal.style.display = "none";
}

span2.onclick = function() {
  pointAverModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == pointCombiModal) {
    pointCombiModal.style.display = "none";
  }
  if (event.target == pointAverModal) {
    pointAverModal.style.display = "none";
  }
}

});


google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', '2021');
      data.addColumn('number', '2020');

      data.addRows([
        [1, 10, 5],   [2, 23, 15],  [3, 17, 9],   [4, 18, 10],  [5, 9, 5],
        [6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
        [12, 30, 22]
      ]);

      var options = {
        hAxis: {
          title: 'Tháng'
        },
        vAxis: {
          title: 'Số lượng (người)'
        },
        title: "BIỂU ĐỒ THỐNG KÊ SỐ LƯỢNG HỌC SINH ĐĂNG KÝ THI ĐÁNH GIÁ NĂNG LỰC",
        colors: ['#a52714', '#097138'],
        crosshair: {
          color: '#000',
          trigger: 'selection'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);

    }