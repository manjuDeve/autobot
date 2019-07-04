
<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);

$name=$_POST['sec'];
$chge=$_POST['chge'];
$bla=$_POST['bla'];

$params = array(
    'user_id' => $name,
    'slip_date' =>$chge,
    'name' =>$bla,
    );
    $statement = $connection->prepare('INSERT INTO appointments (sec, chge, bla) VALUES (:user_id,:slip_date, :name)');
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
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleFormControlInput1">มาตรา</label>
                <input type="text" class="form-control" id="sec" name="sec" placeholder="มาตรา">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">ข้อหา</label>
                <textarea class="form-control" id="chge" name="chge"  rows="3" placeholder="ข้อหา"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">ข้อหา</label>
                <textarea class="form-control" id="chge" name="chge"  rows="3" placeholder="ข้อหา"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="form-group">
                <button name="submit" type="submit" id="submit" class="btn btn-info pull-right">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</form> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>
