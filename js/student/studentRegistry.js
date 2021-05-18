$(document).ready(function () {
    $.ajax({
      type: "GET",
      url: "../../action/student/RegistExam/GetListRegistExamForStudent.php",
      data: [],
      dataType: "json",
      success: function (response) {
        console.log(response);
      }
    });
  });