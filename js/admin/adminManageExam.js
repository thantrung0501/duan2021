/* Render exam schedule */
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../../action/center/RegistExam/GetListRegistExamDetail.php",
        data: [],
        dataType: "json",
        success: function (response) {
            response.sort(compareItem);
            console.log(response);
            createTable(response);
        }
    });
});

compareItem = (a, b) => {
    return -a.RegistExamID.localeCompare(b.RegistExamID) || a.RegistExamDetailID.localeCompare(b.RegistExamDetailID);
}

createTable = (data) => {
    var current = "";
    for (let i = 0; i < data.length; i++) {
        if (data[i].RegistExamID!=current) {
            current = data[i].RegistExamID;
            $("#tableList").append('<div data-examination = '+current+' class="table-container w3-card-4 top-rounded"></div>');
            createHeader(current, data[i].RegistNumber);
            createBody(data[i], i);
        }else{
            createBody(data[i], i);
        }    
    }  
}

createHeader = (id, examNumber) => {
    var openFormId = "openFormOf_" + id;
    var formId = "formOf_" + id;
    var openButtonId = "openButtonOf_" + id;
    var stopButtonId = "stopButtonOf_" + id;
    var stopContainerId = "stopContainerOf_" + id;
    var closeButtonId = "closeButtonOf_" + id;
    var closeContainerId = "closeContainerOf_" + id;
    var tableId = "tableOf_"+id;
    $("#tableList").find(".table-container[data-examination="+id+"]").append('<div class="w3-green top-rounded table-header clearfix">'+
        '<h3>Đợt '+examNumber+' năm 2021</h3>'+
        '<a href="adminChange.php" class="config-btn"><img src="../../images/config.svg" alt="Sửa"></a>'+
        '<div class="close-button-container" id='+closeContainerId+'><button class="close-button" id='+closeButtonId+' onclick="closeRegistryHandler(this.id)">Đóng đợt thi</button></div>'+
        '<div class="openForm" id='+openFormId+'>'+
        '<form id='+formId+'>'+
            '<input type="text" name="RegistExamID" value='+id+' style="display:none;">'+
            '<label for="from">Từ: </label>'+
            '<input type="date" name="startedDate">'+
            '<label for="to">Đến: </label>'+
            '<input type="date" name="finishDate">'+
            '<button type="button" class="mybutton" id='+openButtonId+' name="openRegistry" onclick="openRegistryHandler(this.id)">Mở đăng ký</button>'+
        '</form>'+
        '</div>'+
        '<div class="afterOpen" id='+stopContainerId+'><div>dd/mm/yyyy - dd/mm/yyyy</div><button class="mybutton" id='+stopButtonId+'>Dừng đăng ký</button></div>'+
    '</div>');
    $("#tableList").find(".table-container[data-examination="+id+"]").append('<table id='+tableId+' class="w3-table-all w3-hoverable w3-striped">'+
        '<tr>'+
        '<th style="width:5%">STT</th>'+
        '<th style="width:35%">Địa điểm</th>'+
        '<th style="width:24%">Ngày thi</th>'+
        '<th style="width:18%">Ca thi</th>'+
        '<th style="width:15%">Số lượng</th>'+
        '<th style="width:3%">DS</th>'+
        '</tr>'+
    '</table>');
}

createBody = (data, index) => {
    $("#tableList").find("#tableOf_"+data.RegistExamID+" tr:last").after('<tr>'+
        '<td>'+(index+1)+'</td>'+
        '<td>'+data.Location+'</td>'+
        '<td>'+convertDate(data.ExamDate)+'</td>'+
        '<td>'+data.UnitExam+'('+data.ExamTime+')'+'</td>'+
        '<td>'+data.Examee+'/'+data.ExameeMax+'</td>'+
        '<td>'+
          '<a href="../admin/adminPrint.php?id='+data.RegistExamDetailID+'" class="btn-link">'+
            '<img src="../../images/export.svg" alt="In">'+
          '</a>'+
        '</td>'+
    '</tr>');
} 

convertDate = (date) => {
    var frag = date.split("-");
    return frag[2]+"/"+frag[1]+"/"+frag[0];
}

/* Set date handler */
/* $(window).click(function (e) { 
    e.preventDefault();
    console.log(e.target.id);
    var i = e.target.id.split("_")[1];
    console.log(i);
    console.log($("#formOf_"+i).serialize());
}); */

openRegistryHandler = (id) => {
    console.log(id);
    var i = id.split("_")[1];
    console.log($("#formOf_"+i).serialize());
    $.ajax({
        type: "POST",
        url: "../../action/center/RegistExam/OpenRegistExam.php",
        data: $("#formOf_"+i).serialize(),
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
}

closeRegistryHandler = (id) => {
    var i = id.split("_")[1];
    console.log(i);
    $.ajax({
        type: "POST",
        url: "../../action/center/RegistExam/CloseRegistExam.php",
        data: "RegistExamID="+i,
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
}

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