<?php
// Example 16-5-1.php
$ip = gethostbyname("www.example.com");
echo "IP = $ip\n";
$host = gethostbyaddr("192.0.34.166");
echo "Host = $host\n";
$ip = gethostbynamel("yahoo.com");
print_r($ip);
?>
