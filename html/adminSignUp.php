<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký</title>
    <style>
    body {
        margin: 0;
    }

    button {
        display: block;
        margin: auto;
        font-family: verdana;
        font-size: 4em;
        height: 20vh;
        width: 40vw;
        margin-top: 40vh;  
        background-color: RED;
        color: white;
    }

    button:hover{
        background-color: #990000;
    }
</style>
</head>
<body>
    <form action="../action/createAdminAccount.php" method="POST">
        <button type="submit" name="create">Tạo</button>
    </form>
</body>
</html>