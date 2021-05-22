/* Render exam schedule */
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../../action/center/RegistExam/GetListRegistExamDetail.php",
        data: [],
        dataType: "json",
        success: function (response) {
            response.sort(compareItem);
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
            createHeader(current, data[i].RegistNumber, data[i].CreateYear, data[i].StartedDate.split(" ")[0], data[i].FinishDate.split(" ")[0]);
            createBody(data[i], i);
        }else{
            createBody(data[i], i);
        }    
    }  
}

createHeader = (id, examNumber, year, startDate, finishDate) => {
    /* CREATE ID */
    var openFormId = "openFormOf_" + id;
    var formId = "formOf_" + id;
    var openButtonId = "openButtonOf_" + id;
    var stopContainerId = "stopContainerOf_" + id;
    var closeButtonId = "closeButtonOf_" + id;
    var closeContainerId = "closeContainerOf_" + id;
    var tableId = "tableOf_"+id;
    /* VARIABLE FOR CONTROLLER */
    var now = new Date().toISOString().split('T')[0];
    var openDisplay = (startDate!="" && finishDate!="" && compareDate(finishDate, now)) ? "none" : "block";
    var closeDisplay = (startDate!="" && finishDate!="" && compareDate(finishDate, now)) ? "block" : "none";
    var period = "Mở đăng ký từ " + convertDate(startDate)+ " đến " + convertDate(finishDate);
    /* APPEND ELEMENT */
    $("#tableList").find(".table-container[data-examination="+id+"]").append('<div class="w3-green top-rounded table-header clearfix">'+
        '<h3>Đợt '+examNumber+' năm '+year+'</h3>'+
        '<a href="adminChange.php" class="config-btn"><img src="../../images/config.svg" alt="Sửa"></a>'+
        '<div class="close-button-container" id='+closeContainerId+'><button class="close-button" id='+closeButtonId+' onclick="closeRegistryHandler(this.id)">Đóng đăng ký</button></div>'+
        '<div class="openForm" id='+openFormId+' style="display:'+openDisplay+'">'+
        '<form id='+formId+'>'+
            '<input type="text" name="RegistExamID" value='+id+' style="display:none;">'+
            '<label>Từ: </label>'+
            '<input type="date" name="startedDate">'+
            '<label>Đến: </label>'+
            '<input type="date" name="finishDate">'+
            '<button type="button" class="mybutton" id='+openButtonId+' name="openRegistry" onclick="openRegistryHandler(this.id)">Mở đăng ký</button>'+
        '</form>'+
        '</div>'+
        '<div class="afterOpen" id='+stopContainerId+' style="display:'+closeDisplay+'">'+
            '<div>'+period+'</div>'+
        '</div>'+
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

openRegistryHandler = (id) => {
    var i = id.split("_")[1];
    if (validateOpenForm(i)) {
       $.ajax({
            type: "POST",
            url: "../../action/center/RegistExam/OpenRegistExam.php",
            data: $("#formOf_"+i).serialize(),
            dataType: "json",
            success: function (response) {
                var newStartDate = $("#formOf_"+i).find('input[name="startedDate"]').val();
                var newFinishDate = $("#formOf_"+i).find('input[name="finishDate"]').val();
                var newPeriod = "Mở đăng ký từ " + convertDate(newStartDate)+ " đến " + convertDate(newFinishDate);
                $("#stopContainerOf_"+i).find("div").text(newPeriod);
                $("#formOf_"+i).css("display", "none");
                $("#stopContainerOf_"+i).css("display", "block");
            },
            error: function (err) {console.log(err.responseText);  } 
        }); 
    }else{
        alert("Ngày mở hoặc ngày đóng đăng ký không hợp lệ");
    }
}

closeRegistryHandler = (id) => {
    var i = id.split("_")[1];
    var r = confirm("Đợt thi đã đóng sẽ không hiển thị lại. Bạn có chắc chắn muốn đóng đợt thi này không?");
    if (r) {
       $.ajax({
            type: "POST",
            url: "../../action/center/RegistExam/CloseRegistExam.php",
            data: {"RegistExamID":i},
            dataType: "json",
            success: function (response) {
                $("#tableList").find(".table-container[data-examination="+i+"]").remove();
            },
            error: function (err) {console.log(err.responseText);  }
        }); 
    }
}

validateOpenForm = (id) => {
    var newStartDate = $("#formOf_"+id).find('input[name="startedDate"]').val();
    var newFinishDate = $("#formOf_"+id).find('input[name="finishDate"]').val();
    var _oldFinishDate = $("#stopContainerOf_"+id).find("div").text().split(" ")[6];
    var oldFinishDate = _oldFinishDate.split("/")[2] + "-" + _oldFinishDate.split("/")[1] + "-" + _oldFinishDate.split("/")[0];
    if (compareDate(newStartDate, oldFinishDate)) {
        if (compareDate(newFinishDate, oldFinishDate)) {
            if (compareDate(newFinishDate, newStartDate)) {
                return true;
            }
        }
    }
    return false;
}
