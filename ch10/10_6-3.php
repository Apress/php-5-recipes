<?php
// Example 10-6-3.php
function f1($a) {
  $a += 4;
}
function f2(&$a) {
  $a += 10;
}
$b = 5;
f1(&$b);
f2($b);
echo "\$b = $b\n";
?>
