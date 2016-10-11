<?php
// Example 3-1-6.php
$a = 123;
echo "is_int($a) = " . (is_int($a) ? "true" : "false") . "\n";

$a = '123';
echo "is_int((int)$a) = " . (is_int((int)$a) ? "true" : "false") . "\n";
?>
