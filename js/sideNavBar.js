var status = 0;

$().ready(function(){
    $("#sideBarBtn").click(function(){
        if(status==0){
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            status=1;
        }else{
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            status=0;
        }  
    });
});