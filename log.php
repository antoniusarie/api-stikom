<?php
// Create Log
$ipaddress = $_SERVER["REMOTE_ADDR"];

$filename_log = date("Ymd").".txt";
$basePath = dirname(dirname(__FILE__))."/".basename(__DIR__);

if(!file_exists($basePath."/log/"))
{
    mkdir($basePath."/log");
}

$file_log = fopen($basePath."/log/".$filename_log, "a"); 

date_default_timezone_set("Asia/Jakarta");
// $t = microtime(true);
// $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
// $d = new DateTime(date('Y-m-d H:i:s'.$micro, $t));
$d = new DateTime(date('Y-m-d H:i:s'));

$current_time = $d->format("Y/m/d H:i:s");
// $current_time = $d->format("H:i:s");
$url_hit = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

$message = "Time =>".$current_time.", IP Address => ".$ipaddress.", URL Hit => ".$url_hit;
fwrite($file_log, $message."\r\n");
fclose($file_log);
// End Log

ob_start();
?>