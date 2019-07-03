<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
$result = $connection->query("SELECT * FROM appointment ");
// $resul = "SELECT * FROM appointments "; //แสดงข้อมูชโครงการที่เสนอ
// $objselect= mysqli_query($connection,$resul) or die("Error Query [" . $resul . "]");
if($result !== null) {
echo $result->rowCount();
    // while($row = $result->fetch_assoc()) {
    //     echo "id: " . $row["id"]. " - Name: " . $row["time"]. " " . $row["content"]. "<br>";
    // }
}
?>
    <!-- <table class="table table-striped">
      <tr>
        <th style="width: 30px">#</th>
        <th style="width: 100px">ชื่อหัวข้อโครงการ</th>
        <th style="width: 60px"></th>
        <th style="width: 60px">กำหนดสอบ</th>
      </tr>
      <?php 
      $count = 0;
      while($rows=$result->fetch_assoc()){ 
        $count++;
        ?>
      <tr>
        <td><?php echo $rows['id']; ?></td>
        <td><?php echo $rows['time']; ?></td>
        <td><?php echo $rows['content']; ?></td>
      </tr>
      <?php } ?>  
      <?php if($count ==0 ){ ?>
        <tr>
          <td colspan="6" align="center" class="mailbox-star">ไม่พบข้อมูล</td>
        </tr>
      <?php } ?>     
    </table> -->
