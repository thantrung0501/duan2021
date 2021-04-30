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

/* Control chart */
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