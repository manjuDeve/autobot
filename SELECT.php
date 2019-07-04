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
        <?php if($data['id_Schedule'] != ''){ ?>
        <th >กำหนดสอบ</th>
        <th >ผลการอนุมัติ</th>
        <?php }?>
      </tr>
      <?php 
      $count = 0;
      while($row = $result->fetch()) {
        $count++;
        ?>
      <tr>
        <td><?php echo $count ?>.</td>
        <td><?php echo $rows['sec']; ?></td>
        <td><?php echo $rows['chge']; ?></td>
        <td><?php echo $rows['bla']; ?></td>
      </tr>
      <?php } ?>  
      <?php if($count ==0 ){ ?>
        <tr>
          <td colspan="6" align="center" class="mailbox-star">ไม่พบข้อมูล</td>
        </tr>
      <?php } ?>     
    </table>