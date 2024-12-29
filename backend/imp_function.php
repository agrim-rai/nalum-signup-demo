<?php


function generateRandomString($length = 10)
{
    $characters = '012345678901234567890123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}


function getUserIP()
{
    // Check if the IP is coming from shared internet or behind a proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Regular IP from remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}



