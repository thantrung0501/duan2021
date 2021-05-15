$("#openRegistry").click(function (e) { 
    e.preventDefault();
    $("#openForm").css("display", "none");
    $("#afterOpen").css("display", "block");
});

$("#closeRegistry").click(function (e) { 
    e.preventDefault();
    $("#openForm").css("display", "block");
    $("#afterOpen").css("display", "none");
});