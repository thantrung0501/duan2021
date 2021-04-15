<?php
    include '../config.php';

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    //mã hóa
    $password = md5($password);
    $repassword = md5($repassword);

    if(isset($_POST["submit"])){
        if ( $name=='' || $username=='' || $password =='' || $repassword=='' ){
            echo "Vui lòng nhập đủ thông tin cá nhân";
            exit;
        }
        
        if ( $password != $repassword){
            echo "Mật khẩu xác thực không chính xác";
            exit;
        }

        $sql = "SELECT * FROM account WHERE username = '$username'";
        $user = mysqli_query($conn, $sql);

        if (mysqli_num_rows($user)>0){
            echo "Tài khoản đã tồn tại";
            exit;
        } else {
            $data = "INSERT INTO account (
                UserName,
                PassWord,
                AccountType,
                FullName
            )
            VALUES (
                '{$username}',
                '{$password}',
                '2',
                '{$name}'
            )";
            $addmember = mysqli_query($conn,$data);
            if ($addmember){
                echo "Bạn đã đăng ký thành công";
            } else {
                echo "Có lỗi trong quá trình đăng ký. Vui lòng thử lại sau";
            }
        }
    }
?>