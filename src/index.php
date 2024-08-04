<?php

require_once '../vendor/autoload.php';

use GeoIp2\Database\Reader;

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$cityDbReader = new Reader('GeoLite2-City.mmdb');
$record = $cityDbReader->city($ip);
var_dump($record->city->names['en']);
var_dump($record->country->names['en']);
