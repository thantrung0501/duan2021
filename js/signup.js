/*$().ready(function () {
    $("form").submit(function (e) { 
        e.preventDefault();
        try {
            if(validate()){
                console.log("success");
                return true; 
            } else {
                console.log("fail");
                return false;
            }
        } catch (error) {
            console.log(error);
            e.stopPropagation();
        }
    });
});*/

validate = () => {
    if($("#password").val().length < 8){
        alert("Mật khẩu phải chứa tối thiểu 8 kí tự");
        return false;
    }
    if($("#password").val() != $("#enterpassword").val()){
        alert("Xác nhận mật khẩu không trùng khớp");
        return false;
    }
    return true;
}