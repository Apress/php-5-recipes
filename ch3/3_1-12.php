<?php
// Example 3-1-12.php
for ($i = 0; $i < 100; $i += 0.1) {
  if ($i == 50) echo '$i == 50' . "\n";
  if ($i >= 50 && $i < 50.1) echo '$i >= 50 && $i < 50.1' . "\n";
}
echo $i;
?>
