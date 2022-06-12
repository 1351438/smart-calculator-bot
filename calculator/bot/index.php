<?php
/// Github: https://github.com/1351438
/// Telegram: t.me/phpbots
/// Sample Bot: t.me/SmartCalculatorBot
include "config.php";

$update = json_decode(file_get_contents("php://input"), true);
$message = $update['message'];
$text = $message['text'];
$from = $message['from'];
$from_id = $from['id'];


if (preg_match('/^\/(start)/', $text)) {
    curl("sendMessage", [
        "chat_id" => $from_id,
        "text" => start_text,
        "reply_markup" => json_encode([
            "inline_keyboard" => [
                [["web_app" => ["url" => SITE_BASE . "web_app"], "text" => use_webapp]],
                [['text' => add_to_attach, "url" => "https://t.me/smartcalculatorbot?startattach"]]
            ]
        ])
    ]);
}

if (isset($message['web_app_data'])) {
    $web_app_data = json_decode(json_decode($message['web_app_data']['data'], true)['data'], true);
    curl("sendMessage", [
        "chat_id" => $from_id,
        "text" => sprintf(answer_text, $web_app_data['quiz'], $web_app_data['answer'])
    ]);
}