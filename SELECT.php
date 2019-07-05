  <?php
  $host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
  $dbname = 'd4m7b5v2sg6snc';
  $user = 'jkgdpocorcqmzk';
  $pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
  $connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $result = $connection->query("SELECT * FROM appointments ORDER BY id");
  
    // if($_POST['deleteid']=='submit'){
      $sql = "DELETE FROM appointments WHERE id=$_POST[deleteid]";
      $connection->exec($sql);
      var_dump($sql);
      header("Location: SELECT.php");
    // }
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
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="width: 100px">มาตรา</th>
        <th scope="col">ข้อหา</th>
        <th scope="col">บทลงโทษ</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $count = 0;
        while($row = $result->fetch()) {
          $count++;
      ?>
      <tr>
        <th scope="row"><?php echo $count ?>.</th>
        <td><?php echo $row['sec']; ?></td>
        <td><?php echo $row['chge']; ?></td>
        <td><?php echo $row['bla']; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td>
          <form action="SELECT.php" enctype="multipart/form-data" method="post">
            <input type="text" class="form-control" id="deleteid" name="deleteid" value="<?php echo $row['id']; ?>">
            <button name="submit" type="submit" id="submit" value="submit" class="btn btn-info pull-right">ลบข้อมูล</button>
          </form> </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>