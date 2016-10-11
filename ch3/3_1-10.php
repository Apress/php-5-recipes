<?php
// Example 3-1-10.php
$i = 0x7FFFFFFF;
echo "$i is " . (is_int($i) ? "an integer" : "a float") . "\n";
$i++;
echo "$i is " . (is_int($i) ? "an integer" : "a float") . "\n";
?>
