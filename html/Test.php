<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
.box{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 30vw;
  height: 4vh;
  background: #111845a6;
  box-sizing: border-box;
  overflow: hidden;
  border: 2px solid #2a3cad;
  color: white;
  padding: 20px;
}

.box:before{
  content: '';
  position:absolute;
  top:0;
  left:-100%;
  width:100%;
  height:100%;
  background: rgba(255,255,255,0.1);
  transition:0.5s;
  pointer-events: none;
}

.box .content{
  position:absolute;
  top:3px;
  left:3px;
  right:3px;
  bottom:3px;
  border:1px solid #f0a591;
  text-align:center;
  box-shadow: 0 5px 10px rgba(9,0,0,0.5);
  
}

.box span{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: block;
  box-sizing: border-box;
  
}

.box span:nth-child(1)
{
  transform:rotate(0deg);
}

.box span:nth-child(2)
{
  transform:rotate(90deg);
}

.box span:nth-child(3)
{
  transform:rotate(180deg);
}

.box span:nth-child(4)
{
  transform:rotate(270deg);
}

.box span:before
{
  content: '';
  position: absolute;
  width:100%;
  height: 2px;
  background: #50dfdb;
  animation: animate 4s linear infinite;
}

@keyframes animate {
  0% {
  transform:scaleX(0);
  transform-origin: left;
  }
  50%
  {
    transform:scaleX(1);
  transform-origin: left;
  }
  50.1%
  {
    transform:scaleX(1);
  transform-origin: right;
    
  }
  
  100%
  {
    transform:scaleX(0);
  transform-origin: right;
    
  }
  
  
} 
</style>
<body>
    <form action="../action/center/RegistExam/OpenRegistExam.php" method="POST">
        <input type="text" value="e3ee8e7f-b0d5-11eb-8267-9840bb0282e0" name="RegistExamID">
        <input type="date" name="startedDate" id="from">
        <input type="date" name="finishDate" id="to">
        <button type="submit" id="fetch">FETCH</button>
    </form>
    <br>
    <a href="admin/admin.php">ADMIN</a><br><br>
    <a href="student/studentHomePage.php">STUDENT</a>
    <div class="box">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="content">
        </div>
        
      </div>
</body>
<script>
/*     $("form").submit(function (e) { 
        e.preventDefault();
        console.log($("#from").val());
        console.log($("#to").val());
        $.ajax({
            type: "POST",
            url: "../action/center/GetDataStatisticalForMediumCore.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    }); */
</script>
</html>