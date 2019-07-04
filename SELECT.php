<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
$result = $connection->query("SELECT * FROM appointments ORDER BY id");
?>
    <table class="table table-striped" border="1">
      <tr>
        <th >#</th>
        <th >ชื่อหัวข้อโครงการ</th>
        <th ></th>
      </tr>
      <?php 
      $count = 0;
      while($row = $result->fetch()) {
        $count++;
        ?>
      <tr>
        <td><?php echo $count ?>.</td>
        <td><?php echo $row['sec']; ?></td>
        <td><?php echo $row['chge']; ?></td>
        <td><?php echo $row['bla']; ?></td>
      </tr>
      <?php } ?>      
    </table>