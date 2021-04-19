<?php
    include '../config.php';

    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $cmnd = $_POST["cmnd"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $enterpassword = $_POST["enterpassword"];
    $dateofBirth = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];

    //mã hóa
    $password = md5($password);
    $enterpassword = md5($enterpassword);

    if(isset($_POST["submit"])){
        if ( $name=='' || $username=='' || $password =='' || $enterpassword=='' ){
            echo "Vui lòng nhập đủ thông tin cần thiết";
            exit;
        }
        
        if ( $password != $enterpassword){
            echo "Mật khẩu xác thực không chính xác";
            exit;
        }

        $sql = "SELECT * FROM account WHERE username = '$username'";
        $user = mysqli_query($conn, $sql);

        if (mysqli_num_rows($user)>0){
            echo "Tài khoản đã tồn tại";
            exit;
        } else {
            $data = "INSERT INTO users (
                username,
                email,
                fullname,
                dateofBirth,
                gender,
                phone,
                CMND,   
                address
            )
            VALUES (
                '{$username}',
                '{$email}',
                '{$name}',
                '{$dateofBirth}',
                '{$gender}',
                '{$phone}',
                '{$cmnd}',
                '{$address}'
            )";

            $member = "INSERT INTO account (
                username,
                password,
                AccountType
            )
            VALUES (
                '{$username}',
                '{$password}',
                '2'
            )";

            $addmember = mysqli_query($conn,$member);
            $addaccount = mysqli_query($conn,$data);
            if ($addaccount && $addmember){
                echo "Bạn đã đăng ký thành công";
            } else {
                echo "Có lỗi trong quá trình đăng ký. Vui lòng thử lại sau";
            }
        }
    }
?>