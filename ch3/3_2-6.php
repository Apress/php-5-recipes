<?php
// Example 3-2-6.php
function frand($min, $max, $precision = 1) {
  $scale = 1/$precision;
  return mt_rand($min * $scale, $max * $scale) / $scale;
}

echo "frand(0, 10, 0.25) = " . frand(0, 10, 0.25) . "\n";
?>
