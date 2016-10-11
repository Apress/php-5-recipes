<?php
// Example 3-2-7.php
function frand($min, $max, $precision = 1) {
  $scale = 1/$precision;
  return mt_rand($min * $scale, $max * $scale) / $scale;
}

echo "frand(0, 10, 3) = " . frand(0, 10, 3) . "\n";
?>
