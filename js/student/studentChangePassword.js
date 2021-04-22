validatePassword = () => {
    if($("#newpw").val() === $("#renewpw").val()) return true;
    return false;
}

validateInput = () => {
    if($("#oldpw").val()=="" || $("#newpw").val()=="" || $("#renewpw").val()=="") return false;
    return true;
}

validateForm = () => {
    if(!validateInput()){
        alert("Vui lòng điền đủ thông tin");
        return false;
    }
    if(!validatePassword()){
        alert("Nhập lại mật khẩu không trùng khớp");
        return false;
    }
    return true;
}

$().ready(function () {
    $("form").submit(function (e) { 
        try {
            if(validateForm()){
                console.log(JSON.stringify($("form").serializeJSON())); 
            }else{
                console.log("fail");
            }
            e.preventDefault();
            e.stopPropagation();   
        } catch (error) {
            console.log(error);
            e.preventDefault();
            e.stopPropagation();
        } 
    });
});