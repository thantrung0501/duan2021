var yearList = {};
var monthList = {};

$().ready(function () {
    $.ajax({
        type: "GET",
        url: "../../action/center/GetGroupDateAccount.php",
        data: {},
        dataType: "json",
        success: function (response) {
            var y = "";
            for (let i = 0; i < (response.length>=10?10:response.length); i++) {
                var date = response[i].GroupDate.split("/");
                if(date[1]!=y){
                    y = date[1];
                    yearList[y] = false;
                    $("#yearList").append('<li><a class="yearItem" id="'+y+'">Năm '+ y +'</a></li>');  
                }
            }
        }
    });

    for (let i = 1; i < 13; i++) {
        if(i<10){
            $("#monthList").append('<li><a class="monthItem" id=0'+i+'>Tháng '+ i +'</a></li>');  
        }else{
            $("#monthList").append('<li><a class="monthItem" id='+i+'>Tháng '+ i +'</a></li>');   
        }
        monthList[i]=false;   
    }
});

var searchTerm = "";
var lastYearSelect, lastMonthSelect;

  
$("#yearList").find("a.yearItem#21").click(function () { console.log(1);  });

$(window).click(function (e) { 
    if(e.target.className == "yearItem"){
        if (e.target.id != lastYearSelect) {
            /* Reset old value */
            searchTerm="";
                /* Month item */
            monthList[lastMonthSelect]=false;
            $("#"+lastMonthSelect).css("background", "#f2f2f2");
            $("#"+lastMonthSelect).css("color", "#111");
            lastMonthSelect="";
                /* Year item */
            $("#"+lastYearSelect).css("background", "#f2f2f2");
            $("#"+lastYearSelect).css("color", "#111");
            yearList[lastYearSelect]=false;
            /* Set new value */
            lastYearSelect = e.target.id;
            yearList[lastYearSelect]=true;
            e.target.style.background = "#ff4d4d";
            e.target.style.color = "white";
        }    
    }
    if(e.target.className == "monthItem"){
        if(e.target.id != lastMonthSelect){
            /* Reset old value */
            if(lastMonthSelect!="") {
                $("#"+lastMonthSelect).css("background", "#f2f2f2");
                $("#"+lastMonthSelect).css("color", "#111");
            }
            monthList[lastMonthSelect]=false;
            /* Set new value */
            lastMonthSelect = e.target.id;
            monthList[lastMonthSelect]=true;
            e.target.style.background = "#ff4d4d";
            e.target.style.color = "white";
            /* Fetch */
            if (lastYearSelect!="" && lastYearSelect!=undefined) {
                searchTerm = lastMonthSelect + "/" + lastYearSelect;
                console.log(searchTerm);
                $("#participantList").empty();
                $.ajax({
                    type: "POST",
                    url: "../../action/center/GetListRegistAccount.php",
                    data: "GroupDate="+searchTerm+"",
                    dataType: "json",
                    success: function (response) {
                        for (let i = 0; i < response.length; i++) {
                            $("#participantList").append('<li><a href=adminProfileStudent.php?id='+response[i].AccountID+'>'+response[i].FullName+"&nbsp;&nbsp;&nbsp;"+ response[i].DateOfBirth +'</a></li>');
                        }   
                    },
                    error: function() { 
                        $("#participantList").append('<li><p style="text-align: center">Không có thí sinh nào</p></li>');
                    }  
                });
            }
        }   
    }
});