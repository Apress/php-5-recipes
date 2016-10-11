<?php
// Example 10-7-4.php
function ShowSimple($val) {
  echo "$val\n";
}
function ShowComplex($val) {
  echo "The value is " . number_format($val) . "\n";
}

$v = 1234567;

$a = "ShowSimple";
$b = "ShowComplex";

$a($v);
$b($v);
?>
