function send() {
	var arr = document.getElementsByTagName('input');
	var username = arr[0].value;
	var password = arr[1].value;
	if(username == "" || password == "") {
		alert("Bạn chưa nhập tài khoản hoặc mật khẩu!");
	}
}