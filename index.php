<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
$resul = $connection->query("SELECT * FROM appointments  WHERE id='5' ");

if($resul !== null) {
// echo $result->rowCount();
echo "hh";
    while($row = $resul->fetch_assoc()) {
        echo "id: " . $row['id']. " - Name: " . $row['time']. " " . $row['content']. "<br>";
    }
    echo "go";
}
// if ($result->num_rows > 0) {
    // output data of each row
   
// } else {
    // echo "0 results";
// }
$connection->close();
?>
