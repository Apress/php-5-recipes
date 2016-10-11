<?php
// Example 3-2-5.php
function frand($min, $max, $decimals = 0) {
  $scale = pow(10, $decimals);
  return mt_rand($min * $scale, $max * $scale) / $scale;
}

echo "frand(0, 10, 2) = " . frand(0, 10, 2) . "\n";
?>
