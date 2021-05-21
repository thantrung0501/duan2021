const config = {language: 'fr', htmlEncodeOutput: false, entities: false, entities_latin: false, ForceSimpleAmpersand: true}
CKEDITOR.replace( 'content', config );
CKEDITOR.replace( 'payPlace', config );

noticeSubmitHandler = () => {
    var title = $("#title").val();
    var content = CKEDITOR.instances["content"].getData();
    console.log(content);
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