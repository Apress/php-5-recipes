<?php
// Example 3-5-2.php
$i = 123456;
$f = 98765.567;

$si = number_format($i, 0, ',', '.');
$sf = number_format($f, 2);

echo "\$si = $si and \$sf = $sf\n";
?>
