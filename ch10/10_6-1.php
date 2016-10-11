<?php
// Example 10-6-1.php
function by_value($a) {
  $a *= 2;
}
function by_reference(&$a) {
  $a *= 2;
}
$b = 5;
by_value($b);
echo "\$b is now $b\n";
by_reference($b);
echo "\$b is now $b\n";
by_value(&$b);
echo "\$b is now $b\n";
?>
