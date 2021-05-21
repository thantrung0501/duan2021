var now = new Date().toISOString();
var thisYear = now.split("-")[0];
$("#time").text("Tuyển sinh "+ thisYear);

var hasAnyNotice = true;

// Original title
var ORIGINAL_TEXT = {};
// Pagination variable
pageSize = 10;
slideSize = 5;
startPage = 0;
currentSlide = 0;

var pageCount;
var totalSlidepPage;

var prev = $("<a/>").addClass("prev w3-button w3-bar-item").html("&laquo;").click(function(){
    startPage-=5;
    slideSize-=5;
    currentSlide--;
    slide();
});

prev.hide();

var next = $("<a/>").addClass("next w3-button w3-bar-item").html("&raquo;").click(function(){
    startPage+=5;
    slideSize+=5;
    currentSlide++;
    slide();
});

next.hide();

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
        },
        error: function () {
            hasAnyNotice = false;
            console.log(hasAnyNotice);
        },
        complete: function () {  
            if (hasAnyNotice) {
                pageCount =  $(".notice").length / pageSize;
                totalSlidepPage = Math.ceil(pageCount / slideSize);
                if(totalSlidepPage>slideSize) next.show();
                for(var i = 0 ; i<totalSlidepPage;i++){
                    $("#numList").append('<a href="#" id="item-'+i+'" class="w3-button w3-bar-item" onclick="pageClickHandler(this.id)">'+(i+1)+'</a>');
                    if(i>=slideSize){
                        $("#numList a").eq(i).hide();
                    }
                }
                $("#numList").prepend(prev).append(next);
                $("#item-0").addClass("w3-green");
                showPage(1);
            }else{
                $("#notice-list").append('<p>Không có thông báo nào</p>');
            }
        }
    });
});

$(window).resize(function () { 
    if (hasAnyNotice) {
        $.each($(".notice"), function (indexInArray, valueOfElement) { 
            var text = ORIGINAL_TEXT[indexInArray];
            $(".notice")[indexInArray].childNodes[0].nodeValue = titleProcess(text);
        });
    }
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

slide = function(){
    $("#numList a").hide();
    for(t=startPage;t<slideSize;t++){
      $("#numList a").eq(t+1).show();
    }
    if(startPage == 0){
      next.show();
      prev.hide();
    }else if(currentSlide == totalSlidepPage ){
      next.hide();
      prev.show();
    }else{
      next.show();
      prev.show();
    }   
}

showPage = function(page) {
    $(".notice").hide();
    $(".notice").each(function(n) {
        if (n >= pageSize * (page - 1) && n < pageSize * page)
            $(this).show();
    });        
}

pageClickHandler = (id) => {
    $("#numList a").removeClass("w3-green");
    $("#"+id).addClass("w3-green");
    showPage(parseInt($("#"+id).text()));
}