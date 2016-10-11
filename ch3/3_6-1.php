<?php
// Example 3-6-1.php
bcscale(3);
$a = 1.123;
$b = 2.345;

$c = bcadd($a, $b);
echo "$c\n";

$c = bcadd($a, $b, 1);
echo "$c\n";
?>