var slider = document.getElementById("scoreRange");
var output = document.getElementById("score-value");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}

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