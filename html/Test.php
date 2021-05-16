<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form>
        <input type="date" name="openFrom" id="from">
        <input type="date" name="openTo" id="to">
        <button type="submit" id="fetch">FETCH</button>
    </form>
    <br>
    <a href="admin/admin.php">ADMIN</a><br><br>
    <a href="student/studentHomePage.php">STUDENT</a>
</body>
<script>
    $("form").submit(function (e) { 
        e.preventDefault();
        console.log($("#from").val());
        console.log($("#to").val());
        /* $.ajax({
            type: "POST",
            url: "../action/center/GetDataStatisticalForMediumCore.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        }); */
    });
</script>
</html>