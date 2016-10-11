<?php
// Example 10-5-2.php
$a = 7;
function test() {
  global $a;
  $a = 20;
}
test();
echo "\$a = $a\n";
?>