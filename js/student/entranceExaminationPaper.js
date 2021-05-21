$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "../../action/student/GetAccountDetail.php",
    data: [],
    dataType: "json",
    success: function (response) {
      $("#registryCode").text(response.AccountID);
      $("#name strong").text(convertData(response.FullName.toLocaleUpperCase()));
      $("#birthday").text(convertDate(convertData(response.DateOfBirth)));
      $("#placeOfBirth").text(convertData(response.ProvinceName));
      $("#gender").text(convertData(response.Gender));
      $("#cmnd").text(convertData(response.Identification));
      $("#name2 strong").text(convertData(response.FullName.toLocaleUpperCase()));
      $("#address").text(convertData(response.Address));
      $("#phone").text(convertData(response.PhoneNumber));
      $("#email").text(convertData(response.Email));
    }
  });

  $.ajax({
    type: "POST",
    url: "../../action/student/RegistExam/GetListExamRegisted.php",
    data: [],
    dataType: "json",
    success: function (response) {
      console.log(response);
    },
    error: function (err) {console.log(err);}
  });
});

convertData = data => {
  return data!="" ? data : "(Trống)";
}

// Save the PDF
$("#export").click(function (e) { 
  e.preventDefault();
    html2canvas($("#paper-content"), {
        onrendered: function (canvas) {  
            var img = canvas.toDataURL("image/png");
            var doc = jsPDF();
            doc.addImage(img, "JPEG", 0, 0);
            doc.save('Giấy báo dự thi.pdf');
        }
    });
});