<?php
// Example 10-3-1.php
$a = "10";
$b = (int)$a;
echo 'gettype($a) = ' . gettype($a) . "\n";
echo 'gettype($b) = ' . gettype($b) . ", \$b = $b\n";
$a = array(5,4,5);
$b = (int)$a;
echo 'gettype($a) = ' . gettype($a) . "\n";
echo 'gettype($b) = ' . gettype($b) . ", \$b = $b\n";
?>
