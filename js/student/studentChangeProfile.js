const elementList = ["fullname", "year", "month", "day", "gender", "race", "cmnd/cccd", "residence", "birthplace", 
                    "email", "phone", "address",
                    "priority", "area", "10hk1", "10hk2", "10all", "11hk1", "11hk2", "11all", "12hk1", "12hk2", "12all",
                    "gradYear", "math", "liturature", "foreignLan", "physic", "chemistry", "biologu", "history", "geography", "morality"];

validateForm = () => {
    var x = document.forms["profileForm"];
    for(let i=0; i<elementList.length-12; i++){
        if (x[elementList[i]].value == "") {
            alert("Bạn cần điền đầy đủ thông tin");
            return false;
        }
    }
    if(!validateCitizenID(x["cmnd/cccd"].value)){
        alert("Chứng minh nhân dân/Căn cước công dân không hợp lệ");
        return false;
    }
    if(!validateEmail(x["email"].value)){
        alert("Sai định dạng email");
        return false;
    }
    if(!validatePhoneNumber(x["phone"].value)){
        alert("Số điện thoại không hợp lệ");
        return false;
    }
    for(let i = 14; i<elementList.length-10; i++){
        if(i<23) {
            if(!validateNonCompulsoryScore(x[elementList[i]].value)){
                alert("Điểm học tập không hợp lệ");
                return false;
            }
        }else if(i>23){
            if(!validateNonCompulsoryScore(x[elementList[i]].value)){
                alert("Điểm học tập không hợp lệ");
                return false;
            }
        }
    } 
    return true;
}

validateEmail = email => {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

validateCitizenID = id =>{
    if(id.length != 9 && id.length != 12)
    return false;
    for(let i = 0; i<id.length; i++){
        if(isNaN(id[i])) return false;
    }
    return true;
} 

validatePhoneNumber = phone => {
    if(phone.length != 10 && phone.length != 11)
    return false;
    for(let i = 0; i<phone.length; i++){
        if(isNaN(phone[i])) return false;
    }
    return true;
}

validateCompulsoryScore = (score) => {
    if(score<0 || score>10) return false;
    return true;
}

validateNonCompulsoryScore = (score) => {
    if(score!="" && (score<0 || score>10)) return false;
    return true;
}

$.ajax({
    url : "../../action/student/GetAccountDetail.php",
        method: 'GET',
            data: {},
            dataType: "json",
            success: function(data){
                    
                    
                }
        });

$().ready(function(){
    $("form").submit(function(event){
        try {
            if(validateForm()){
               console.log(JSON.stringify($("form").serializeJSON())); 
            }else{
                console.log("fail");
            }
            event.preventDefault();
            event.stopPropagation();    
        } catch (error) {
            console.log(error);
            event.preventDefault();
            event.stopPropagation();   
        } 
    });
});