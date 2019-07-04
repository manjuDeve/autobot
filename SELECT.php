<?php
$host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
$dbname = 'd4m7b5v2sg6snc';
$user = 'jkgdpocorcqmzk';
$pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
$result = $connection->query("SELECT * FROM tb_laws ORDER BY id");

    while($row = $result->fetch()) {
        echo $row["id"]. "ข้อมูล: " . $row["section"]. " " . $row["Charge"]." " . $row["Blame"]. "<br>";
    }
?>