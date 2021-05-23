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
  var examNumId = "examNumOf_" + id;
  var examYearId = "examYearOf_" + id;
  return '<div class="w3-green header w3-row">'+
    '<div class="w3-col m6 l6">'+
      '<h3>Đợt <input type="number" id='+examNumId+' min="0"> năm <input type="number" id='+examYearId+' min='+now+'></h3>'+
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
  var placeId = "placeNum_"+index+"_Of_" + id;
  var dateId = "dateNum_"+index+"_Of_" + id;
  var shiftId = "shiftNum_"+index+"_Of_" + id;
  var amountId = "amountNum_"+index+"_Of_" + id;
  var deleteShiftBtnId = "deleteShiftBtnNum_"+index+"_Of_" + id;
  $("#tableOf_"+id+" tr:last").after('<tr id='+rowId+'>'+
    '<td>'+index+'</td>'+
    '<td><input type="text" id='+placeId+'></td>'+
    '<td><input type="date" id='+dateId+'></td>'+
    '<td><input type="text" id='+shiftId+'></td>'+
    '<td><input type="text" id='+amountId+' min="0"></td>'+
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
  console.log($("#"+ formId));
  console.log($("#"+ formId).serialize());
}
