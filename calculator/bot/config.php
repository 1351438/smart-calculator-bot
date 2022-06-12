<?php

define("BOT_TOKEN", '<BOT_TOKEN>');
define("SITE_BASE", "https://domain.com/path/");


function curl($action, $datas) {
    $url = 'https://api.telegram.org/bot'. BOT_TOKEN . '/' . $action;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
    return false;
}


define("start_text", "سلام خوش‌اومدید، برای شروع و استفاده از ماشین حساب درون برنامه ای تلگرام از دکمه های زیر اضافه کنید، درضمن شما میتوانید این ماشین حساب رو به قسمت سنجاق اضافه کنید تا در همه چت های تلگرام به اون دسترسی داشته باشید 😉");
define("answer_text", "❓صورت مسئله: %s
✅ پاسخ مسئله: %s");
define("use_webapp","استفاده از موبایل اپلیکیشن");
define("add_to_attach","اضافه کردن به سنجاق");