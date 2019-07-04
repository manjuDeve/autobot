<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);

    $sql = "SELECT MAX(id) AS MCODE FROM appointments";
    $qry = mysqli_query($connection,$sql) or die(mysqli_error());
    $rs = mysqli_fetch_assoc($qry);
    $maxId = substr($rs['MCODE'], -7);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
    $maxId = ($maxId + 1); 
    $maxId = substr("0000000".$maxId, -7);

    $sec=$_POST['sec'];
    $chge=$_POST['chge'];
    $bla=$_POST['bla'];

    $statement = $connection->prepare("INSERT INTO appointments(id, sec, chge, bla)VALUES ('$maxI','$sec','$chge','$bla')");
    $statement->execute($params);

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://www.isranews.org/images/2014/isranews/09/05092014002.jpg" width="30" height="30" alt="">
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="SELECT.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insert.php">เพิ่มข้อมูล</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<form action="insert.php" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">มาตรา</label>
    <input type="email" class="form-control" id="sec" name="sec" placeholder="มาตรา">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">ข้อหา</label>
    <textarea class="form-control" id="chge" name="chge"  rows="3" placeholder="ข้อหา"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">บทลงโทษ</label>
    <textarea class="form-control" id="bla" name="bla" rows="3" placeholder="บทลงโทษ"></textarea>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>
