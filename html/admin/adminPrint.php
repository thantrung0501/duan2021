<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/admin/adminPrint.css">
  <link rel="stylesheet" href="../../css/topNavBar.css">
  <link rel="stylesheet" href="../../css/sideNavBar.css">
  <title>Trang chủ admin</title>
</head>
<body>
  <?php 
    if(isset($_SESSION["AccountID"])){
      if($_SESSION["AccountType"]!=1) header("location: ../student/studentHomepage.php");
    }else{
      header("location: ../signin.php");
    }
    include '../sideNavBar.php'
  ?>
<div id="main" class="main">
  <?php include './topNavBarAdmin.php' ?> 
  
</div>
</body>
<script src="../../js/sideNavBar.js"></script>
</html>