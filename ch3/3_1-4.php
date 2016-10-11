<?php
// Example 3-1-4.php
$a = 1;
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = 1.5;
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = true;
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = 'Test';
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = '3.5';
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = '3.5E27';
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = 0x19;
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";

$a = 0777;
echo "is_numeric($a) = " . (is_numeric($a) ? "true" : "false") . "\n";
?>
