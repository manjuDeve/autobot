<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token ='el8BPlEY6Cf60LnRo7mwRrdnGUT8WqsZQ03H2zdL1Xx6iGWewgjyyOhsa8Aquztz903qfCobddaA3tsmUoOySZaJ2S9VzDMgbJGsfMsGyE7OzFXxyrHPDpeawCape4Ds5VqLlkVVINwQVdIBGpt+YwdB04t89/1O/w1cDnyilFU=';
$channel_secret = '2fbf6e976b55aea18895561298516965';

// Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
    // Get replyToken
    $replyToken = $event['replyToken'];
    $ask = $event['message']['text'];
    switch(strtolower($ask)) {
    case 'm':
    $respMessage = 'What sup man. Go away!';
    break;
    case 'f':
    $respMessage = 'Love you lady.';
    break;
    default:
    $respMessage = 'What is your sex? M or F';
    break;
    }
    $httpClient = new CurlHTTPClient($channel_token);
    $bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret));
    $textMessageBuilder = new TextMessageBuilder($respMessage);
    $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    }
    }
    echo "OK";