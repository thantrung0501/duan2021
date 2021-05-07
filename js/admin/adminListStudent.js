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
                    $("#year").append($('<option/>', { 
                        value: y,
                        text : y 
                    }));
                }
            }
        }
    });

    for(i=1; i<13; i++){
        var n = i<10 ? ("0"+i) : i;
        $("#month").append($('<option/>', { 
            value: n,
            text : n 
        }));
    }

    if (localStorage.getItem("lastSearchTerm")!="") {
        var lastSearch = localStorage.getItem("lastSearchTerm").split("/");
        $("#year").val(lastSearch[1]);
        $("#month").val(lastSearch[0]);
        $.ajax({
            type: "POST",
            url: "../../action/center/GetListRegistAccount.php",
            data: "GroupDate="+localStorage.getItem("lastSearchTerm"),
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
    }else{
        $("#participantList").append('<li><p style="text-align: center">Chọn một mốc thời gian để truy vấn</p></li>');
    }
});

$("#sbbtn").click(function (e) { 
    e.preventDefault();
    $("#participantList").empty();
    var searchTerm = $("#month").val() + "/" + $("#year").val();
    localStorage.setItem("lastSearchTerm", searchTerm);
    $.ajax({
        type: "POST",
        url: "../../action/center/GetListRegistAccount.php",
        data: "GroupDate="+searchTerm,
        dataType: "json",
        success: function (response) {
            for (let i = 0; i < response.length; i++) {
                var _birthday = response[i].DateOfBirth.split("-");
                var birthday = _birthday[2] + "/" + _birthday[1] + "/" +_birthday[0];
                $("#participantList").append('<li><a href=adminProfileStudent.php?id='+response[i].AccountID+'>'+response[i].FullName+"&nbsp;&nbsp;&nbsp;"+ birthday +'</a></li>');
            }   
        },
        error: function() { 
            $("#participantList").append('<li><p style="text-align: center">Không có thí sinh nào</p></li>');
        }  
    });
});