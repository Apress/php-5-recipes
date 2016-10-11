<?php
// Example 14-7-3.php
$months = array(
  "January", "February", "Marts", 
  "April", "May", "June",
  "July", "August", "September",
  "October", "November", "December"
);
$sales = array(
  10, 12, 15, 19, 30, 45, 
  12, 50, 20, 34, 55, 70
);
$pid = wddx_packet_start("Sales 2005");
wddx_add_vars($pid, "months");
wddx_add_vars($pid, "sales");
echo wddx_packet_end($pid);
?>