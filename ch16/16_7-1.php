<?php
// Example 16-7-1.php
require_once "Net/Whois.php";

$server = "whois.networksolutions.com";
$query  = "apress.com";

$whois = new Net_Whois;
$data = $whois->query($query, $server);
var_dump($data);
?>
