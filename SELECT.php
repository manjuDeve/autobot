<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
$result = $connection->query("SELECT * FROM appointments ORDER BY id");
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  crossorigin="anonymous">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
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
    </tr>
    <?php } ?>
  </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>