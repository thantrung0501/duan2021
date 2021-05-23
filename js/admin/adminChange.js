var INDEX_TREE = {};

$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "../../action/center/RegistExam/GetListRegistExamDetail.php",
    data: [],
    dataType: "json",
    success: function (response) {
      console.log(response);
      var current = "";
      var index = 1;
      for (let i = 0; i < response.length; i++) {
        if (response[i].RegistExamID != current) {
          current = response[i].RegistExamID;
          index = 1;
          createFrame(current, response[i].UnitRegist, response[i].CreateYear);
          createContentForOldExam(
            index, 
            current, 
            response[i].Location, 
            convertDate(response[i].ExamDate), 
            response[i].UnitExam, 
            response[i].ExamTime,
            response[i].ExameeMax
          );
        }else{
          index++;
          createContentForOldExam(
            index, 
            current, 
            response[i].Location, 
            convertDate(response[i].ExamDate), 
            response[i].UnitExam, 
            response[i].ExamTime,
            response[i].ExameeMax
          );
        } 
      }
    }
  });
});

/* ******************************************************************************************** */
/* ******************    COMMON   *********************** */
/* ******************************************************************************************** */

createFrame = (id, examNumber = "", examYear = "") => {
  var containerId = "containerOf_" + id;
  var formId = "formOf_" + id;
  var tableId = "tableOf_" + id;
  var addBtnId = "addBtnOf_" + id;
  var saveBtnID = "saveBtnOf_" + id;
  var header = (examYear==""||examNumber=="") ? createHeaderForNewExam(id) : createHeaderForOldExam(examNumber, examYear);
  var tableHeader = (examYear==""||examNumber=="") ? tableHeadForNewExam : tableHeadForOldExam
  $("#container").append('<div class="wrapper clearfix" id='+containerId+'>'+
    '<form id='+formId+'>'+
      header+
      '<div class="form-container">'+
        '<table class="w3-table-all w3-striped w3-hoverable" id='+tableId+'>'+
          tableHeader+
        '</table>'+
      '</div>'+
      '<div class="button-shelf">'+
        '<button type="button" class="w3-button w3-green w3-ripple" id='+saveBtnID+' onclick="submitNew(this.id)">Lưu</button>'+
        '<button type="button" class="w3-button w3-indigo w3-ripple addbtn" id='+addBtnId+' onclick="addNewRow(this.id)">+</button>'+
      '</div>'+
    '</form>'+
  '</div>');
}

/* ******************************************************************************************** */
/* ******************    OLD EXAM    *********************** */
/* ******************************************************************************************** */

/* OLD'S PIECES */
createHeaderForOldExam = (examNumber, examYear) => {
  return '<div class="w3-green header">' + 
    '<h3>Đợt '+examNumber+' năm '+examYear+'</h3>' + 
  '</div>';
}

const tableHeadForOldExam = '<tr>'+
  '<td style="width: 5%;">STT</td>'+
  '<td style="width: 35%;">Địa điểm</td>'+
  '<td style="width: 20%;">Ngày thi</td>'+
  '<td style="width: 15%;">Ca thi</td>'+
  '<td style="width: 15%;">Số lượng tối đa</td>'+
  '<td style="width: 5%;">Sửa</td>'+
  '<td style="width: 5%;">Xóa</td>'+
'</tr>';

createContentForOldExam = (index, id, place, date, shift, time, amount) => {
  var editBtnId = "editBtnOf_" + id;
  var deleteShiftBtnId = "deleteShiftBtnOf_" + id;
  $("#tableOf_"+id+" tr:last").after('<tr>'+
    '<td>'+index+'</td>'+
    '<td>'+place+'</td>'+
    '<td>'+date+'</td>'+
    '<td>'+shift+'('+time+')'+'</td>'+
    '<td>'+amount+'</td>'+
    '<td><button type="button" class="interactbtn" id='+editBtnId+'><img src="../../images/pen.svg" alt="edit"></button></td>'+
    '<td><button type="button" class="interactbtn" id='+deleteShiftBtnId+'><img src="../../images/recycle-bin.svg" alt="delete"></button></td>'+
  '</tr>');
}

/* ******************************************************************************************** */
/* ******************    NEW EXAM    *********************** */
/* ******************************************************************************************** */

/* NEW'S PIECES */
createHeaderForNewExam = (id) => {
  var now = new Date().getFullYear();
  var deleteExamBtnId = "deleteExamBtnOf_" + id;
  return '<div class="w3-green header w3-row">'+
    '<div class="w3-col m6 l6">'+
      '<h3>Đợt <input type="number" name="UnitRegist" min="0"> năm <input type="number" name="CreateYear" min='+now+'></h3>'+
    '</div>'+
    '<div class="w3-col m6 l6 clearfix delete-container">'+
      '<a id='+deleteExamBtnId+' onclick="removeExamHandler(this.id)">&times;</a>'+
    '</div>'+
  '</div>';
}

const tableHeadForNewExam = '<tr>'+
  '<td style="width: 5%;">STT</td>'+
  '<td style="width: 35%;">Địa điểm</td>'+
  '<td style="width: 20%;">Ngày thi</td>'+
  '<td style="width: 15%;">Ca thi</td>'+
  '<td style="width: 15%;">Số lượng tối đa</td>'+
  '<td style="width: 10%;">Xóa</td>'+
'</tr>';

createContentForNewExam = (index, id) => {
  var rowId = "rowNum_"+index+"_Of_" + id
  var deleteShiftBtnId = "deleteShiftBtnNum_"+index+"_Of_" + id;
  $("#tableOf_"+id+" tr:last").after('<tr id='+rowId+'>'+
    '<td>'+index+'</td>'+
    '<td><input type="text" name="Location"></td>'+
    '<td><input type="date" name="ExamDate"></td>'+
    '<td><input type="text" name="ExamShift"></td>'+
    '<td><input type="text" name="ExameeMax" min="0"></td>'+
    '<td><button type="button" class="interactbtn" id='+deleteShiftBtnId+' onclick="removeRow(this.id)"><img src="../../images/recycle-bin.svg" alt="delete"></button></td>'+
  '</tr>');
}

var idForNew = 1;
/* OPEN NEW EXAM */
$("#addExam").click(function (e) { 
  e.preventDefault();
  INDEX_TREE[idForNew]=1;
  createFrame(idForNew);
  createContentForNewExam(INDEX_TREE[idForNew], idForNew);
  idForNew++;
});

removeExamHandler = id => {
  var containerId = "containerOf_" + id.split("_")[1];
  $("#" + containerId).remove();
}

addNewRow = (id) => {
  var tableId = id.split("_")[1];
  INDEX_TREE[tableId]++;
  createContentForNewExam(INDEX_TREE[tableId], tableId);
}

removeRow = (id) => {
  var tableId = id.split("_")[3];
  var rowId = id.split("_")[1]
  $("#rowNum_"+rowId+"_Of_"+tableId).remove();
  var newIndex = 1;
  $.each($("#tableOf_"+tableId+" tr"), function (indexInArray, valueOfElement) { 
    if (indexInArray!=0) {
      $("#tableOf_"+tableId+" tr")[indexInArray].firstChild.innerHTML=newIndex;
      newIndex++;
    }
  });
  INDEX_TREE[tableId] = newIndex-1;
}

submitNew = id => {
  var formId = "formOf_" + id.split("_")[1];
  var data = $("#"+ formId).serialize().split(/&|=/);
  var r = confirm("Bạn muốn lưu bản ghi này?");
  var valid = true;
  var jdetail = [];
  if (r) {
    for (let i = 0; i < data.length; i++) {
      if(data[i]=="") {
        valid = false;
        break;
      } 
    }
    if (valid) {
      var jsonItem = {};
      var count = 1;
      for (let i = 4; i < data.length; i+=2) {
        if (count == 3) {
          jsonItem["UnitExam"] = data[i+1].split(/[()]/)[0];
          jsonItem["ExamTime"] = data[i+1].split(/[()]/)[1];
        }else{
          jsonItem[data[i]] = data[i+1];
        }
        if (count == 4) {
          count = 1;
          jdetail.push(jsonItem);
          jsonItem = {};
        }else{ count++; }
      }
      $.ajax({
        type: "POST",
        url: "../../action/center/RegistExam/InsertRegistExam.php",
        data: {"UnitRegist": data[1],"CreateYear":data[3], "JDetail": JSON.stringify(jdetail)},
        dataType: "json",
        success: function (response) {
          
        },
        error: function (err) { console.log(err); },
        complete: function (xhr, status) { if(status=="success")location.reload(); }
      });
    }else{
      alert("Điền thiếu thông tin");
    }
  }
}
