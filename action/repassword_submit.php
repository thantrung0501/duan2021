<?php
    include '../config.php';

    $email = $_POST['email'];
    if (isset($_POST['submit'])){
        if ($_POST['email']==''){
            echo "Vui lòng nhập email của bạn";
            exit;
        }

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $user = mysqli_query($conn, $sql);

        if (mysqli_num_rows($user)>0){
            $to = $email;
            $subject = "Code for reset your password";
            $txt = rand(0,999999);
            mail($to,$subject,$txt);

            echo "Vui lòng xác nhận trong email của bạn";
            exit;
        } else {
            echo "Email của bạn chưa được đăng ký";
            exit;
        }
    }
?>