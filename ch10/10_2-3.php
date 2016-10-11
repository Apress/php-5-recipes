<?php
// Example 10-2-3.php
$a = 5;
$b = $a;
$a = 7;
echo "\$a = $a and \$b = $b\n";

$a = 5;
$b = &$a;
$a = 7;
echo "\$a = $a and \$b = $b\n";
?>
