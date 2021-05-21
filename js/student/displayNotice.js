var id = parseURLParams(window.location.href).id[0];

$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "../../action/student/GetListNewFeed.php",
    data: {},
    dataType: "json",
    success: function (response) {
      var select;
      for (let i = 0; i < response.length; i++) {
        if(response[i].NewFeedID == id) select = response[i];
      }
      $("#title").text(select.Title);
      $("#date").text(convertDate(select.CreatedDate));
      $("#content").html(select.Content);
    }
  });
});