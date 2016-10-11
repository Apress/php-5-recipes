<?php
// Example 10-2-2.php
$net_address = array("192.168.1.101", "255.255.255.0", "192.168.1.1");
list($ip_addr, $net_mask, $gateway) = $net_address;
echo "ip addr  = $ip_addr\n";
echo "net mask = $net_mask\n";
echo "gateway  = $gateway\n";
?>
