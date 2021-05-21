CKEDITOR.replace( 'content' );
CKEDITOR.replace( 'payPlace' );

noticeSubmitHandler = () => {
    var title = $("#title").val();
    var content = CKEDITOR.instances["content"].getData();
    console.log("title="+title+"&content="+content);
    var r = confirm("Bạn chắc chắn đăng tải thông báo này");
    if (r) {
        $.ajax({
            type: "POST",
            url: "../../action/center/InsertNewFeed.php",
            data: "title="+title+"&content="+content,
            dataType: "json",
            success: function (response) {
                alert("Đăng tải thành công");
            },
            error: function (err) {console.log(err);}
        });
    }
}