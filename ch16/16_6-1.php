<?php
// Example 16-6-1.php
require_once 'Net/Ping.php' ;
$ping = new Net_Ping('C:\WINDOWS\system32\ping.exe', 'windows');
$ping->setArgs(
  array(
    "count" => 5,
    "size"  => 32,
    "ttl"   => 128
  )
);
var_dump($ping->ping("yahoo.com"));
?>
