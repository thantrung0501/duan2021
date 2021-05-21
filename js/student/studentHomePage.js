var now = new Date().toISOString();
var thisYear = now.split("-")[0];
$("#time").text("Tuyển sinh "+ thisYear);

// Original title
var ORIGINAL_TEXT = {};
// Pagination variable
pageSize = 4;
incremSlide = 5;
startPage = 0;
numberPage = 0;

var pageCount =  $(".notice").length / pageSize;
var totalSlidepPage = Math.floor(pageCount / incremSlide);

$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../../action/student/GetListNewFeed.php",
        data: [],
        dataType: "json",
        success: function (response) {
            for (let i = 0; i < (response.length<10 ? response.length : 10); i++) {
                var date = convertDate(response[i].CreatedDate);
                ORIGINAL_TEXT[i] = response[i].Title;
                $("#notice-list").append('<a class="notice" id="link-'+response[i].NewFeedID+'" href="displayNotice.php?id='+response[i].NewFeedID+'">'+
                    titleProcess(response[i].Title)+
                '<span class="w3-tag w3-light-gray w3-right">'+date+'</span></a>');
            }
        }
    });

    for (let i = 0; i < (totalSlidepPage > incremSlide ? incremSlide : totalSlidepPage); i++) {
        const element = pageSize
        
    }
    $("#numList").append(content);
});

$(window).resize(function () { 
    $.each($(".notice"), function (indexInArray, valueOfElement) { 
        var text = ORIGINAL_TEXT[indexInArray];
        $(".notice")[indexInArray].childNodes[0].nodeValue = titleProcess(text);
    });
});

titleProcess = title => {
    if ($(window).width() < 850) {
        if (title.length > 20) return title.slice(0, 20) + "...";
        else return title;

    }else if ($(window).width() > 850 && $(window).width() < 1400) {
        if (title.length > 60) return title.slice(0, 40) + "...";
        else return title;

    } else {
        if (title.length > 60) return title.slice(0, 60) + "...";
        else return title;
    }
}


var prev = '<a href="#" class="w3-button">&laquo;</a>'
slide = function(sens){
    $("#pagin li").hide();
    
    for(t=startPage;t<incremSlide;t++){
      $("#pagin li").eq(t+1).show();
    }
    if(startPage == 0){
      next.show();
      prev.hide();
    }else if(numberPage == totalSlidepPage ){
      next.hide();
      prev.show();
    }else{
      next.show();
      prev.show();
    }   
}

showPage = function(page) {
    $(".line-content").hide();
    $(".line-content").each(function(n) {
        if (n >= pageSize * (page - 1) && n < pageSize * page)
            $(this).show();
    });        
}
  
showPage(1);
$("#pagin li a").eq(0).addClass("current");

$("#pagin li a").click(function() {
   $("#pagin li a").removeClass("current");
   $(this).addClass("current");
   showPage(parseInt($(this).text()));
});