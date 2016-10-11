<?php
// Example 3-4-1.php
$start = array(0, 0);
$end = array(100, 0);
$length = sqrt(pow($end[0] - $start[0], 2) + pow($end[1] - $start[1], 2));

$angle = 35;
$r = deg2rad($angle);
$new_start = array(20, 20);
$new_end = array($new_start[0] + cos($r) * $length, $new_start[1] + sin($r) * $length);

var_dump($new_end);
?>