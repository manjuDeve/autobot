<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token ='el8BPlEY6Cf60LnRo7mwRrdnGUT8WqsZQ03H2zdL1Xx6iGWewgjyyOhsa8Aquztz903qfCobddaA3tsmUoOySZaJ2S9VzDMgbJGsfMsGyE7OzFXxyrHPDpeawCape4Ds5VqLlkVVINwQVdIBGpt+YwdB04t89/1O/w1cDnyilFU=';
$channel_secret ='2fbf6e976b55aea18895561298516965';

// Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
    // Line API send a lot of event type, we interested in message only.
        if ($event['type'] == 'message') {
            switch($event['message']['type']) {
                case 'text':
                    $host = 'ec2-23-21-91-183.compute-1.amazonaws.com';
                    $dbname = 'd4m7b5v2sg6snc';
                    $user = 'jkgdpocorcqmzk';
                    $pass = 'd41b9d3145a967b438542fc48475c08338a54f13b7c762bb4a5a0cdcbc1f2637';
                    $connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
                    $mssql=$event['message']['text'];
                    $result = $connection->query("SELECT * FROM appointments WHERE time LIKE '%".$mssql."%' ");
                    // error_log($result);
                    // Get replyToken
                    $replyToken = $event['replyToken'];
                    // Reply message
                    $count = 0;
                    while($row = $result->fetch()) {
                        $count++;
                        $respMessage = "ข้อมูล: " . $row["time"]."". $row["content"];
                    }
                    if($count == 0 ){
                        $respMessage = "ไม่พบข้อมูล";
                    }
                    $httpClient = new CurlHTTPClient($channel_token);
                    $bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret));
                    $textMessageBuilder = new TextMessageBuilder($respMessage);
                    $response = $bot->replyMessage($replyToken, $textMessageBuilder);
                break;
            }
        }
    }
}    

if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // LINE API send a lot of event type, we interested in message only.
        if ($event['type'] == 'unfollow') {
        // ไม่รู้จะท ำอะไรต่อ เพรำะว่ำยูสเซอร์อันเฟรนบอทไปแล้ว
        // บำงทีอำจจะแค่นับจ ำนวนคนอันเฟรนบอท แล้วบอกจ ำนวนให้กำรตลำดทรำบ
        }
    }
}
echo "OK";